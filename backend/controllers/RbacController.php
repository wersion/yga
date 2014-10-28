<?php
/**
 *	  ┏┓　　　┏┓
 *	┏┛┻━━━┛┻┓
 *	┃　　　　　　　┃
 *	┃　　　━　　　┃
 *	┃　┳┛　┗┳　┃
 *	┃　　　　　　　┃
 *	┃　　　┻　　　┃
 *	┃　　　　　　　┃
 *	┗━┓　　　┏━┛
 *	    ┃　　　┃   神兽保佑
 *	    ┃　　　┃   代码无BUG！
 *	 	 ┃　　　┗━━━┓
 *	    ┃　　　　　　　┣┓
 *	    ┃　　　　　　　┏┛
 *	    ┗┓┓┏━┳┓┏┛
 *	      ┃┫┫　┃┫┫
 *	      ┗┻┛　┗┻┛
 */
namespace backend\controllers;
header("Content-type:text/html;charset=utf-8");
use backend\models\AuthItem;
use backend\models\TMenu;
use Yii;
use common\components\MyHelper;
use yii\data\ArrayDataProvider;
use yii\db\Query;
use yii\helpers\Html;
use yii\rbac\Item;
use yii\web\Response;
use yii\widgets\ActiveForm;

class RbacController extends BackendController
{
    /**
     * 角色列表
     * @return string
     */
    public function actionRoles()
    {
        $roles = Yii::$app->authManager->getRoles();
        $dataprovider = new ArrayDataProvider([
            'allModels'=>$roles,
        ]);
        return $this->render('roles',[
            'dataprovider'=>$dataprovider,
        ]);
    }

    /**
     * 添加角色
     * @return string
     */
    public function actionAddrole()
    {
        if($rolename = $_REQUEST['id'])
            $model = AuthItem::findOne($rolename);
        else
            $model = new AuthItem();
        if(Yii::$app->request->isPost)
        {
            $auth = Yii::$app->authManager;
            $model->load(Yii::$app->request->post());
            $role = $auth->createRole($model->name);
            $role->description = $model->description;
            if($auth->add($role))
            {
                Yii::$app->session->setFlash('success');
                return $this->redirect(['rbac/roles']);
            }
        }
        return $this->render('addrole',[
            'model'=>$model,
        ]);
    }

    public function actionEditrole($rolename)
    {
        $model = AuthItem::findOne($rolename);
        return $this->render('addrole',[

        ]);
    }

    public function actionValidateitemname()
    {
        if($name = $_REQUEST['id'])
            $model = AuthItem::findOne($name);
        else
            $model = new AuthItem();
        if(Yii::$app->request->isAjax)
        {
            $model->load(Yii::$app->request->post());
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
    /**
     * 给角色分配权限
     * @return string
     */
    public function actionAssignauth()
    {
        if(Yii::$app->request->isPost)
        {
            $posts = Yii::$app->request->post();
            $auth = Yii::$app->authManager;
            $role = $auth->getRole($posts['rolename']);
            $thismenu =TMenu::findOne($posts['menuid']);
            $route = $thismenu->route;
            $permission = $auth->getPermission($route);
            if($posts['ck']=='true')
            {
                if($posts['level']==3)
                {
                    //2级菜单
                    $father = $thismenu->father;
                    $fpermission = $auth->getPermission($father->route);
                    $this->addChild($role,$fpermission);
                    //1级菜单
                    $this->addChild($role,$auth->getPermission($father->father->route));
                }
                if($posts['level']==2)
                {
                    //1级菜单
                    $fpermission = $auth->getPermission($thismenu->father->route);
                    $this->addChild($role,$fpermission);
                    //3级菜单
                    $children = $thismenu->son;
                    foreach($children as $son)
                    {
                        $this->addChild($role,$auth->getPermission($son->route));
                    }
                }
                if($posts['level']==1)
                {
                    //子子孙孙都加权限
                    $sons = $thismenu->son;
                    foreach($sons as $son)
                    {
                        $this->addChild($role,$auth->getPermission($son->route));
                        if($son->level==2)
                        {
                            $gsons = $son->son;
                            foreach($gsons as $gson)
                            {
                                $this->addChild($role,$auth->getPermission($gson->route));
                            }
                        }
                    }
                }
                //自身加入权限
                $auth->addChild($role,$permission);
            }else
            {
                if($posts['level']==3 && $posts['cntlv3']==0)
                {
                    $father = $thismenu->father;
                    $auth->removeChild($role,$auth->getPermission($father->route));
                    if($posts['cntlv3']==0)
                        $auth->removeChild($role,$auth->getPermission($father->route));
                    if($posts['cntlv2']==0)
                        $auth->removeChild($role,$auth->getPermission($father->father->route));
                }
                if($posts['level']==2)
                {
                    foreach($thismenu->son as $son)
                    {
                        $auth->removeChild($role,$auth->getPermission($son->route));
                    }
                    if($posts['cntlv2']==0)
                        $auth->removeChild($role,$auth->getPermission($thismenu->father->route));
                }
                if($posts['level']==1)
                {
                    foreach($thismenu->son as $son)
                    {
                        $auth->removeChild($role,$auth->getPermission($son->route));
                        foreach($son->son as $gson)
                        {
                            $auth->removeChild($role,$auth->getPermission($gson->route));
                        }
                    }
                }
                //删除自身
                $auth->removeChild($role,$permission);
            }
        }
        $list = TMenu::find()->where('level=1')->all();
        $rolename = Yii::$app->request->get('rolename');
        return $this->render('assignauth',[
            'list'=>$list,
            'rolename'=>$rolename,
            'role'=>Yii::$app->authManager->getRole($rolename)
        ]);
    }

    /**
     * 添加权限
     * @param $role
     * @param $item
     */
    protected function addChild($role,$item)
    {
        $auth = Yii::$app->authManager;
        if(!$auth->hasChild($role,$item))
            $auth->addChild($role,$item);
    }
}
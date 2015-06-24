<?php

namespace backend\modules\admin\controllers;
use backend\base\controllers\BackendController;
use backend\modules\admin\models\forsearch\TAdmUserSearch;
use Yii;
use yii\helpers\FileHelper;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;
use backend\modules\admin\models\TAdmUser;
use app\modules\admin\models\LoginForm;


class UserController extends BackendController
{
	
    /*
     * 用户管理
     */
    public function actionIndex(){
        $searchmodel = new TAdmUserSearch();
        $dataprovider = $searchmodel->search(Yii::$app->request->getQueryParams());
        return $this->render('index', [
            'model'        => new TAdmUser(['scenario' => 'create']),
            'dataprovider' => $dataprovider,
            'searchmodel'  => $searchmodel,
        ]);
    }

   

    /**
     * 删除用户
     * @param $id
     * @return Response
     * @throws \Exception
     */
    public function actionDelete($id)
    {
        $model = TAdmUser::findOne($id);
        if ($model->delete()) {
            Yii::$app->session->setFlash('success');
        } else {
            Yii::$app->session->setFlash('fail', '删除失败');
        }
        return $this->redirect(['user/index']);
    }

    /**
     * 添加用户
     * @return null|string
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function actionAdduser()
    {
        $model = new TAdmUser(['scenario' => 'create']);
        if (Yii::$app->request->isPost) {
            $model->load($_POST);
            if ($model->validate() && $model->save(false)) {
                Yii::$app->session->setFlash('success');
            } else {
                Yii::$app->session->setFlash('fail', '添加失败');
            }
            return $this->redirect(['user/index']);
        }
    }

    public function actionLoadhtml()
    {
        if ($id = Yii::$app->request->post('id')) {
            $model = TAdmUser::findOne($id);
        } else {
            $model = new TAdmUser();
        }
        return $this->renderPartial('loadhtml', [
            'model' => $model,
        ]);
    }

    /**
     * ajax验证是否存在
     * @return array
     */
    public function actionAjaxvalidate()
    {
        $model = new TAdmUser();
        if (Yii::$app->request->isAjax) {
            $model->load($_POST);
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model, 'username');
        }
    }

    /**
     * 设置头像
     * @return string|Response
     * @throws \Exception
     */
    public function actionSetphoto()
    {
        $up = UploadedFile::getInstanceByName('photo');
        if ($up && !$up->getHasError()) {
            $userid = Yii::$app->user->id;
            $filename = $userid . '-' . date('YmdHis') . '.' . $up->getExtension();
            $path = Yii::getAlias('@backend/web/upload') . '/user/';
            FileHelper::createDirectory($path);
            $up->saveAs($path . $filename);
            $model = TAdmUser::findOne($userid);
            $oldphoto = $model->userphoto;
            $model->userphoto = $filename;
            if ($model->update()) {
                Yii::$app->session->setFlash('success');
                //删除旧头像
                if (is_file($path . $oldphoto))
                    unlink($path . $oldphoto);
                return $this->goHome();
            } else {
                print_r($model->getErrors());
                exit;
            }
        }
        return $this->render('setphoto', [
            'preview' => Yii::$app->user->identity->userphoto,
        ]);
    }

    /**
     * 修改密码
     * @return string|Response
     */
    public function actionChangepwd()
    {
        $model = TAdmUser::findOne(Yii::$app->user->id);
        $model->scenario = 'chgpwd';
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($model->save()) {
                Yii::$app->session->setFlash('success');
            }
            else {
                Yii::$app->session->setFlash('fail');
            }
            return $this->goHome();
        }
        return $this->render('changepwd', [
            'model' => $model,
        ]);
    }
}
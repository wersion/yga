<?php

namespace backend\modules\admin\controllers;

use Yii;
use backend\base\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\admin\models\forsearch\UserSearch;
use common\util\Util;
use backend\modules\admin\models\AuthItem;
use backend\modules\weixin\models\Wechats;
use backend\modules\admin\models\User;
use backend\modules\admin\models\UserForm;
use backend\modules\weixin\models\PublicAccount;
use backend\modules\weixin\models\WeixinUser;

/**
 * UserController implements the CRUD actions for TAdmUser model.
 */
class UserController extends BackendController {
	
	/**
	 * Lists all TAdmUser models.
	 * 
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel = new UserSearch();
		$dataProvider = $searchModel->search ( Yii::$app->request->queryParams );
		
		return $this->render ( 'index', ['model' => new User( [ 
						'scenario' => 'create' 
				] ), 'searchmodel' => $searchModel,'dataprovider' => $dataProvider 
		] );
	}
	
	/**
	 * Displays a single TAdmUser model.
	 * 
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionView($id) {
		return $this->render ( 'view', [ 
				'model' => $this->findModel ($id) 
		] );
	}
	
	/**
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new UserForm();
		$allRoles = AuthItem::findAll(['type'=>AuthItem::TYPE_ROLE]);
		$selectedRoles =  [];
		$selectedAccounts = [];
		$accounts = $this->getAccounts();
		if($model->load(Yii::$app->request->post())){
			$selectedRoles = Util::getPostValue('selectedRoles');
			$selectedAccounts = Util::getPostValue('selectedAccounts');
			if($model->save()){
				$model->assgin($allRoles, $selectedRoles);
				$accounts = PublicAccount::find()->all();
				$model->assginAccount($accounts,$selectedAccounts);
			}
			$this->session->setFlash('success');
			return $this->redirect ( [
					'view','id' => $model->id
			] );
		}else{
			return $this->render ( 'create', [
					'model' => $model,
					'roles'=>$allRoles,
					'accounts'=>$accounts,
					'selectedRoles'=>$selectedRoles,
					'selectedAccounts'=>$selectedAccounts
			] );
		}
	}
	
	/**
	 * 
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel ( $id );
		$allRoles = AuthItem::findAll(['type'=>AuthItem::TYPE_ROLE]);
		$accounts = $this->getAccounts();
		$selectedRoles = $this->auth->getRolesByUser($model->id);
		$selectedAccounts = $model->getWeixinUsers()->all();
		if ($model->load ( Yii::$app->request->post () )) {
			$selectedRoles = Util::getPostValue('selectedRoles');
			$selectedAccounts = Util::getPostValue('selectedAccounts');
			if($model->save()){
				$model->assgin($allRoles, $selectedRoles);
				$accounts = PublicAccount::find()->all();
				$model->assginAccount($accounts,$selectedAccounts);
			}
			\var_dump($model->errors);
// 			return $this->redirect ( [ 
// 					'view','id' => $model->id 
// 			] );
		} else {
			
			
			return $this->render ( 'update', [ 
					'model' => $model,
					'roles' => $allRoles,
					'selectedRoles' => $selectedRoles,
					'accounts' => $accounts,
					'selectedAccounts'=>$selectedAccounts
			] );
		}
	}
	
	/**
	 * 修改密码
	 *
	 * @return string|Response
	 */
	public function actionChangepwd() {
		$model = User::findOne ( Yii::$app->user->id );
		$model->scenario = 'chgpwd';
		if (Yii::$app->request->isPost) {
			$model->load ( Yii::$app->request->post () );
			if ($model->save ()) {
				Yii::$app->session->setFlash ( 'success' );
			} else {
				Yii::$app->session->setFlash ( 'fail' );
			}
			return $this->goHome ();
		}
		return $this->render ( 'changepwd', [
				'model' => $model
		] );
	}
	
	/**
	 * Deletes an existing TAdmUser model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * 
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionDelete($id) {
		$modle = $this->findModel ( $id );
		$modle->delete ();
		if($modle->errors){
			$this->session->setFlash('fail', $modle->errors);
		}else{
			$this->session->setFlash('success');
		}
		return $this->redirect ( [ 
				'index' 
		] );
	}
	
	/**
	 * Finds the TAdmUser model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * 
	 * @param string $id        	
	 * @return TAdmUser the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = UserForm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function getAccounts(){
    	$results = [];
    	$accounts = PublicAccount::find()->all();
    	foreach($accounts as $account){
    		$results[$account->type][] = $account;
    	}
    	return  $results;
    }
}

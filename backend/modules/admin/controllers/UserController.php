<?php

namespace backend\modules\admin\controllers;

use Yii;
use backend\modules\admin\models\TAdmUser;
use backend\base\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\admin\models\forsearch\UserSearch;
use common\util\Util;
use backend\modules\admin\models\AuthItem;
use backend\modules\weixin\models\Wechats;

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
		
		return $this->render ( 'index', ['model' => new TAdmUser ( [ 
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
				'model' => $this->findModel ( $id ) 
		] );
	}
	
	/**
	 * Creates a new TAdmUser model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * 
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new TAdmUser();
		$allRoles = AuthItem::findAll(['type'=>AuthItem::TYPE_ROLE]);
		if($model->load(Yii::$app->request->post())){
			$selectedRoles = Util::getPostValue('selectedRoles');
			if($model->save()){
				$model->assgin($allRoles, $selectedRoles);
			}
			\var_dump($model->errors);
			$this->session->setFlash('success');
			return $this->redirect ( [
					'view','id' => $model->uid
			] );
		}else{
			return $this->render ( 'create', [
					'model' => $model,
					'roles'=>$allRoles
			] );
		}
	}
	
	/**
	 * Updates an existing TAdmUser model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * 
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel ( $id );
		
		if ($model->load ( Yii::$app->request->post () ) && $model->save ()) {
			return $this->redirect ( [ 
					'view','id' => $model->uid 
			] );
		} else {
			return $this->render ( 'update', [ 
					'model' => $model 
			] );
		}
	}
	
	/**
	 * 修改密码
	 *
	 * @return string|Response
	 */
	public function actionChangepwd() {
		$model = TAdmUser::findOne ( Yii::$app->user->id );
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
			$this->setFlash('fail', $modle->errors);
		}else{
			$this->setFlash('success');
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
		if (($model = TAdmUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

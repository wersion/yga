<?php

namespace backend\modules\weixin\controllers;

use Yii;
use backend\modules\weixin\models\PublicAccount;
use backend\modules\weixin\models\forsearch\PublicAccountSearch;
use backend\base\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 */
class PublicAccountController extends BackendController {
	
	public function actionIndex() {
		$searchModel = new PublicAccountSearch ();
		$dataProvider = $searchModel->search ( Yii::$app->request->queryParams );
		return $this->render ( 'index', [ 
				'searchModel' => $searchModel,'dataProvider' => $dataProvider 
		] );
	}
	
	/**
	 * Displays a single PublicAccount model.
	 * 
	 * @param integer $id        	
	 * @return mixed
	 */
	public function actionView($id) {
		return $this->render ( 'view', [ 
				'model' => $this->findModel ( $id ) 
		] );
	}
	
	/**
	 * Creates a new PublicAccount model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * 
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new PublicAccount ();
		if ($model->load ( Yii::$app->request->post ())) {
			if($this->request->post('isNormal') == 'normal'){//普通模式
				$model->normal();
			}else{//一键模式
				$model->onekey();
			}
			$model->save();
			if($model->id){
				$this->session->setFlash('success');
				return $this->redirect ( [
						'view','id' => $model->id
				] );
			}else{
				$this->session->setFlash('fail',\implode(',', $model->errors));
				return $this->redirect('index');
			}
			
		} else {
			return $this->render ( 'create', [ 
					'model' => $model 
			] );
		}
	}
	
	/**
	 * Updates an existing PublicAccount model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * 
	 * @param integer $id        	
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel ( $id );
		
		if ($model->load ( Yii::$app->request->post () ) && $model->save ()) {
			return $this->redirect ( [ 
					'view','id' => $model->id 
			] );
		} else {
			return $this->render ( 'update', [ 
					'model' => $model 
			] );
		}
	}
	
	/**
	 * Deletes an existing PublicAccount model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * 
	 * @param integer $id        	
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel ( $id )->delete ();
		
		return $this->redirect ( [ 
				'index' 
		] );
	}
	
	/**
	 * Finds the PublicAccount model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * 
	 * @param integer $id        	
	 * @return PublicAccount the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = PublicAccount::findOne ( $id )) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException ( 'The requested page does not exist.' );
		}
	}
	
	public function actionChange($id){
		$account = PublicAccount::findOne(['id'=>$id]);
		Yii::$app->getSession()->set('account_name', $account->name);
		$this->session->setFlash('success');
		return $this->goHome();
	}
	
	
}

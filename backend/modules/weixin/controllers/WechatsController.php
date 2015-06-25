<?php

namespace backend\modules\weixin\controllers;

use Yii;
use backend\modules\weixin\models\Wechats;
use backend\modules\weixin\models\forsearch\WechatsSearch;
use backend\base\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WechatsController implements the CRUD actions for Wechats model.
 */
class WechatsController extends BackendController {
	
	/**
	 * Lists all Wechats models.
	 * 
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel = new WechatsSearch ();	
		$dataProvider = $searchModel->search ( Yii::$app->request->queryParams );
		
		return $this->render ( 'index', [ 
				'searchModel' => $searchModel,'dataProvider' => $dataProvider 
		] );
	}
	
	/**
	 * Displays a single Wechats model.
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
	 * Creates a new Wechats model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * 
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new Wechats ();
		if ($model->load( Yii::$app->request->post () )) {
			if(Yii::$app->request->post('isNormal') == 'normal'){
				$model->scenario = 'normal';
				$model->updataNormal();
			}else{
				$model->scenario = 'onekey';
			}
			$model->save();
			return $this->redirect ( [ 
					'view','id' => $model->weid 
			] );
		} else {
			return $this->render ( 'create', [ 
					'model' => $model 
			] );
		}
	}
	
	/**
	 * Updates an existing Wechats model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * 
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel ( $id );
		
		if ($model->load ( Yii::$app->request->post () ) && $model->save ()) {
			return $this->redirect ( [ 
					'view','id' => $model->weid 
			] );
		} else {
			return $this->render ( 'update', [ 
					'model' => $model 
			] );
		}
	}
	
	/**
	 * Deletes an existing Wechats model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * 
	 * @param string $id        	
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel ( $id )->delete ();
		
		return $this->redirect ( [ 
				'index' 
		] );
	}
	
	/**
	 * Finds the Wechats model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * 
	 * @param string $id        	
	 * @return Wechats the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
        if (($model = Wechats::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

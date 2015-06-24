<?php
namespace backend\controllers;

use Yii;
use yii\caching\ChainedDependency;
use yii\caching\ExpressionDependency;
use yii\caching\DbDependency;
use backend\models\TMenu;
use yii\web\Controller;
use yii\filters\AccessControl;

class HomeController extends Controller {
	public function behaviors() {
		return [ 
				'access' => [ 
						'class' => AccessControl::className (),
						'rules' => [ 
								[ 
										'allow' => true,
										'roles' => [ '@' 
								] 
								],[ 
										'actions' => [ 
												'error' 
										],'allow' => true 
								] 
						],'denyCallback' => function ($rules, $action) {
							Yii::$app->user->returnUrl = Yii::$app->request->url;
							return $this->redirect ( [ 
									'user/login' 
							] );
						} 
				] 
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function actions() {
		return [ 
				'error' => [ 
						'class' => 'yii\web\ErrorAction' 
				],'captcha' => [ 
						'class' => 'yii\captcha\CaptchaAction' 
				] 
		];
	}
	public function actionIndex() {
		return $this->render ( 'index' );
	}
}
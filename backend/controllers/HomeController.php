<?php

namespace backend\controllers;

use Yii;
use yii\caching\ChainedDependency;
use yii\caching\ExpressionDependency;
use yii\caching\DbDependency;
use backend\models\TMenu;
use yii\web\Controller;
use yii\filters\AccessControl;
use backend\modules\weixin\models\PublicAccount;

class HomeController extends Controller {
	public function behaviors() {
		return [ 
				'access' => [ 
						'class' => AccessControl::className (),'rules' => [ 
								[ 
										'allow' => true,'roles' => [ 
												'@' 
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
		$cache = Yii::$app->getCache ();
		if (empty ( $cache->get ( 'accounts' ) )) {
			$results = [];
		$accounts = PublicAccount::find()->all();
		foreach($accounts as $account){
			$results[$account->type][] = $account;
		}
		
		Yii::$app->getCache()->set('accounts', $results);
	}		
		return $this->render ( 'index' );
	}
}
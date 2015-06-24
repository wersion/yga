<?php

namespace backend\controllers;

use Yii;
use yii\caching\ChainedDependency;
use yii\caching\ExpressionDependency;
use yii\caching\DbDependency;
use backend\models\TMenu;
use yii\web\Controller;
use yii\filters\AccessControl;
use backend\modules\admin\models\TAdmUser;
use app\modules\admin\models\LoginForm;

class UserController extends Controller {
	/**
	 * 登陆
	 * 
	 * @return null|string
	 */
	public function actionLogin() {
		$model = new TAdmUser ();
		if (Yii::$app->request->isPost) {
			$model = new LoginForm ( $_POST );
			$model->rememberMe = Yii::$app->request->post ( 'rememberMe' ) ?  : false;
			if ($model->login ())
				return $this->goBack ( '/' );
		}
		$this->layout = 'main-login';
		return $this->render ( 'login', [ 
				'model' => $model 
		] );
	}
	/**
	 * 登出
	 * 
	 * @return \yii\web\Response
	 */
	public function actionLogout() {
		Yii::$app->user->logout ();
		return $this->goHome ();
	}
}
<?php
namespace backend\modules\admin\models;

use yii\base\Model;
class UserForm extends User{
	
	public $password;
	public $password_repeat;
	/**
	 * @inheritdoc
	 */
	public function rules(){
		return [
				[['username', 'password', 'password_repeat', 'status'], 'required'],
				['password_repeat', 'compare', 'compareAttribute' => 'password'],
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels(){
		return [
				'username' => '用户名称',
				'auth_key' => 'Auth Key',
				'password' => '密码',
				'password_repeat' => '重复密码',
				'email' => '邮箱',
				'status' => '状态',
		];
	}
	
	
}

?>
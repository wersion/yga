<?php

namespace backend\modules\admin\models;

use Yii;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;
use yii\rbac\Role;
use common\util\Util;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface{
    
	const STATUS_FORBIDDEN = -1;
	const STATUS_ACTIVE = 0;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
        	[['username'], 'unique'],
        	['status', 'default', 'value' => self::STATUS_FORBIDDEN],
        	['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_FORBIDDEN]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(){
        return [
            'id' => 'ID',
            'username' => '用户名称',
            'auth_key' => 'Auth Key',
            'password_hash' => '加密密码',
            'password_reset_token' => 'Password Reset Token',
            'email' => '邮箱',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id){
    	return static::findOne(['id' => $id]);
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null){
    	throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    
    /**
     * Finds user by username
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username){
    	return static::findOne(['username' => $username]);
    }
    
    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token){
    	if (!static::isPasswordResetTokenValid($token)) {
    		return null;
    	}
    
    	return static::findOne([
    			'password_reset_token' => $token
    	]);
    }
    
    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token){
    	if (empty($token)) {
    		return false;
    	}
    	$expire = Yii::$app->params['user.passwordResetTokenExpire'];
    	$parts = explode('_', $token);
    	$timestamp = (int) end($parts);
    	return $timestamp + $expire >= time();
    }
    
    /**
     * @inheritdoc
     */
    public function getId(){
    	return $this->getPrimaryKey();
    }
    
    /**
     * @inheritdoc
     */
    public function getAuthKey(){
    	return $this->auth_key;
    }
    
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey){
    	return $this->getAuthKey() === $authKey;
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password){
    	return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password){
    	$this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
    	$this->auth_key = Yii::$app->security->generateRandomString();
    }
    
    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken(){
    	$this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken(){
    	$this->password_reset_token = null;
    }
    
    public function beforeSave($insert){
    	$security = \Yii::$app->security;
    	if($this->isNewRecord || $this->password_hash != $security->generatePasswordHash($this->password_hash)){
    		$this->password_hash = $security->generatePasswordHash($this->password);
    		$this->auth_key = $security->generateRandomString();
    		$this->password_reset_token = $security->generateRandomString().'_'.\time();
    	}
    	return true;
    }
    
    
    public function assgin($allItems,$selectedItems){
    	$auth = \Yii::$app->authManager;
    	if ($selectedItems == null)
    	{
    		$selectedItems = [];
    	}
    	$existedItems = $auth->getAssignments($this->id);
    	$role = new M_Role();
    	foreach ( $allItems as $item ){
    		$itemName = $item['name'];
    		$role->name = $itemName;
    		// 如果选择该角色
    		if (in_array($itemName, $selectedItems)){
    			// 已经存在，则跳过
    			if (isset($existedItems[$itemName])){
    				continue;
    			}
    			else{
    				// 不存在，则分配给该用户
    				$auth->assign($role, $this->id);
    			}
    		}
    		else // 如果没选中该角色
    		{
    			// 已经分配给该用户了，则需要将其取消关联
    			if (isset($existedItems[$itemName])){
    				$auth->revoke($role, $id);
    			}
    		}
    	}
    }
}

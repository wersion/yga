<?php

namespace backend\modules\admin\models;

use Yii;
use yii\web\IdentityInterface;
use common\util\Util;

/**
 * This is the model class for table "members".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 */
class TAdmUser extends \yii\db\ActiveRecord implements IdentityInterface
{
	const STATUS_FORBIDDEN = -1;
	const STATUS_ACTIVE = 0;
	
    public $password_repeat;
    public $password;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%members}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['groupid', 'status', 'joindate', 'lastvisit', 'did', 'usemoney', 'money'], 'integer'],
            [['username', 'password', 'salt'], 'required'],
            [['username'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 200],
            [['salt'], 'string', 'max' => 10],
            [['joinip', 'validtime', 'lastip'], 'string', 'max' => 15],
            [['remark'], 'string', 'max' => 500],
            [['username'], 'unique'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        	['status', 'default', 'value' => self::STATUS_FORBIDDEN],
        	['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_FORBIDDEN]],
        ];
    }
    
    
    public function init(){
    	parent::init();
    	$this->joindate = time();
    	$this->lastvisit = time();
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => '用户编号',
            'groupid' => '对应组id',
            'username' => '用户名',
            'password' => '用户密码',
        	'password_repeat' =>'重复密码',
            'salt' => '加密盐',
            'status' => '会员状态',
            'joindate' => '注册时间',
            'joinip' => '注册时ip地址',
            'lastvisit' => '上次访问时间',
            'did' => 'Did',
            'usemoney' => 'Usemoney',
            'money' => 'Money',
            'validtime' => 'Validtime',
            'lastip' => 'Lastip',
            'remark' => 'Remark',
        ];
    }
    public function beforeSave($insert)
    {
        if($this->isNewRecord || $this->password!=$this->oldAttributes['password'])
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        return true;
    }

    public function assgin($allItems,$selectedItems){
    		$auth = \Yii::$app->authManager;
    		if ($selectedItems == null)
    		{
    			$selectedItems = [];
    		}
    		$existedItems = $auth->getAssignments($this->uid);
    		$role = new Role();
    		foreach ( $allItems as $item )
    		{
    			$itemName = $item['name'];
    				
    			$role->name = $itemName;
    				
    			// the selected role
    			if (in_array($itemName, $selectedItems))
    			{
    				// check if exists in db
    				if (isset($existedItems[$itemName]))
    				{
    					Util::info('exist:' . $itemName);
    					continue;
    				}
    				else
    				{
    					// add new role
    					Util::info('add:' . $itemName);
    					$auth->assign($role, $id);
    				}
    			}
    			else // unselected role
    			{
    				// check if exists in db
    				if (isset($existedItems[$itemName]))
    				{
    					// need to be deleted
    					Util::info('delete:' . $itemName);
    					$auth->revoke($role, $id);
    				}
    			}
    		}
    }
    
    
    /**
     * 关联获取角色
     * @return \yii\db\ActiveQuery
     */
    public function getRoles()
    {
        return $this->hasMany(AuthAssignment::className(),['user_id'=>'uid']);
    }

    public static function findByusername($username)
    {
        return static::find()->where('username=:u',[':u'=>$username])->one();
    }

    public  function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password,$this->password_hash);
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }
    public function getId()
    {
        return $this->uid;
    }
    public function getAuthKey()
    {
        return md5($this->uid);
    }
    public function validateAuthKey($authKey)
    {
        return $authKey===$this->getAuthKey();
    }
}
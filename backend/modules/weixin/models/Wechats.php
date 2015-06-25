<?php

namespace backend\modules\weixin\models;

use Yii;
use backend\util\WocxUtil;
use backend\modules\admin\models\TAdmUser;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%wechats}}".
 *
 * @property string $weid
 * @property string $hash
 * @property integer $type
 * @property string $uid
 * @property string $token
 * @property string $EncodingAESKey
 * @property string $access_token
 * @property integer $level
 * @property string $name
 * @property string $account
 * @property string $original
 * @property string $signature
 * @property string $country
 * @property string $province
 * @property string $city
 * @property string $username
 * @property string $password
 * @property string $welcome
 * @property string $default
 * @property string $default_message
 * @property integer $default_period
 * @property string $lastupdate
 * @property string $key
 * @property string $secret
 * @property string $styleid
 * @property string $payment
 * @property string $shortcuts
 * @property string $quickmenu
 * @property string $parentid
 * @property string $subwechats
 * @property string $siteinfo
 * @property string $menuset
 * @property string $groups
 * @property string $accountlink
 * @property string $jsapi_ticket
 */
class Wechats extends \yii\db\ActiveRecord
{
	
	/**
	 * 二維碼
	 * @var unknown
	 */
	public $qrcode;
	/**
	 * 
	 * @var unknown
	 */
    public $headimg;
    public $isNormal;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wechats}}';
    }

    /**与members表关联
     *
     * @return ActiveQuery
     */
    public function getmembers(){
    	return $this->hasOne(TAdmUser::className(), ['uid'=>'uid']);
    }
    
    public function scenarios(){
    	$scenarios = parent::scenarios();
    	$scenarios['normal'] = ['name', 'account', 'original', 'key', 'secret'];
    	$scenarios['onekey'] = ['name', 'account', 'original','key', 'secret', 'jsapi_ticket'];
    	return $scenarios;
    }
    
    public function getNormalRule(){
    	return [
    			[['name', 'account', 'original', 'signature', 'key', 'secret', 'jsapi_ticket'], 'required'],
    			[['type', 'uid', 'level', 'default_period', 'lastupdate', 'styleid', 'parentid'], 'integer'],
    			[['menuset'], 'string'],
    			[['hash'], 'string', 'max' => 5],
    			[['token', 'password'], 'string', 'max' => 32],
    			[['EncodingAESKey'], 'string', 'max' => 43],
    			[['access_token', 'welcome', 'default', 'subwechats', 'siteinfo', 'jsapi_ticket'], 'string', 'max' => 1000],
    			[['name', 'account', 'username'], 'string', 'max' => 30],
    			[['original', 'key', 'secret'], 'string', 'max' => 50],
    			[['signature'], 'string', 'max' => 100],
    			[['country'], 'string', 'max' => 10],
    			[['province'], 'string', 'max' => 3],
    			[['city'], 'string', 'max' => 15],
    			[['default_message', 'accountlink'], 'string', 'max' => 500],
    			[['payment'], 'string', 'max' => 5000],
    			[['shortcuts', 'quickmenu', 'groups'], 'string', 'max' => 2000],
    			[['hash'], 'unique']
    	];
    }
    
    
    public function updataNormal(){
    	$this->uid = Yii::$app->user->getId();
    	$this->hash = WocxUtil::random(5);
    	$this->token = WocxUtil::random(32);
    	$this->EncodingAESKey = WocxUtil::random(43);
    	$this->qrcode = UploadedFile::getInstance($this, 'qrcode');
    	if($this->qrcode && $this->checkFile($this->qrcode)){
    		$this->qrcode->saveAs('upload/weixin/qrcode_'.(empty($this->weid)?$this->uid:$this->weid).'.'.$this->qrcode->extension);
    	}
    	$this->headimg = UploadedFile::getInstance($this, 'headimg');
    	if($this->headimg && $this->checkFile($this->headimg)){
    		$this->headimg->saveAs('upload/weixin/headimg_'.(empty($this->weid)?$this->uid:$this->weid).'.'.$this->headimg->extension);
    	}
    }
    
    public function checkFile($file){
    	if (!$file instanceof UploadedFile || $file->error == UPLOAD_ERR_NO_FILE) {
    		return [$this->uploadRequired, []];
    	}
    	return true;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hash', 'uid', 'token', 'EncodingAESKey', 'name', 'account', 'original', 'signature', 'country', 'province', 'city', 'username', 'password', 'welcome', 'default', 'default_period', 'key', 'secret', 'menuset', 'groups', 'jsapi_ticket'], 'required'],
            [['type', 'uid', 'level', 'default_period', 'lastupdate', 'styleid', 'parentid'], 'integer'],
            [['menuset'], 'string'],
            [['hash'], 'string', 'max' => 5],
            [['token', 'password'], 'string', 'max' => 32],
            [['EncodingAESKey'], 'string', 'max' => 43],
            [['access_token', 'welcome', 'default', 'subwechats', 'siteinfo', 'jsapi_ticket'], 'string', 'max' => 1000],
            [['name', 'account', 'username'], 'string', 'max' => 30],
            [['original', 'key', 'secret'], 'string', 'max' => 50],
            [['signature'], 'string', 'max' => 100],
            [['country'], 'string', 'max' => 10],
            [['province'], 'string', 'max' => 3],
            [['city'], 'string', 'max' => 15],
            [['default_message', 'accountlink'], 'string', 'max' => 500],
            [['payment'], 'string', 'max' => 5000],
            [['shortcuts', 'quickmenu', 'groups'], 'string', 'max' => 2000],
            [['hash'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hash' => '用户标识',
            'type' => '公众号类型',
            'uid' => '关联的用户',
            'token' => '随机生成密钥',
            'EncodingAESKey' => '随机密钥',
            'access_token' => '存取凭证结构',
            'level' => '公众号接口权限',
            'name' => '公众号名称',
            'account' => '公众帐号',
            'original' => '原始帐号',
            'signature' => '功能介绍',
            'country' => '国家',
            'province' => '省份',
            'city' => '城市',
            'username' => '公众号登录用户',
            'password' => '公众号登陆密码',
            'default_period' => '回复周期时间',
            'key' => '公众号AppId',
            'secret' => '公众号AppSecret',
            'styleid' => '风格ID',
            'subwechats' => '子账号列表',
            'siteinfo' => '微站信息',
            'groups' => '粉丝分组列表',
            'accountlink' => '公众号引导关注',
            'jsapi_ticket' => '二维码凭证',
        ];
    }
    
    
    
    
}

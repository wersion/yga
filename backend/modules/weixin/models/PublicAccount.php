<?php

namespace backend\modules\weixin\models;

use Yii;
use yii\web\UploadedFile;
use linslin\yii2\curl\Curl;

/**
 * This is the model class for table "{{%public_account}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $level
 * @property string $header_img
 * @property string $qrcode_img
 * @property string $accountName
 * @property string $original
 * @property string $country
 * @property string $province
 * @property string $city
 * @property string $signature
 * @property string $access_token
 * @property string $hash
 * @property string $token
 * @property string $EncodingAESKey
 * @property string $username
 * @property string $password
 * @property string $key
 * @property string $secret
 * @property string $welcome
 * @property string $default
 *
 * @property WeixinUser[] $weixinUsers
 */
class PublicAccount extends \yii\db\ActiveRecord
{
	/**
	 * 微信
	 */
	const TYPE_WEIXIN = 0;
	/**
	 * 易信
	 */
	const TYPE_YIXIN = 1;
	/**
	 * 订阅号
	 */
	const LEVEL_READER = 0;
	/**
	 * 服务号
	 */
	const LEVEL_SERVER = 1;
	
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%public_account}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'accountName', 'original', 'access_token', 'hash', 'token', 'EncodingAESKey', 'key', 'secret'], 'required'],
            [['type', 'level'], 'integer'],
            [['signature', 'welcome', 'default'], 'string'],
            [['name', 'original', 'country', 'province', 'city', 'hash', 'token', 'EncodingAESKey', 'key', 'secret'], 'string', 'max' => 63],
            [['header_img', 'qrcode_img', 'accountName', 'access_token'], 'string', 'max' => 256],
            [['username', 'password'], 'string', 'max' => 128],
        	['type','in','range'=>[self::TYPE_WEIXIN,self::TYPE_YIXIN]],
        	['level','in','range'=>[self::LEVEL_READER,self::LEVEL_SERVER]],		
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '公众号名称',
            'type' => '公众号类型',
            'level' => '接口权限级别',
            'header_img' => '头像',
            'qrcode_img' => '二维码',
            'accountName' => '微信账号',
            'original' => '原始ID',
            'country' => '国家',
            'province' => '省份',
            'city' => '城市',
            'signature' => '功能介绍',
            'access_token' => '访问凭证',
            'hash' => 'Hash',
            'token' => '令牌',
            'EncodingAESKey' => '消息加解密密钥',
            'username' => '微信登陆账号',
            'password' => '微信登陆密码',
            'key' => '公众号AppId',
            'secret' => '公众号Secret',
            'welcome' => '欢迎信息',
            'default' => '默认回复',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWeixinUsers(){
        return $this->hasMany(WeixinUser::className(), ['w_id' => 'id']);
    }
    
    /**
     * 更新普通模式下的数据
     * @param array $data
     */
    public function updateCommon($data){
    	$this->hash = WocxUtil::random(5);
    	$this->token = WocxUtil::random(32);
    	$this->EncodingAESKey = WocxUtil::random(43);
    	$qrcode_img = UploadedFile::getInstance($this, 'qrcode_img');
    	if($qrcode_img && $this->checkFile($qrcode_img)){
    		$qrcode_img->saveAs('upload/weixin/qrcode_'.$this->id.'.'.$qrcode_img->extension);
    	}
    	$header_img = UploadedFile::getInstance($this, 'header_img');
    	if($header_img && $this->checkFile($this->headimg)){
    		$header_img->saveAs('upload/weixin/headimg_'.$this->id.'.'.$header_img->extension);
    	}
    	return $this->save();
    }
    
    public function checkFile($file){
    	if (!$file instanceof UploadedFile || $file->error == UPLOAD_ERR_NO_FILE) {
    		return false;
    	}
    	return true;
    }
}

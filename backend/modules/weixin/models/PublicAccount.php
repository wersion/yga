<?php

namespace backend\modules\weixin\models;

use Yii;
use yii\web\UploadedFile;
use linslin\yii2\curl\Curl;
use common\util\Util;
use common\util\Communication;
use backend\util\WocxUtil;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%public_account}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $level
 * @property string $header_img
 * @property string $qrcode_img
 * @property string $account
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
	
	const WEIXIN_ROOT = 'https://mp.weixin.qq.com';
	const YIXIN_ROOT = 'https://plus.yixin.im';
	
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

    public function scenarios(){
    	$scenarios = parent::scenarios();
    	$scenarios['onekey'] = ['type','username','password'];
    	$scenarios['normal'] = ['name', 'account', 'original', 'hash', 'token', 'EncodingAESKey', 'key', 'secret'];
    	return $scenarios;
    }
    
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'account', 'original', 'hash', 'token', 'EncodingAESKey', 'key', 'secret'], 'required'],
            [['type', 'level'], 'integer'],
            [['signature', 'welcome', 'default'], 'string'],
            [['name', 'original', 'country', 'province', 'city', 'hash', 'token', 'EncodingAESKey', 'key', 'secret'], 'string', 'max' => 63],
            [['header_img', 'qrcode_img', 'account', 'access_token'], 'string', 'max' => 256],
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
            'account' => '微信账号',
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
    public function checkFile($file){
    	if (!$file instanceof UploadedFile || $file->error == UPLOAD_ERR_NO_FILE) {
    		return false;
    	}
    	return true;
    }
    
    public function normal(){
    	if($this->type == 1){//微信
    		$this->common();
    	}else if($this->type ==2){//易信
    		
    	}
    	
    	
    }
    
    public function common(){
    	$this->hash = WocxUtil::random(5);
    	$this->token = WocxUtil::random(32);
    	$this->EncodingAESKey = WocxUtil::random(43);
    	$this->save();
    	$qrcode_img = UploadedFile::getInstance($this, 'qrcode_img');
    	if($qrcode_img && $this->checkFile($qrcode_img)){
    		$qrcode_img->saveAs("upload/weixin/qrcode_{$this->id}{$qrcode_img->extension}");
    		$this->qrcode_img = "upload/weixin/qrcode_{$this->id}{$qrcode_img->extension}";
    	}
    	$header_img = UploadedFile::getInstance($this, 'header_img');
    	if($header_img && $this->checkFile($this->headimg)){
    		$header_img->saveAs("upload/weixin/headimg_{$this->id}{$header_img->extension}");
    		$this->qrcode_img = "upload/weixin/headimg_{$this->id}{$header_img->extension}";
    	}
    	return $this->save();
    }
    
    
    
    public function onekey(){
    	if($this->type == 1){//微信
    		$loginstatus = $this->account_weixin_login($this->username, $this->password, '');
    		$basicinfo = $this->account_weixin_basic($this->username);
    		if (empty($basicinfo['name'])) {
//     			message('一键获取信息失败，请手动添加该公众帐号并反馈此信息给管理员！');
    		}
    		$this->key =  $basicinfo['key'];
    		$this->secret = $basicinfo['secret'];
    		$this->city = $basicinfo['city'];
    		$this->province = $basicinfo['province'];
    		$this->country = $basicinfo['country'];
    		$this->signature = $basicinfo['signature'];
    		$this->original = $basicinfo['original'];
    		$this->name = $basicinfo['name'];
    		$this->account =  $basicinfo['account'];
    		if(empty($this->name)) {
//     			message('必须输入公众号的名称！');
    		}
    		//更新操作
    		if (!empty($this->id)) {
    			
    			
    		}else{//新建
    			$this->common();
    			if (!empty($loginstatus)) {
    				//尝试一键接入，关闭编辑模式，开启开发模式，接入API地址
    				if ($this->type == 1) {
    					$result = $this->account_weixin_interface($this->username, 
    							$this->hash, $this->token);
    					if (Util::is_error($result)) {
    						$error = $result['message'];
    					}
    				}
    			}
    			return true;
    		}
    	}else if($this->type ==2){//易信
    		
    	}
    	
    	
    }
    
function account_weixin_interface($username, $hash = '', $token = '') {
	$response = $this->account_weixin_http($username, self::WEIXIN_ROOT . '/misc/skeyform?form=advancedswitchform&lang=zh_CN', array('flag' => '1', 'type' => '2'));
	if (Util::is_error($response)) {
		return $response;
	}
	$response = json_decode($response['content'], true);
	if (!empty($response['base_resp']) && !empty($response['base_resp']['ret'])) {
		return Util::error($response['base_resp']['ret'], $response['base_resp']['err_msg']);
	}
	$response = $this->account_weixin_http($username, self::WEIXIN_ROOT . '/advanced/callbackprofile?t=ajax-response&lang=zh_CN', array('url' => $GLOBALS['_W']['siteroot'] . 'api.php?hash=' . $hash, 'callback_token' => $token));
	if (Util::is_error($response)) {
		return $response;
	}
	$response = json_decode($response['content'], true);
	if (!empty($response['ret'])) {
		return error($response['ret'], $response['msg']);
	}
	return true;
}
    
    
function account_weixin_http($username, $url, $post = '') {
	$cache = Yii::$app->cache;
	return Communication::ihttp_request($url . '&token=' . $cache->get($username.'_token'), 
			$post, array('CURLOPT_COOKIE' => $cache->get($username.'_cookie'), 
					'CURLOPT_REFERER' => 
	self::WEIXIN_ROOT . '/advanced/advanced?action=edit&t=advanced/edit&token='.$cache->get($username.'_token'),));
}
    
    /**
     * 获取微信内容
     * @param unknown $username
     * @return multitype:|multitype:NULL unknown string
     */
    function account_weixin_basic($username) {
    	$response = $this->account_weixin_http($username, self::WEIXIN_ROOT . '/cgi-bin/settingpage?t=setting/index&action=index&lang=zh_CN');
    	if (Util::is_error($response)) {
    		return array();
    	}
    	$info = array();
//     	preg_match('/fakeid=([0-9]+)/', $response['content'], $match);
//     	$fakeid = $match[1];
//     	$image = $this->account_weixin_http($username, self::WEIXIN_ROOT . '/misc/getheadimg?fakeid='.$fakeid);
//     	if (!Util::is_error($image) && !empty($image['content'])) {
//     		$info['headimg'] = $image['content'];
//     	}
//     	$image = $this->account_weixin_http($username, self::WEIXIN_ROOT . '/misc/getqrcode?fakeid='.$fakeid.'&style=1&action=download');
//     	if (!is_error($image) && !empty($image['content'])) {
//     		$info['qrcode'] = $image['content'];
//     	}
    	preg_match('/(gh_[a-z0-9A-Z]+)/', $response['meta'], $match);
    	$info['original'] = $match[1];
    	preg_match('/名称([\s\S]+?)<\/li>/', $response['content'], $match);
    	$info['name'] = trim(strip_tags($match[1]));
    	preg_match('/微信号([\s\S]+?)<\/li>/', $response['content'], $match);
    	$info['account'] = trim(strip_tags($match[1]));
    	preg_match('/功能介绍([\s\S]+?)meta_content\">([\s\S]+?)<\/li>/', $response['content'], $match);
    	$info['signature'] = trim(strip_tags($match[2]));
    	if (Util::strexists($response['content'], '服务号') || Util::strexists($response['content'], '微信认证')) {
    		$authcontent = $this->account_weixin_http($username, self::WEIXIN_ROOT . '/advanced/advanced?action=dev&t=advanced/dev&lang=zh_CN');
    		preg_match_all("/value\:\"(.*?)\"/", $authcontent['content'], $match);
    		$info['key'] = $match[1][2];
    		$info['secret'] = $match[1][3];
    		unset($match);
    	}
    	preg_match_all("/(?:country|province|city): '(.*?)'/", $response['content'], $match);
    	$info['country'] = trim($match[1][0]);
    	$info['province'] = trim($match[1][1]);
    	$info['city'] = trim($match[1][2]);
    	return $info;
    }
    
    
 /**
  * 
  * @param string $username
  * @param string $password
  * @param string $imgcode
  * @return boolean
  */   
function account_weixin_login($username = '', $password = '', $imgcode = '') {
	$loginurl = self::WEIXIN_ROOT . '/cgi-bin/login?lang=zh_CN';	
	$post = array(
		'username' => $username,
		'pwd' => $password,
		'imgcode' => $imgcode,
		'f' => 'json',	
	);
	$response = Communication::ihttp_request($loginurl, $post, array('CURLOPT_REFERER' => 'https://mp.weixin.qq.com/'));
	if (Util::is_error($response)) {
		return false;
	}
	$data = json_decode($response['content'], true);
	if ($data['base_resp']['ret'] == 0) {
		preg_match('/token=([0-9]+)/', $data['redirect_url'], $match);
		$cache = Yii::$app->cache;
		$cache->set($username.'_token', $match[1]);
		$cache->set($username.'_cookie', implode('; ', $response['headers']['Set-Cookie']));
	} else {
// 		switch ($data['ErrCode']) {
// 			case "-1":
// 				$msg = "系统错误，请稍候再试。";
// 				break;
// 			case "-2":
// 				$msg = "微信公众帐号或密码错误。";
// 				break;
// 			case "-3":
// 				$msg = "微信公众帐号密码错误，请重新输入。";
// 				break;
// 			case "-4":
// 				$msg = "不存在该微信公众帐户。";
// 				break;
// 			case "-5":
// 				$msg = "您的微信公众号目前处于访问受限状态。";
// 				break;
// 			case "-6":
// 				$msg = "登录受限制，需要输入验证码，稍后再试！";
// 				break;
// 			case "-7":
// 				$msg = "此微信公众号已绑定私人微信号，不可用于公众平台登录。";
// 				break;
// 			case "-8":
// 				$msg = "微信公众帐号登录邮箱已存在。";
// 				break;
// 			case "-200":
// 				$msg = "因您的微信公众号频繁提交虚假资料，该帐号被拒绝登录。";
// 				break;
// 			case "-94":
// 				$msg = "请使用微信公众帐号邮箱登陆。";
// 				break;
// 			case "10":
// 				$msg = "该公众会议号已经过期，无法再登录使用。";
// 				break;
// 			default:
// 				$msg = "未知的返回，微信缓存冲突！清理缓存或换个浏览器试试！。";
// 		}
// 		message($msg, referer(), 'error');
		return false;
	}
	return true;
}
}

<?php

namespace backend\modules\weixin\models;

use Yii;
use backend\modules\admin\models\User;

/**
 * This is the model class for table "{{%weixin_user}}".
 *
 * @property integer $w_id
 * @property integer $user_id
 *
 * @property User $user
 * @property PublicAccount $w
 */
class WeixinUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%weixin_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['w_id', 'user_id'], 'required'],
            [['w_id', 'user_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'w_id' => '微信ID',
            'user_id' => '用户ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWeixin()
    {
        return $this->hasOne(PublicAccount::className(), ['id' => 'w_id']);
    }
}

<?php

namespace backend\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%members_group}}".
 *
 * @property string $id
 * @property string $name
 * @property integer $did
 * @property integer $status
 * @property integer $dprice
 * @property integer $price
 * @property string $modules
 * @property string $templates
 * @property string $maxaccount
 * @property string $maxsubaccount
 * @property string $icon
 */
class MembersGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%members_group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','maxsubaccount', 'icon'], 'required'],
            [['did', 'status', 'dprice', 'price', 'maxaccount', 'maxsubaccount'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['modules', 'templates'], 'string', 'max' => 5000],
            [['icon'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'did' => 'Did',
            'status' => 'Status',
            'dprice' => 'Dprice',
            'price' => 'Price',
            'modules' => 'Modules',
            'templates' => 'Templates',
            'maxaccount' => '0为不限制',
            'maxsubaccount' => '子公号最多添加数量，为0为不可以添加',
            'icon' => 'Icon',
        ];
    }
}

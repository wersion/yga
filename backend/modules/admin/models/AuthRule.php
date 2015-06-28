<?php

namespace backend\modules\admin\models;

use Yii;

/**
 * This is the model class for table "auth_item".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property string $data
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AuthAssignment[] $authAssignments
 * @property AuthRule $ruleName
 * @property AuthItemChild[] $authItemChildren
 */
class AuthRule extends \yii\db\ActiveRecord {
	
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return '{{%auth_rule}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [ 
				[['name'],'required']
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [ 
				'name' => '规则名称','data' => '内容',
				'created_at'=>'创建时间','updated_at'=>'更新时间' 
		];
	}
	
	/**
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getFather() {
		return $this->hasOne(AuthItem::className (), [ 
				'name' => 'parent' 
		] );
	}
}

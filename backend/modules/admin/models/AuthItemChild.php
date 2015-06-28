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
class AuthItemChild extends \yii\db\ActiveRecord {
	
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return '{{%auth_item_child}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [ 
				[[ 'parent','child' ],'required']
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [ 
				'parent' => 'parent','child' => 'child' 
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

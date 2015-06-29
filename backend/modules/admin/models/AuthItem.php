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
class AuthItem extends \yii\db\ActiveRecord {
	const TYPE_ROLE = 1;
	const TYPE_PERMISSION = 2;
	
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return '{{%auth_item}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [ 
				[ 
						[ 
								'name','type' 
						],'required' 
				],[ 
						'name','unique' 
				],[ 
						[ 
								'type','created_at','updated_at' 
						],'integer' 
				],[ 
						[ 
								'description','data' 
						],'string' 
				],[ 
						[ 
								'name','rule_name' 
						],'string','max' => 64 
				] 
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [ 
				'name' => '名称','type' => '类型','description' => '描述','rule_name' => '规则名称','data' => '数据','created_at' => '创建时间','updated_at' => '修改时间' 
		];
	}
	
	/**
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getAuthAssignments() {
		return $this->hasMany ( AuthAssignment::className (), [ 
				'item_name' => 'name' 
		] );
	}
	
	/**
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getRuleName() {
		return $this->hasOne ( AuthRule::className (), [ 
				'name' => 'rule_name' 
		] );
	}
	
	/**
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getAuthItemChildren() {
		return $this->hasMany ( AuthItemChild::className (), [ 
				'child' => 'name' 
		] );
	}
	
	public function getPermission(){
		$permissions = \Yii::$app->authManager->getPermissionsByRole($this->name);
		$result = [];
		foreach ($permissions as $p ){
			$result[]=$p->description;
		}
		$permissions = implode(',', array_values($result));
		return $permissions;
	}
	
	public function findByName($roleName){
		return static::findOne(['name'=>$roleName]);
	}
	
	
	public function assginPermission($permissions,$selectedPermissions){
		$auth = Yii::$app->authManager;
		$existPermissions = $auth->getPermissionsByRole($this->name);
		//重新对新选择的权限进行关联至角色中
		if ($selectedPermissions == null)
		{
			$selectedPermissions = [];
		}
		$permission = new M_Permission();
		foreach ( $permissions as $item ){
			$itemName = $item['name'];
			$permission->name = $itemName;
			// 如果选择该权限
			if (in_array($itemName, $selectedPermissions)){
				// 已经存在，则跳过
				if (isset($existPermissions[$itemName])){
					continue;
				}
				else{
					// 不存在，则将该权限分配给该角色
					$auth->addChild($this, $permission);
				}
			}
			else // 如果没选中该权限
			{
				// 已经分配给该角色，则需要将其取消关联
				if (isset($existPermissions[$itemName])){
					$auth->removeChild($this, $permission);
				}
			}
		}
		
		
	}
	
}

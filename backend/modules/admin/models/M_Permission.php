<?php

namespace backend\modules\admin\models;

use Yii;
use yii\rbac\Item;

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
class M_Permission extends Item {
	
	public function init(){
		parent::init();
		$this->type = static::TYPE_PERMISSION;
		$this->createdAt = time ();
		$this->updatedAt = time ();
	}
	
}

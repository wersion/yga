<?php
use yii\db\Schema;
use yii\db\Migration;
class m150625_091859_insert_auth_item extends Migration {
	public function up() {
		$date = date();
		//载入均为权限而非角色
		$sql = "INSERT INTO `{{%auth_item}}`(`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES 
				('A_MODIFY_USER',2,'用户管理','','${date}',${date},${date})";
		$this->execute($sql);
		
		
	}
	public function down() {
		echo "m150625_091859_insert_auth_item cannot be reverted.\n";
		
		return false;
	}
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}

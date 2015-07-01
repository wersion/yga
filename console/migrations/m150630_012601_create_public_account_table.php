<?php
use yii\db\Schema;
use yii\db\Migration;
class m150630_012601_create_public_account_table extends Migration {
	public function up() {
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			// http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->createTable('{{%public_account}}', [
				'id'=>Schema::TYPE_PK,
				'name'=>Schema::TYPE_STRING.'(63) NOT NULL',
				'type'=>Schema::TYPE_SMALLINT.' NOT NULL DEFAULT 0',
				'level'=>Schema::TYPE_SMALLINT.' NOT NULL DEFAULT 0',
				'header_img'=>Schema::TYPE_STRING.'(256)',
				'qrcode_img'=>Schema::TYPE_STRING.'(256)',
				'accountName'=>Schema::TYPE_STRING.'(256) NOT NULL',
				'original'=>Schema::TYPE_STRING.'(63) NOT NULL',
				'country'=>Schema::TYPE_STRING.'(63)',
				'province'=>Schema::TYPE_STRING.'(63)',
				'city'=>Schema::TYPE_STRING.'(63)',
				'signature'=>Schema::TYPE_TEXT,
				'access_token'=>Schema::TYPE_STRING.'(256) NOT NULL',
				'hash'=>Schema::TYPE_STRING.'(63) NOT NULL',
				'token'=>Schema::TYPE_STRING.'(63) NOT NULL',
				'EncodingAESKey'=>Schema::TYPE_STRING.'(63) NOT NULL',
				'username'=>Schema::TYPE_STRING.'(128)',
				'password'=>Schema::TYPE_STRING.'(128)',
				'key'=>Schema::TYPE_STRING.'(63) NOT NULL',
				'secret'=>Schema::TYPE_STRING.'(63) NOT NULL',
				'welcome'=>Schema::TYPE_TEXT,
				'default'=>Schema::TYPE_TEXT,
// 				'FOREIGN KEY (user_id) REFERENCES {{%user}} (id) ON DELETE SET NULL ON UPDATE CASCADE',
		],$tableOptions);
		
		$this->createTable('{{%weixin_user}}', [
				'w_id'=>Schema::TYPE_INTEGER.' NOT NULL',
				'user_id'=>Schema::TYPE_INTEGER.' NOT NULL', 
				'FOREIGN KEY (user_id) REFERENCES {{%user}} (id) ON DELETE CASCADE ON UPDATE CASCADE',
				'FOREIGN KEY (w_id) REFERENCES {{%public_account}} (id) ON DELETE CASCADE ON UPDATE CASCADE',
		],$tableOptions);
		
		
	}
	public function down() {
		echo "m150630_012601_create_public_account_table cannot be reverted.\n";
		
		return true;
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

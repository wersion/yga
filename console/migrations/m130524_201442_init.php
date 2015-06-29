<?php
use yii\db\Schema;
use yii\db\Migration;
class m130524_201442_init extends Migration {
	public function up() {
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			// http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		
		$this->createTable ( '{{%user}}', [ 
				'id' => Schema::TYPE_PK,'username' => Schema::TYPE_STRING . ' NOT NULL',
				'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
				'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
				'password_reset_token' => Schema::TYPE_STRING,
				'email' => Schema::TYPE_STRING . ' NULL',
				'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 0',
				'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
				'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL' 
		], $tableOptions );
		
		$security = Yii::$app->security;
		$this->insert("{{%user}}", [
				'username'=>'admin','auth_key'=>$security->generateRandomString(),
				'password_hash'=>$security->generatePasswordHash('admin'),
				'password_reset_token'=>$security->generateRandomString().'_'.time(),
				'email'=>'524135297@qq.com',
				'created_at'=>time(),
				'updated_at'=>time()
		]);
		
		
	}
	public function down() {
		$this->dropTable ( '{{%user}}' );
	}
}

<?php
use yii\db\Schema;
use yii\db\Migration;
use backend\modules\admin\models\TAdmUser;
class m150628_131932_init_members extends Migration {
	public function up() {
// 		$this->renameColumn ( "{{%members}}", 'password', 'password_hash' );
		$users = TAdmUser::findAll ( [
				'status' => 0
		] );
		foreach ( $users as $user ) {
			$user->password_hash = \Yii::$app->security->generatePasswordHash ('wersion');
			$user->save ();
		}
	}
	public function down() {
		echo "m150628_131932_init_members cannot be reverted.\n";
		
		return true;
	}
	
	/*
	 * // Use safeUp/safeDown to run migration code within a transaction
	 * public function safeUp()
	 * {
	 * }
	 *
	 * public function safeDown()
	 * {
	 * }
	 */
}

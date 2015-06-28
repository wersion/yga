<?php
use yii\db\Schema;
use yii\db\Migration;
use backend\modules\admin\models\TAdmUser;
class m130524_201442_init extends Migration {
	public function up() {
		
		$this->renameColumn("{{%members}}", 'password', 'password_hash');
		$users = TAdmUser::findAll(['status'=>0]);
		foreach ($users as $user){
			$user->password_hash = Yii::$app->security->generatePasswordHash('wersion');
			$user->save();
		}		
	}
	public function down() {
		$this->renameColumn("{{%members}}", 'password_hash', 'password');
		
	}
}

<?php
use yii\db\Schema;
use yii\db\Migration;
use backend\modules\admin\models\Permission;
use backend\modules\admin\models\Role;
use backend\modules\admin\models\TAdmUser;
class m150625_091859_insert_auth_item extends Migration {
	public function up() {
	$auth = \Yii::$app->authManager;
	//创建权限
	$p = new Permission();
	$p->name = 'A_MODIFY_USER';
	$p->description = '用户组管理';
	$p->created_at = time();
	$p->updated_at = time();
	$auth->add($p);
	$p1 = new Permission();
	$p1->name = 'A_MODIFY_ROLE';
	$p1->description = '角色组管理';
	$p1->created_at = time();
	$p1->updated_at = time();
	$auth->add($p1);
	$p2 = new Permission();
	$p2->name = 'A_MODIFY_PASSWORD';
	$p2->description = '密码管理';
	$p2->created_at = time();
	$p2->updated_at = time();
	$auth->add($p2);
	$p3 = new Permission();
	$p3->name = 'A_MODIFY_WEIXIN';
	$p3->description = '微信账号管理';
	$p3->created_at = time();
	$p3->updated_at = time();
	$auth->add($p3);
	$p4 = new Permission();
	$p4->name = 'A_VIEW_WEIXIN';
	$p4->description = '微信账号查询';
	$p4->created_at = time();
	$p4->updated_at = time();
	$auth->add($p4);
	$p5 = new Permission();
	$p5->name = 'A_BASIC_OPERATION_WEIXIN';
	$p5->description = '微信基本操作';
	$p5->created_at = time();
	$p5->updated_at = time();
	$auth->add($p5);
	$p6 = new Permission();
	$p6->name = 'A_BASIC_SITE_WEIXIN';
	$p6->description = '微站基本操作';
	$p6->created_at = time();
	$p6->updated_at = time();
	$auth->add($p6);
	//创建角色
	$role = new Role();
	$role->name = '管理员';
	$role->description = '超级管理员';
	$role->created_at = time();
	$role->updated_at = time();
	$auth->addChild($role, $p);
	$auth->addChild($role, $p1);
	$auth->addChild($role, $p2);
	$auth->addChild($role, $p3);
	$auth->addChild($role, $p4);
	$auth->addChild($role, $p5);
	$auth->addChild($role, $p6);
	//分配权限至角色中
	$user = TAdmUser::findByusername('admin');
	$auth->assign($role, $user->getId());
	
	
		
	}
	public function down() {
		echo "m150625_091859_insert_auth_item cannot be reverted.\n";
		
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

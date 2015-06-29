<?php
use yii\db\Schema;
use yii\db\Migration;
use backend\modules\admin\models\M_Permission;
use backend\modules\admin\models\Role;
use yii\rbac\DbManager;
use backend\modules\admin\models\M_Role;
use backend\modules\admin\models\User;
class m150628_020339_init_auth_item extends Migration {
	public function up() {
		$auth = \Yii::$app->authManager;
		// 创建权限
		$p = new M_Permission();
		$p->name = 'A_MODIFY_USER';
		$p->description = '用户组管理';
		$auth->add($p);
		$p1 = new M_Permission ();
		$p1->name = 'A_MODIFY_ROLE';
		$p1->description = '角色组管理';
		$auth->add( $p1 );
		$p2 = new M_Permission ();
		$p2->name = 'A_MODIFY_PASSWORD';
		$p2->description = '密码管理';
		$auth->add( $p2 );
		$p3 = new M_Permission ();
		$p3->name = 'A_MODIFY_WEIXIN';
		$p3->description = '微信账号管理';
		$auth->add( $p3 );
		$p4 = new M_Permission ();
		$p4->name = 'A_VIEW_WEIXIN';
		$p4->description = '微信账号查询';
		$auth->add( $p4 );
		$p5 = new M_Permission ();
		$p5->name = 'A_BASIC_OPERATION_WEIXIN';
		$p5->description = '微信基本操作';
		$auth->add( $p5 );
		$p6 = new M_Permission ();
		$p6->name = 'A_BASIC_SITE_WEIXIN';
		$p6->description = '微站基本操作';
		$auth->add( $p6 );
		// 创建角色
		$role = new M_Role();
		$role->name = '管理员';
		$role->description = '超级管理员';
		$auth->add($role);
		$auth->addChild ( $role, $p );
		$auth->addChild ( $role, $p1 );
		$auth->addChild ( $role, $p2 );
		$auth->addChild ( $role, $p3 );
		$auth->addChild ( $role, $p4 );
		$auth->addChild ( $role, $p5 );
		$auth->addChild ( $role, $p6 );
		// 分配权限至角色中
		$user = User::findByusername ( 'admin' );
		$auth->assign ( $role, $user->getId () );
	}
	public function down() {
		echo "m150628_020339_init_auth_item cannot be reverted.\n";
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

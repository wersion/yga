<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\TAdmUser */

$this->title = '更新用户';
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tadm-user-update">
<?php 
			 $model->setScenario('update');
		?>
    <?= $this->render('_form', [
        'model' => $model,
    	 'roles'=>$roles,
    	 'selectedRoles'=>$selectedRoles,
    	'accounts'=>$accounts,
    	'selectedAccounts'=>$selectedAccounts
    ]) ?>

</div>

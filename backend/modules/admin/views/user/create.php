<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\TAdmUser */

$this->title = '创建用户';
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tadm-user-create">
    <?= $this->render('_form', [
        'model' => $model,
    	'roles' => $roles,
    	'accounts'=>$accounts,
    	'selectedRoles'=>$selectedRoles,
    	'selectedAccounts'=>$selectedAccounts
    ]) ?>

</div>

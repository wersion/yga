<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = '添加角色';
$this->params['breadcrumbs'][] = ['label' => '角色管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', ['model' => $model,'hadPermissions'=>$hadPermissions,'permissions'=>$permissions]) ?>
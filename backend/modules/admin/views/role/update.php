<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
$this->params['breadcrumbs'] = [
    [
        'label' => '角色管理',
        'url'   => Url::toRoute(['rbac/roles'])
    ],
    '更新角色',
];
?>

<?= $this->render('_form', ['model' => $model,'hadPermissions'=>$hadPermissions,'permissions'=>$permissions]) ?>
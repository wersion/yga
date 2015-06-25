<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\weixin\models\Wechats */

$this->title = 'Update Wechats: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '微信号管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->weid]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="wechats-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\weixin\models\PublicAccount */

$this->title = '更新页面';
$this->params['breadcrumbs'][] = ['label' => '公众号管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="public-account-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

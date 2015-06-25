<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\weixin\models\Wechats */

$this->title = '添加公众号';
$this->params['breadcrumbs'][] = ['label' => '微信号管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wechats-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\weixin\models\PublicAccount */

$this->title = '更新页面';
$this->params['breadcrumbs'][] = ['label' => '公众号管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="public-account-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

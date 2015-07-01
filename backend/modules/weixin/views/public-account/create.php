<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\weixin\models\PublicAccount */

$this->title = '创建账号';
$this->params['breadcrumbs'][] = ['label' => '微信管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="public-account-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

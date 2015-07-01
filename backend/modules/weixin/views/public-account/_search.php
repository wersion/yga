<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\weixin\models\forsearch\PublicAccountSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="public-account-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'type') ?>
    <?= $form->field($model, 'level') ?>
    <?= $form->field($model, 'header_img') ?>

    <?php // echo $form->field($model, 'qrcode_img') ?>

    <?php // echo $form->field($model, 'accountName') ?>

    <?php // echo $form->field($model, 'original') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'province') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'signature') ?>

    <?php // echo $form->field($model, 'access_token') ?>

    <?php // echo $form->field($model, 'hash') ?>

    <?php // echo $form->field($model, 'token') ?>

    <?php // echo $form->field($model, 'EncodingAESKey') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'key') ?>

    <?php // echo $form->field($model, 'secret') ?>

    <?php // echo $form->field($model, 'welcome') ?>

    <?php // echo $form->field($model, 'default') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

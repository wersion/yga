<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\weixin\models\forsearch\WechatsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wechats-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'weid') ?>

    <?= $form->field($model, 'hash') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'uid') ?>

    <?= $form->field($model, 'token') ?>

    <?php // echo $form->field($model, 'EncodingAESKey') ?>

    <?php // echo $form->field($model, 'access_token') ?>

    <?php // echo $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'account') ?>

    <?php // echo $form->field($model, 'original') ?>

    <?php // echo $form->field($model, 'signature') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'province') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'welcome') ?>

    <?php // echo $form->field($model, 'default') ?>

    <?php // echo $form->field($model, 'default_message') ?>

    <?php // echo $form->field($model, 'default_period') ?>

    <?php // echo $form->field($model, 'lastupdate') ?>

    <?php // echo $form->field($model, 'key') ?>

    <?php // echo $form->field($model, 'secret') ?>

    <?php // echo $form->field($model, 'styleid') ?>

    <?php // echo $form->field($model, 'payment') ?>

    <?php // echo $form->field($model, 'shortcuts') ?>

    <?php // echo $form->field($model, 'quickmenu') ?>

    <?php // echo $form->field($model, 'parentid') ?>

    <?php // echo $form->field($model, 'subwechats') ?>

    <?php // echo $form->field($model, 'siteinfo') ?>

    <?php // echo $form->field($model, 'menuset') ?>

    <?php // echo $form->field($model, 'groups') ?>

    <?php // echo $form->field($model, 'accountlink') ?>

    <?php // echo $form->field($model, 'jsapi_ticket') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

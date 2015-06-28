<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tadm-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'uid') ?>

    <?= $form->field($model, 'groupid') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'salt') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'joindate') ?>

    <?php // echo $form->field($model, 'joinip') ?>

    <?php // echo $form->field($model, 'lastvisit') ?>

    <?php // echo $form->field($model, 'did') ?>

    <?php // echo $form->field($model, 'usemoney') ?>

    <?php // echo $form->field($model, 'money') ?>

    <?php // echo $form->field($model, 'validtime') ?>

    <?php // echo $form->field($model, 'lastip') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'password_hash') ?>

    <?php // echo $form->field($model, 'password_reset_token') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
use kartik\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin([
    'id'=>'userform'
]) ?>
<?= $form->field($model,'username')->textInput() ?>
<?= $form->field($model,'password')->passwordInput() ?>
<?= $form->field($model,'password_repeat')->passwordInput() ?>
<?= $form->field($model, 'salt')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'joindate')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'joinip')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'lastvisit')->textInput(['maxlength' => true]) ?>
<?php $form->end() ?>
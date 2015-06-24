<?php
use kartik\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin([
    'id'=>'userform'
]) ?>
<?= $form->field($model,'username')->textInput() ?>
<?= $form->field($model,'password')->passwordInput() ?>
<?= $form->field($model,'password_repeat')->passwordInput() ?>
<?php $form->end() ?>
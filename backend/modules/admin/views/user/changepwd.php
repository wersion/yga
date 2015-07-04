<?php
use yii\widgets\ActiveForm;
$this->params['breadcrumbs'] = [
    '修改密码'
];
?>
<div class="col-lg-6">
    <?php $form = ActiveForm::begin([]) ?>
    
    <?= $form->field($model,'password')->passwordInput(['value'=>''])->label('新密码')->hint('请填写新密码') ?>
    <?= $form->field($model,'password_repeat')->passwordInput()->label('重复新密码')->hint('请正确填写重复密码') ?>
    <div class="form-group center">
        <?= \yii\helpers\Html::submitButton('提交',['class'=>'btn btn-lg btn-primary']) ?>
    </div>
    <?php $form->end() ?>
</div>
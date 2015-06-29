<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>

<div class="tadm-user-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model,'username')->textInput() ?>
<?= $form->field($model,'password_hash')->passwordInput() ?>
<?= $form->field($model,'password_repeat')->passwordInput() ?>
<?= $form->field($model, 'status')->dropDownList(['-1'=>'禁用','0'=>'启用'])?>
<div class="form-group field-tadmuser-status">
<label class="control-label" for="tadmuser-status">管理员角色</label>
<?php 
			    echo Html::checkboxList('selectedRoles',[],ArrayHelper::map($roles, 'name', 'description'));
			?>
<div class="help-block"></div>
</div>	     
	     
	     
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

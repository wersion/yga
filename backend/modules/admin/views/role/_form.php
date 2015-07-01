<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin(); ?>
	<?= Html::hiddenInput('type',1)?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'rule_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>
	<div class="form-group field-tadmuser-status">
<label class="control-label" for="tadmuser-status">权限</label>
<?php 
			    echo Html::checkboxList('selectedPermissions',array_keys(ArrayHelper::map($hadPermissions,'name','description')),ArrayHelper::map($permissions, 'name', 'description'));
			?>
<div class="help-block"></div>
</div>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

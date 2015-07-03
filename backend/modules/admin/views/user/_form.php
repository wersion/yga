<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>

<div class="tadm-user-form">
    <?php $form = ActiveForm::begin(); ?>
   <?= $form->field($model,'username')->textInput() ?>
<?php 
	if(empty($model->id)){
	echo $form->field($model,'password')->passwordInput();
	echo $form->field($model,'password_repeat')->passwordInput();
	}
?>
<?= $form->field($model, 'status')->dropDownList(['-1'=>'禁用','0'=>'启用'])?>
<div class="form-group field-tadmuser-status">
<label class="control-label" for="tadmuser-status">管理员角色</label>
<?php 
			    echo Html::checkboxList('selectedRoles',array_keys(ArrayHelper::map($selectedRoles, 'name','description')),ArrayHelper::map($roles, 'name', 'description'));
			?>
<div class="help-block"></div>
</div>	   
  <?php if($accounts){?>
	 <div class="form-group field-tadmuser-status">
<?php 
		foreach ($accounts as $type => $as){
			if($type == 0){
				echo Html::label('微信公众账号:',null,['class'=>'control-label']);
				echo Html::checkboxList('selectedAccounts',array_keys(ArrayHelper::map($selectedAccounts, 'w_id', 'user_id')),ArrayHelper::map($as, 'id', 'name'));
			}else{
				echo Html::label('易信公众账号：',null,['class'=>'control-label']);
				echo Html::checkboxList('selectedAccounts',array_keys(ArrayHelper::map($selectedAccounts, 'w_id', 'user_id')),ArrayHelper::map($as, 'id', 'name'));
			}		
		}
			?>
<div class="help-block"></div>
</div>    
	     <?php }?>
	     
	     
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->params['breadcrumbs'] = [
    '欢迎页'
];
?>
<?= \kartik\widgets\Alert::widget([
    'icon'=>'icon-comment-alt',
    'body'=>'欢迎使用'.' <span class="kv-alert-title">'.Yii::$app->params['webname'].'</span>',
]) ?>
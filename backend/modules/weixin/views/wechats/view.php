<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\weixin\models\Wechats */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '微信号管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wechats-view">
    <p>
        <?= Html::a('更新', ['update', 'id' => $model->weid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->weid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'weid',
            'hash',
            'type',
            'uid',
            'token',
            'EncodingAESKey',
            'access_token',
            'level',
            'name',
            'account',
            'original',
            'signature',
            'country',
            'province',
            'city',
            'username',
            'password',
            'welcome',
            'default',
            'default_message',
            'default_period',
            'lastupdate',
            'key',
            'secret',
            'styleid',
            'payment',
            'shortcuts',
            'quickmenu',
            'parentid',
            'subwechats',
            'siteinfo',
            'menuset:ntext',
            'groups',
            'accountlink',
            'jsapi_ticket',
        ],
    ]) ?>

</div>

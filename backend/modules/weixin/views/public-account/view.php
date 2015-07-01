<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\weixin\models\PublicAccount */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Public Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="public-account-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'name',
            'type',
            'level',
            'header_img',
            'qrcode_img',
            'accountName',
            'original',
            'country',
            'province',
            'city',
            'signature:ntext',
            'access_token',
            'hash',
            'token',
            'EncodingAESKey',
            'username',
            'password',
            'key',
            'secret',
            'welcome:ntext',
            'default:ntext',
        ],
    ]) ?>

</div>

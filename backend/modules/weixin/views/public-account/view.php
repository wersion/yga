<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\weixin\models\PublicAccount */

$this->title = '公众账号页面';
$this->params['breadcrumbs'][] = ['label' => '公众号管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="public-account-view">
    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
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
            'name',
          	['attribute'=>'type',
             'value'=> $model->type == 0?'微信':'易信'
            ],
            ['attribute'=>'level',
             'value'=>$model->level == 0?'普通订阅号':$model->level==1?'认证订阅号/普通服务号':'认证服务号'
            ],
            ['attribute'=>'qrcode_img',
              'value'=>(yii::$app->urlManager->createAbsoluteUrl($model->qrcode_img != null ?"{$model->qrcode_img}":'upload/default.jpg')),
              'format'=>['image',['width'=>'150','height'=>'150']]
            ],
            [
            	'attribute'=>'header_img',
            		'value'=>(yii::$app->urlManager->createAbsoluteUrl($model->header_img != null?"{$model->header_img}":'upload/default.jpg')),
            		'format'=>['image',['width'=>'150','height'=>'150']]
            ],
            'account',
            'original',
            'country',
            'province',
            'city',
            'signature:ntext',
            'access_token',
            ['attribute'=>'hash',
             'label'=>'接口地址',
             'value'=> yii::$app->urlManager->getHostInfo().'/api.php?hash='.$model->hash
            ],
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

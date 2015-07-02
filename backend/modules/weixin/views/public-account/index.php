<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\weixin\models\forsearch\PublicAccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '微信管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="public-account-index">
    <p>
        <?= Html::a('创建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            ['attribute'=>'type',
             'label'=>'公众号类型',
             'content'=>function($model){
             return $model->type == 1?'微信':'易信';
            }
            ],
            [
            	'attribute'=>'level',
            	'label'=>'类别'	,
            	'value'=>function ($model){
            	return $model->level == 0?'普通订阅号':$model->level==1?'认证订阅号/普通服务号':'认证服务号';
            }
            ],
            'token',
            [
            	'attribute'=>'hash',
            	'label'=>'接口地址',
            	 'value'=> function($data){
                return yii::$app->urlManager->getHostInfo().'/api.php?hash='.$data->hash;
            }			
            ],
           [
            'header' => '操作',
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>

</div>

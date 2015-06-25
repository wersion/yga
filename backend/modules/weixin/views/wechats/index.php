<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\weixin\models\forsearch\WechatsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '微信号管理';
$this->params['breadcrumbs'][] = $this->title;
?>
    <p>
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'name',
            ['attribute'=>'membername',
             'label'=>'所属用户',
             'value'=> 'members.username'
            ],
            [
                'attribute'=>'hash',
                'label'=>'接口地址',
                'value'=> function($data){
                return yii::$app->urlManager->getHostInfo().'/api.php?hash='.$data->hash;
            }
            ],
            [
                'attribute'=>'token',
                'label'=>'Token',
            ],
            [
            'header' => '操作',
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>

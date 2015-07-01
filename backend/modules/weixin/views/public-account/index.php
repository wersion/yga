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
            'type',
            'level',
			[
			'label'=>'所属用户',
			'value'=>'ccc'
			],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

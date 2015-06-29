<?php
use yii\grid\GridView;
use yii\helpers\Html;
use common\components\MyHelper;

$this->params['breadcrumbs'] = [
    '角色管理',
];
?>
    <p>
        <?= Html::a('添加角色', 'create', ['class' => 'btn btn-sm btn btn-success']) ?>
    </p>

<?= GridView::widget([
    'dataProvider' => $dataprovider,
    'columns'      => [
        [
            'class'  => 'yii\grid\SerialColumn',
            'header' => '编号'
        ],
        'name:text:名称',
        'description:text:描述',
        'ruleName:text:规则名称',
        'createdAt:datetime:创建时间',
        [
            'class'    => 'yii\grid\ActionColumn',
            'header'   => '操作',
            'template' => '{view} {update} {delete}',
        ]
    ],
]) ?>
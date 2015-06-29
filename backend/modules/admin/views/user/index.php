<?php
use yii\bootstrap\Modal;
use kartik\widgets\ActiveForm;
use common\components\MyHelper;
use yii\helpers\Html;

$this->params['breadcrumbs'] = [
    '用户管理',
];
?>
 <p>
        <?= Html::a('添加', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?= \yii\grid\GridView::widget([
    'dataProvider' => $dataprovider,
    'filterModel' => $searchmodel,
    'columns' => [
        'id',
        'username',
        [
            'header' => '角色',
            'content' => function ($model) {
                $roles = Yii::$app->authManager->getRolesByUser($model->id);
                $roles = implode(',', array_keys($roles));
                return $roles;
            }
        ],
        [
            'header' => '操作',
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
        ],
    ],
]) ?>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\TAdmUser */

$this->title = '查看用户';
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tadm-user-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->uid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->uid], [
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
            'uid',
            'groupid',
            'username',
            'password',
            'salt',
            'status',
            'joindate',
            'joinip',
            'lastvisit',
            'did',
            'usemoney',
            'money',
            'validtime',
            'lastip',
            'remark',
            'auth_key',
            'password_hash',
            'password_reset_token',
        ],
    ]) ?>

</div>

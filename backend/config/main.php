<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'defaultRoute'=>'home',
    'language'=>'zh-CN',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'user' => [
            'identityClass' => 'backend\modules\admin\models\User',
            'enableAutoLogin' => true,
        ],
        'request'=>[
            'enableCsrfValidation'=>false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'home/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules'=>[
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            	'<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
                ['class' => 'yii\rest\UrlRule', 'controller' => 'user'],
            ],
        ],
        'authManager'=>[
            'class'=>'yii\rbac\DbManager'
        ]
    ],
    'params' => $params,
];

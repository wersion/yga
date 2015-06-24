<?php
$db = require(__DIR__.'/db.php');
$modules = require(__DIR__.'/modules.php');
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'modules' => $modules['modules'],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'db'=>$db['db'],
    ],
];

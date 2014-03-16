<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

return [
	'id' => 'basic-console',
	'basePath' => dirname(__DIR__),
	'preload' => ['log'],
	'controllerNamespace' => 'app\commands',
	'extensions' => require(__DIR__ . '/../vendor/yiisoft/extensions.php'),
	'components' => [
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
		'log' => [
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'db' => $db,
        'cryptsyMarket' => [
            'class' => 'app\components\CryptsyMarket',
        ],
        'baseMailer' => [
            'class' => 'app\components\BaseMailer',
            'from' => 'damien@doublehops.com',
            'fromName' => 'Coin Hawk',
        ],
	],
	'params' => $params,
];

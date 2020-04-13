<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
defined('SWOOLE_PROCESS') or define('SWOOLE_PROCESS',1);
defined('SWOOLE_TCP') or define('SWOOLE_TCP',1);
$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
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
    ],
    'params' => $params,

    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
        'swoole-backend' => [
            'class' => feehi\console\SwooleController::className(),
            'rootDir' => str_replace('config/console', '', __DIR__),        //yii2 项目根目录
            'app' => '',  //如果应用为 advanced ，值为 backend
            'host' => '127.0.0.1',
            'port' => 9998,
            'web' => 'web',   //默认为 web，rootDir app web 目的是拼接 yii2 的根目录，如果你的应用为basic，那么 app 为空即可
            'debug' => true,  //默认开启 debug，上线应设置为 false
            'env' => 'dev',  //默认为dev，上线 应置为 prod
            'swooleConfig' => [
                'reactor_num' => 2,
                'worker_num' => 4,
                'daemonize' => false,     //关闭守护进程
                'log_file'=>__DIR__ . '\runtime\logs\swoole.log',
                'log_level'=>0,
                'pid_file'=>__DIR__ . '\runtime\server.pid',
            ]
        ]
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;

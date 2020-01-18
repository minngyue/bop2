<?php

use yii\db\Connection;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$logFile = date('Ymd') . '.log';
$config = [
    'id' => 'basic',                        //用来区分其他应用的唯一标识ID
    'name' => 'testYii',                    //该属性指定你可能想展示给终端用户的应用名称，不同于需要唯一性的id属性，该属性可以不唯一，该属性用户显示 应用给的用途。如果没有用到，可以不配置该属性。
    'basePath' => dirname(__DIR__),         //该应用给的根目录，basePath属性经常用于派生一些其他路径（如runtime路径），因此 ，系统预定义@app代表这个路径，派生路径可以通过这个别名组成（@app/runtime代表runtime的路径)
    'bootstrap' => ['log'],                 //配置保证了log组件一直被加载
    'aliases' => [                          //使用这个属性来定义别名，代替Yii::setAlias()方法来设置，设置别名的两种方式
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
//    'defaultRoute' => '/home/install',           //该属性指定未配置的请求的响应 路由 规则,当请求'/'时，默认跳转apps控制器
//    'version' => '1.0',                         //该属性指定应用的版本，其他代码不使用的话可以不配置
//    'language' => 'zh_cn',                      //该属性指定应用展示给终端用户的语言。
//    'sourceLanguage' => 'en-US',                //该属性指定应用代码的语言
//    'charset' => 'UTF-8',                       //该属性指定应用使用的字符集，默认就是
//    'timeZone' => 'America/Los_Angeles',        //该属性提供一种修改PHP运行环境中的默认时区，配置该属性 本质上就是调用PHP函数date_default_timezone_set()
//    'extensions' => require __DIR__ . '/../vendor/yiisoft/extensions.php',    //该属性用数组列表指定应用安装和使用的扩展，默认使用@verdor/yiisoft/extenions.php文件返回的数组。

//    'layout' => 'main',         //该属性指定渲染视图默认使用的布局名字，默认布局文件路径别名，@app/views/layouts/main.php
//    'layoutPath'=> '@app/views/layouts/admin',      //该属性指定查找布局文件的路径，默认为 @app/views/layouts

    'runtimePath' => '@app/runtime',          //该属性指定临时文件如日志文件、缓存文件等保存路径， 默认值为带别名的 @app/runtime
    'viewPath' => '@app/views',

    'components' => [
        'assetManager' => [         //
            'appendTimestamp' => true,
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'hAfcR80HWgcOLWnG-xy95pD82XB-3F6p',
        ],
        'cache' => [                        //文件缓存
            'class' => 'yii\caching\FileCache',       //缓存接口1，且缓存存储在runtime/cache目录下
//            'class'=>'yii\redis\Cache',                 //缓存接口2，且缓存存储在redis数据库中，性能将大大提高
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '127.0.0.1',
            'port' => 6379,
            'database' => 0
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
//        'view' => [
//            'defaultExtension' => 'php',
//            'renderers' => [
//                'php' => [
//                    'class' => 'yii\smarty\ViewRenderer',
//                    'cachePath' => '@runtime/smarty/cache',
//                    'compilePath' => '@runtime/smarty/compile',
//                    'options' => [
//                        'left_delimiter' => '{{',
//                        'right_delimiter' => '}}',
//                    ],
//                    'pluginDirs' => ['@app/plugins/smarty'],
//                ],
//            ],
//        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,          //消息跟踪级别，Yii_DEBUG开启，每个日志消息被记录的时候，将被追加最多3个调用堆栈层级，
//            'flushInterval'=>1,         //为了让每个日志消息在日志目标中能够立即出现，应设置flushInterval和exportInterval都为1,注意频繁的消息刷新和导出将降低你的应用性能
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                    'categories' =>  'application.*',
                    'logFile'=>'logs/application.'.$logFile
//                    'exportInterval'=>1,
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning', 'info'],
                    'categories' => 'console.*',
                    'logFile'=>'logs/console'.$logFile
//
                ],
                [
                    'class' => 'yii\log\DbTarget',        //在数据库表里保存他们
                    'levels' => ['error', 'warning']
                ]
                //邮件日志
//                [
//                    'class' => 'yii\log\EmailTarget',
//                    'levels' => ['error', 'warning', 'info'],
//                    'categories' => ['yii\db\*'],
//                    'message' => [
//                        'from' => ['log@example.com'],
//                        'to' => ['admin@example.com', 'developer@example.com'],
//                        'subject' => 'Database errors at example.com',
//                    ]
//                ]
            ],
        ],
        'db' => $db,
        //配置URL规则
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,      //是否启用严格解析，且仅当enablePrettyUrl 为true时，才使用属性，严格解析，传入*请求的URL至少与rules之一匹配，才能视为有效请求
            'showScriptName' => false,        //是否在构造的URL中显示条目脚本名称，默认为true，仅当enablePrettyUrl为true时使用
            'rules' => [
//                ['class' => 'yii\rest\UrlRule', 'controller' => 'user'],
                '/' => '/home/site/index',
                '/admin/home' => '/admin/home/index',
            ],
        ]
    ],

    /*
    //该属性允许你指定一个控制ID到任意控制器类。当然指向的视图不变，所以任意控制器的数据需要和视图的中的变量相同，否则会报数据错误
    'controllerMap'=>[
        //注释原因：指向控制器的数据和视图渲染的数据变量不同，暂时不需要
        'apps'=>'app\controllers\CountryController'
        'country'=>[
            'class'=>'app\controllers\AppsController'
        ]
    ],
    'controllerNamespace'=>'app\controllers',           //该属性指定控制器类默认的命名空间，默认为app\controllers
    */
    'modules' => [
        'booking' => 'app\modules\booking\BookingModule',     //在gii中设置模块类及模块ID自动生成模块
        'comment' => [
            'class' => 'app\modules\comment\CommentModule',
            'db' => [
                'tablePrefix' => 'main_',
                'class' => Connection::className(),
                'enableQueryCache' => false
            ],
        ],
        'homing' => 'app\modules\homing\HomingModule',
    ],
    'params' => $params,            //使用方法：Yii::$app->params[''];
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;

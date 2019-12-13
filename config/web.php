<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',                        //用来区分其他应用的唯一标识ID
    'name' => 'testYii',                    //该属性指定你可能想展示给终端用户的应用名称，不同于需要唯一性的id属性，该属性可以不唯一，该属性用户显示 应用给的用途。如果没有用到，可以不配置该属性。
    'basePath' => dirname(__DIR__),         //该应用给的根目录，basePath属性经常用于派生一些其他路径（如runtime路径），因此 ，系统预定义@app代表这个路径，派生路径可以通过这个别名组成（@app/runtime代表runtime的路径)
    'bootstrap' => ['log'],                 //配置保证了log组件一直被加载
    'aliases' => [                          //使用这个属性来定义别名，代替Yii::setAlias()方法来设置，设置别名的两种方式
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
//    'version' => '1.0',                         //该属性指定应用的版本，其他代码不使用的话可以不配置
//    'language' => 'zh_cn',                      //该属性指定应用展示给终端用户的语言。
//    'sourceLanguage' => 'en-US',                //该属性指定应用代码的语言
//    'extensions' => require __DIR__ . '/../vendor/yiisoft/extensions.php',        //该属性用数组列表指定应用安装和使用的扩展，默认使用@verdor/yiisoft/extensions.php文件返回的数组。
//    'charset' => 'UTF-8',                       //该属性指定应用使用的字符集，默认就是
//    'timeZone' => 'America/Los_Angeles',        //该属性提供一种修改PHP运行环境中的默认时区，配置该属性 本质上就是调用PHP函数date_default_timezone_set()

    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'hAfcR80HWgcOLWnG-xy95pD82XB-3F6p',
        ],
        'cache' => [                        //文件缓存
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
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
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        //配置URL规则
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,      //是否启用严格解析，且仅当enablePrettyUrl 为true时，才使用属性，严格解析，传入*请求的URL至少与rules之一匹配，才能视为有效请求
            'showScriptName' => false,        //是否在构造的URL中显示条目脚本名称，默认为true，仅当enablePrettyUrl为true时使用
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'user'],
            ],
        ]
    ],
    'controllerMap'=>[                  //该属性允许你指定一个控制ID到任意控制器类。当然指向的视图不变，所以任意控制器的数据需要和视图的中的变量相同，否则会报数据错误
        //注释原因：指向控制器的数据和视图渲染的数据变量不同，暂时不需要
//        'apps'=>'app\controllers\CountryController'
//        'country'=>[
//            'class'=>'app\controllers\AppsController'
//        ]
    ],
    'params' => $params,
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

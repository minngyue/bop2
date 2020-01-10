<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
define('YII_ENABLE_ERROR_HANDLER',true);           //标识是否启用Yii提供的错误处理，默认为true

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
require __DIR__. '/../components/functions/function.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();

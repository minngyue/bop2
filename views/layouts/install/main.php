<?php
/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <!-- 优先使用最新的ie版本-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--主要设置移动端页面布局，initial-scale（初始缩放比例） -->
        <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0">
        <meta name="description" content="BOP,是一个PHP轻量级开源API接口文档管理系统，致力于减少前后端沟通成功，提高团队协作开发效率，打造PHP的RAP。">
        <meta name="version" content="{{APP_VERSION}}">
        <meta name="author" content="minngyue">
        <title><?= \app\components\utils\Utils::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <?php $this->beginBody() ?>
    <body>
    <div class="container">
        <?= $content ?>
    </div>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php
    $this->registerJsFile('/plugins/bootstrap/js/bootstrap.min.js',['depends'=>[AppAsset::className()]]);
    $this->registerJsFile('/plugins/layer/layer.min.js',['depends'=>[AppAsset::className()]]);
    $this->registerJsFile('/plugins/metismenu/js/metisMenu.min.js',['depends'=>[AppAsset::className()]]);
    $this->registerJsFile('/plugins/artdialog/js/dialog.min.js',['depends'=>[AppAsset::className()]]);
    $this->registerJsFile('/plugins/validform/datatype.min.js',['depends'=>[AppAsset::className()]]);
    $this->registerJsFile('/js/app.min.js',['depends'=>[AppAsset::className()]]);
    ?>
    </body>
    <?php $this->endBody() ?>
    </html>
<?php $this->endPage() ?>
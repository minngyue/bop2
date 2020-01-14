<?php
/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use app\assets\AdminAsset;

AdminAsset::register($this);
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
    <?php AdminAsset::addJs($this,'@app/static/plugins/bootstrap/js/bootstrap.min.js') ?>
<!--    --><?php //AdminAsset::addJs($this,'@app/static/plugins/layer/layer.min.js') ?>
<!--    --><?php //AdminAsset::addJs($this,'@app/static/plugins/metismenu/js/metisMenu.min.js') ?>
    </body>
    <?php $this->endBody() ?>
    </html>
<?php $this->endPage() ?>
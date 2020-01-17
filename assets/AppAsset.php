<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
        'plugins/bootstrap/css/bootstrap.min.css',
        'plugins/fontawesome/css/font-awesome.min.css',
        'plugins/validform/v5.3.2.min.css',
        'css/app.min.css',
        'css/install.min.css',
    ];
    public $js = [
        'js/jquery2.1.0.min.js',
        'plugins/validform/v5.3.2.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public $jsOptions = [
        'position'=>\yii\web\View::POS_HEAD,
    ];

    //定义按需加载JS方法
    public static function addJs($view, $jsfile) {
        $view->registerJsFile(
            $jsfile,
            [
                AppAsset::className(),
                "depends" => "app\assets\AppAsset"
            ]
        );
    }

    //定义按需加载css方法
    public static function addCss($view, $cssfile) {
        $view->registerCssFile(
            $cssfile,
            [
                AppAsset::className(),
                "depends" => "app\assets\AppAsset"
            ]
        );
    }
}

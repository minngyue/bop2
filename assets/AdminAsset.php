<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/1/10
 * Time: 15:15
 */
namespace app\assets;

use Yii;
use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    //资源文件的源文件位置
    public $sourcePath = '@app/static';
    //当前事例引入的文件
    public $css = [
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
    //没有依赖
    public $depends = [

    ];

    public $jsOptions = [
        'position'=>\yii\web\View::POS_HEAD,
    ];

    public $cssOptions = [

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
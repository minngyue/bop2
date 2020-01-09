<?php
namespace app\components;
use Yii;
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2019/10/28
 * Time: 12:04
 */
abstract class BaseLayoutManager
{
    CONST DEFAULT_CSS = 'default_css';

    CONST EDIT_CSS = 'edit_css';

    CONST DEFAULT_JS = 'default_js';

    CONST EDIT_JS = 'edit_js';

    CONST INFO_JS = 'info_js';

    CONST HIGHCHART_JS = 'highchart';

    CONST DATATABLES_JS = 'datatables';

    CONST PAGE_DEFAULT_JS = 'bop2';

    /**
     * 打印适配JS
     */
    static $_WRITE_COMPATIBLE_JS = true;


    static $SYSTEM_JS = array(
        self::DEFAULT_JS,
        self::EDIT_JS,
        self::INFO_JS,
        self::HIGHCHART_JS,
        self::DATATABLES_JS,
        self::PAGE_DEFAULT_JS,
    );

    /**
     * 打印默認的CSS
     * @param string $type
     * @param array $css
     */
    public static function writeCss($type = 'default', $css = array())
    {
        switch ($type) {
            case 'edit':
                $css_array = self::writeConfigCss(self::EDIT_CSS, $css);
                break;
            case 'default':
            default:
                $css_array = self::writeConfigCss(self::DEFAULT_CSS, $css);
                break;
        }
        if (!is_array($css_array)) {
            $css_array = array($css_array);
        }

        $location = Yii::getAlias('@app' . '/static/css/');
        $location = Yii::$app->params['resource'].'/css/';
        foreach ($css_array as $v) {
            echo '<link href="' . $location . $v . '" type="text/css" rel="stylesheet" />', "\r\n";
        }
    }

    /**
     * 打印配置文件css
     * @param $css_keys
     * @param array $css
     * @return array | null
     */
    public static function writeConfigCss($css_keys, $css = array())
    {
        if (is_string($css_keys)) {
            $css_keys = explode(',', $css_keys);
        }
        foreach ($css_keys as $k) {
            if (is_array(Yii::$app->params['static'][$k])) {
                $css = array_unique(array_merge(Yii::$app->params['static'][$k], $css));
            }
        }
        $css_array = [];
        foreach ($css as $k) {
            $cfg = isset(Yii::$app->params['static'][$k]) ? : null;
            if (is_array($cfg)) {
                $css_array = array_merge($css_array, $cfg);
            } else if (strlen($cfg) > 0) {
                $css_array[] = $cfg;
            } else {
                $css_array[] = $k;
            }
        }

        return $css_array;
    }

    /**
     * 打印默認的JS
     * @param string $type
     * @param array $js
     */
    public static function writeJs($type = 'default', $js = array())
    {
        switch ($type) {
            case 'edit':
                $js_array = self::writeConfigJs(self::EDIT_JS, $js);
                break;
            case 'default':
            default:
                $js_array = self::writeConfigJs(self::DEFAULT_JS, $js);
                break;
        }

        if (!$js_array){
            return;
        }

        if (!is_array($js_array)) {
            $js_array = array($js_array);
        }
        $location = Yii::getAlias('@app' . '/static/js/');
        $language = Yii::$app->language;
        $html = [];
        foreach ($js_array as $v) {
            if (in_array($v, self::$SYSTEM_JS) && $extends = Yii::$app->params['static'][$v]) { // 是系统级js，即存在配置项则打印其数组
                foreach ($extends as $v0) {
                    $html[] = '<script src="' . $location . $v0 . '" type="text/javascript"></script>';
                }
            }
            $html[] = '<script src="' . $location . $v . '" type="text/javascript"></script>';
        }
        $seaVer = isset(Yii::$app->params['static']['sea_version']) ? Yii::$app->params['static']['sea_version'] : '1.0';
        echo join("\r\n", str_ireplace('{SEA_VERSION}', $seaVer, str_ireplace('{LANG}', $language, $html))), "\r\n";
        if (self::$_WRITE_COMPATIBLE_JS) echo <<<EOT
<!--[if lt IE 9]>
<script src="{$location}plugins/excanvas.min.js" type="text/javascript"></script>
<script src="{$location}plugins/respond.min.js" type="text/javascript"></script>
<![endif]-->\r\n
EOT;
        self::$_WRITE_COMPATIBLE_JS = false;
    }

    /**
     * 打印配置文件中的JS
     * @param string|array $js_keys   配置文件中的key
     * @param array $js  额外的js
     * @return array
     */
    public static function writeConfigJs($js_keys, $js = array())
    {
        if (is_string($js_keys)) {
            $js_keys = explode(',', $js_keys);
        }
        $_js = array();
        foreach ($js_keys as $k) {
            if (is_array(Yii::$app->params['static'][$k])) {
                $_js = array_merge($_js, Yii::$app->params['static'][$k]);
            } else {
                array_push($_js, $k);
            }
        }
        if (is_string($js)) {
            $js = array($js);
        }
        foreach ($js as $k) {
            if (is_array(Yii::$app->params['static'][$k])) {
                $_js = array_merge($_js, Yii::$app->params['static'][$k]);
            } else {
                array_push($_js, $k);
            }
        }
        return $_js;
    }
}
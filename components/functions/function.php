<?php
if (!function_exists('url')){
    /**
     * @param string $route
     * @param array $params
     * @param bool $scheme
     */
    function url($route = '',$params = [],$scheme = false)
    {
        if (!$route){
            return yii\helpers\Url::current($params,$scheme);
        }
        $params[] = $route;
        return yii\helpers\Url::toRoute($params,$scheme);
    }
}

/**
 * 生成CSRF口令
 */
if (!function_exists('csrf_token')){
    function csrf_token()
    {
        return Yii::$app->request->csrfToken;
    }
}

/**
 * 获取系统配置信息
 */
if (!function_exists('config')){
    function config($name,$type = 'app'){
        $name = trim($name);
        if (strpos($name,'.') !== false){
            list($type,$field) = explode('.',$name);
        }else{
            $field = $name;
        }
        return \app\models\Config::findModel(['type'=>$type])->$field;
    }
}
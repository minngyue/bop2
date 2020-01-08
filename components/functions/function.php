<?php
if (!function_exists('url')){
    /**
     * @param string $route
     * @param array $params
     * @param bool $scheme
     * Author Minnyue
     * Created At 2020/1/8 18:34
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
<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/3/27
 * Time: 10:54
 */
namespace app\controllers\test\swoole;

use yii\web\Controller;

class TestController extends Controller{
    public function actionIndex()
    {
        $server = new \swoole_server('127.0.0.1',9501);
    }
}
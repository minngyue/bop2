<?php
/**
 * 测试Log日志功能的
 * User: MinngYue
 * Date: 2019/12/27
 * Time: 16:06
 */
namespace app\controllers\test;
use app\models\Apps;
use yii\db;
use yii\web\Controller;

class LogsController extends Controller
{
    public function actionIndex()
    {
        $apps = Apps::findOne(1);
        \Yii::info('32432424');
        //配置enabled属性来开启或者禁用日志目标，你可以通过日志目标配置去做，或者是在你的代码中放入下面的PHP申明。
        //需要配合web.php中的log配置才有用，键值为file
//        \Yii::$app->log->targets['file']->enabled = false;
    }
}
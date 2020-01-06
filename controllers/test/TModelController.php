<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2019/12/27
 * Time: 17:24
 */
namespace app\controllers\test;
use app\models\Apps;
use app\models\User;
use yii\web\Controller;

class TModelController extends Controller
{
    //访问路径：域名/test/t-model/labels
    public function actionLabels()
    {
        $model = new Apps();
        echo $model->getAttributeLabel('appid');

    }

    function actionScenario()
    {
        //设置场景一：作为属性设置
//        $model = new Apps();
//        $model->scenario = 'save';

        //设置场景二：通过构造初始化配置来设置
//        $model = new Apps(['scenario'=>'save']);
    }
}
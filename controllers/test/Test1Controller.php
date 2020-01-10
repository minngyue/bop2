<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2019/10/28
 * Time: 14:27
 */
namespace app\controllers\test;

use Yii;
use yii\web\Controller;
use app\models\test\EntryForm;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

class Test1Controller extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionM()
    {
        $entryForm = new EntryForm();
        $entryForm->name = '2222';
        echo $entryForm->name;
    }

    public function actionComponent()
    {
        var_dump(@$this->viewPath);
    }

    function actionStr()
    {
        var_dump(Inflector::camel2id(StringHelper::basename(get_called_class()), '_'));
    }

    function actionRedis()
    {
        $redis = Yii::$app->redis;
        $redis->set('username','777777');
        var_dump($redis->get('username'));exit;

    }


}
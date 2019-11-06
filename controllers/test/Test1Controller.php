<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2019/10/28
 * Time: 14:27
 */
namespace app\controllers\test;
use yii\web\Controller;
use app\models\test\EntryForm;

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
}
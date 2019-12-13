<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2019/12/12
 * Time: 16:56
 */
namespace app\controllers;
use app\components\UBaseController;
use app\models\test\EntryForm;

class LoginController extends UBaseController
{
    public function actionLogin()
    {
        $model = new EntryForm();
       return $this->render('index',compact('model'));
    }
}

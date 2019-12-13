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
use app\models\User;

class LoginController extends UBaseController
{
    public function actionLogin()
    {
        $model = new User();

        $model->scenario = 'login';

        $model = new User(['scenario'=>'login']);
        $model = new EntryForm();
       return $this->render('index',compact('model'));
    }
}

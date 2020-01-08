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
use app\models\UserModel;
use yii\filters\AccessControl;

class LoginController extends UBaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],       //允许所有访客（还未经认证的用户）
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],       //允许已认证用户执行
                    ]
                ]
            ]
        ];
    }

    public function actionLogin()
    {
        $model = new UserModel();

        $model->scenario = 'login';

        $model = new User(['scenario' => 'login']);
        $model = new EntryForm();
        return $this->render('index', compact('model'));
    }
}

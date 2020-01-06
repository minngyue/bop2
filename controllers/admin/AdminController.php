<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/1/3
 * Time: 17:03
 */

namespace app\controllers\admin;

use app\components\UBaseController;
use app\models\UserModel;


class AdminController extends UBaseController
{

    public function behaviors()
    {
        return [
            'class' => 'yii\filters\HttpCache',
            'only' => ['index', 'view'],
            'except' => ['save'],
            'lastModified' => function ($action, $params) {
                $q = new \yii\db\Query();
                return $q->from('user')->max('updated_at');
            }
        ];
    }

    public function actionIndex()
    {
        $admin = UserModel::find();
        var_dump($admin);
    }

    public function actionView()
    {
        echo 'view';
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/1/3
 * Time: 17:03
 */

namespace app\controllers\admin;

use app\components\controllers\UBaseController;
use app\models\Profile;
use app\models\User;
use app\models\UserModel;
use yii\filters\AccessControl;

class AdminController extends UBaseController
{

    /**
     * 备注：二维数组配置
     * @return array
     * Author Minnyue
     * Created At 2020/1/7 17:11
     */
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\HttpCache',
                'only' => ['index', 'view'],
//                'lastModified' => function ($action, $params) {
//                    $q = new \yii\db\Query();
//                    return $q->from('7tw_users')->max('updated_at');
//                },
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update'],
                'rules' => [
                    //允许认证用户
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $user =  User::findOne(1);
        var_dump(Profile::findOne(1));
    }

    public function actionView()
    {
        echo 'view';
    }
}
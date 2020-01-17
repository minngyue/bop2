<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/1/8
 * Time: 14:06
 */
namespace app\models;

use Yii;
use app\models\User;

class Account extends User
{
    const USER_TYPE = 10;       //普通用户类型
    const ADMIN_TYPE = 20;      //管理员类型

    /**
     * @param $email
     * @return null|static
     * Author Minnyue
     * Created At 2020/1/17 14:35
     */
    public static function findByEmail($email)
    {
        return self::findOne(['email'=>$email]);
    }
}
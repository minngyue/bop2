<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2019/12/27
 * Time: 18:21
 */
namespace app\models;

use yii\db\ActiveRecord;

class UserModel extends ActiveRecord
{
    CONST SCENARIO_LOGIN = 'login';

    CONST SCENARIO_REGISTER = 'register';

    public function scenarios()
    {
        return [
            self::SCENARIO_LOGIN  =>['username','password'],
            self::SCENARIO_REGISTER =>['username','email','password']
        ];
    }
}
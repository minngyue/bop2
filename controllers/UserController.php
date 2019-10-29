<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2019/10/29
 * Time: 18:09
 */
namespace app\controllers;

use yii\rest\ActiveController;
class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';

}
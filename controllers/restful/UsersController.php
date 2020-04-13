<?php


namespace app\controllers\restful;

use Yii;
use yii\rest\ActiveController;

class UsersController extends ActiveController
{
    public $layout = false;
    public $modelClass = 'app\models\User';     //通过指定 modelClass 作为 app\models\User，控制器就能知道使用哪个模型去获取和处理数据。

}
<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/1/19
 * Time: 11:16
 */
namespace app\controllers\home;

use Yii;
use app\components\controllers\UBaseController;

class ProjectController extends UBaseController
{
    function actionIndex()
    {
        echo 34343;
    }

    public function actionSelect()
    {
        return $this->render('select',[]);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/1/14
 * Time: 18:21
 */
namespace app\controllers\home;

use Yii;
use app\components\controllers\UBaseController;

class SiteController extends UBaseController
{
    public function actionIndex()
    {
        return $this->redirect(['project/select']);
    }
}
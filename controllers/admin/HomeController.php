<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/1/18
 * Time: 17:16
 */
namespace app\controllers\admin;

use Yii;
use app\components\controllers\UBaseController;

class HomeController extends UBaseController
{
    public $layout = 'main';

    public function actionIndex()
    {
        return $this->display('index');
    }

    public function display($view, $params = [])
    {
        exit($this->render($view));
    }
}
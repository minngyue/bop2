<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/1/8
 * Time: 18:28
 */
namespace app\controllers\home;

use app\components\controllers\UBaseController;
use Yii;
use yii\web\Response;

class InstallController extends UBaseController
{
    public function actionStep1()
    {
        $request = Yii::$app->request;

        if ($request->isPost){
            Yii::$app->response->format = Response::FORMAT_JSON;
            Yii::$app->cache->set('step',1);
            return ['status'=>'success','callback'=>url('home/install/step2')];
        }
        return $this->view;
    }
}
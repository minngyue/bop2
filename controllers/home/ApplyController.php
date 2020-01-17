<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/1/16
 * Time: 16:15
 */

namespace app\controllers\home;

use app\models\Apply;
use Yii;
use app\components\controllers\UBaseController;

class ApplyController extends UBaseController
{
    public function actionIndex()
    {
        $params = Yii::$app->request->queryParams;

        $params['check_status'] = Apply::CHECK_STATUS;
        $params['order_by'] = 'id desc';
        $model = Apply::findModel()->search($params);

        return $this->display('index', ['apply' => $model]);
    }
}
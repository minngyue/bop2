<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2019/12/12
 * Time: 17:49
 */

namespace app\controllers;

use app\components\UBaseController;
use app\models\Country;
use yii\data\Pagination;

class CountryController extends UBaseController
{
    public function actionIndex()
    {
        $query = Country::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


        return $this->render('index',['countries'=>$countries,'pagination'=>$pagination]);
    }
}
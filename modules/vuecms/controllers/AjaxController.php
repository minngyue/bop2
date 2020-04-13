<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/3/10
 * Time: 14:34
 */
namespace app\modules\vuecms\controllers;

use app\modules\vuecms\models\News;
use yii\web\Controller;
use Yii;
class AjaxController extends Controller
{
    public $layout = false;
    public function actionNews()
    {
        //使用AR查询
//        $data =  News::findBySql('SELECT * FROM vue_articles')->all();
        //使用Query 查询
        $data = (new \yii\db\Query())->select(['id','title'])->from('vue_articles')->limit(10)->all();

        return json_encode(['status'=>0,'data'=>$data]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
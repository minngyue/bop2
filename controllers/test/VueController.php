<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/2/26
 * Time: 12:09
 */

namespace app\controllers\test;

use Yii;
use app\components\controllers\UBaseController;

class VueController extends UBaseController
{

    function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    }

    function actionJson()
    {
        return json_encode([
            [
                'id' => 1,
                'name' => '11',
                'ctime' => time()
            ], [
                'id' => 2,
                'name' => '22',
                'ctime' => time()
            ]]);
    }

    function actionReturn()
    {
        file_put_contents("E:/workspace/tmp/1.txt",print_r($_REQUEST,1));
        return json_encode(['message'=>'成功','code'=>0]);
    }
}
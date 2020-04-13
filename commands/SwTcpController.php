<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/3/27
 * Time: 11:18
 */

namespace app\commands;

use feehi\swoole\SwooleServer;
use yii\console\Controller;

class SwTcpController extends Controller
{
    //sw tcp服务
    private $_tcp;

    public function actionIndex(){
        \Yii::warning("This is a warning message.");
    }

    //控制台应用方法
    public function actionRun(){
        $this->_tcp = new SwooleServer('0.0.0.0',9501);
        $this->_tcp = new \swoole_server('0.0.0.0',9501);
    }
}
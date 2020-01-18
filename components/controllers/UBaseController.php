<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2019/12/12
 * Time: 16:57
 */
namespace app\components\controllers;

use Yii;
use app\components\utils\Utils;
use app\models\Apply;
use app\models\Config;
use yii\helpers\Url;
use yii\web\Controller;

class UBaseController extends Controller
{

    public $layout = false;

    public $checkLogin = true;

    public function beforeAction($action)
    {
        if(!$this->isInstalled()){
            return $this->redirect(['/home/install/step1'])->send();
        }

        $config = Config::findModel(['type'=>'safe']);

        $ipWhiteList = array_filter(explode('\r\n',trim($config->ip_white_list)));
        $ipBlackList = array_filter(explode('\r\n',trim($config->ip_black_list)));

        $ip = Utils::getUserIp();

        if ($ipWhiteList && !in_array($ip,$ipWhiteList)){
//            return $this->error();
        }
        return true;
    }

    /**
     * 展示模板
     * @param $view
     * @param array $params
     * Author Minnyue
     * Created At 2020/1/8 18:11
     */
    public function display($view, $params = [])
    {
        if (!Yii::$app->user->isGuest){
            $notify = Apply::findModel(['check_status'=>Apply::CHECK_STATUS, 'order_by'=>'id desc']);
            $account = Yii::$app->user->identity;

            $params['notify'] = $notify;
            $params['account'] = $account;
        }
        exit($this->render($view ,$params));
    }
    /**
     * 错误提示信息
     * @param $message
     * @param int $jumpSeconds
     * @param string $jumpUrl
     * Author Minnyue
     * Created At 2020/1/8 17:59
     */
    public function error($message, $jumpSeconds = 3, $jumpUrl = '')
    {
        $jumpUrl = $jumpUrl ? Url::toRoute($jumpUrl) : Yii::$app->request->referrer;

        return $this->display('/home/');
    }

    /**
     * 判断是否已经安装过
     * @return bool
     * Author Minnyue
     * Created At 2020/1/8 17:44
     */
    public function isInstalled()
    {
        return file_exists(Yii::getAlias('@runtime') . '/install/install.lock');
    }
}
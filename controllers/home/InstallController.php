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
    public $layout = '/install/main';
//    public $layout = false;

    public function beforeAction($action)
    {
        if ($this->isInstalled()) {
            $app_version = Yii::$app->params['app_version'];
            exit('BOP2 V' . $app_version . ' 已安装过，请不要重复安装，如果需要重新安装，请先删除runtime/install/install.lock');
        }

        return true;
    }

    public function actionStep1()
    {
        $request = Yii::$app->request;
//
        if ($request->isPost) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            Yii::$app->cache->set('step', 1);
            return ['status' => 'success', 'callback' => url('home/install/step2')];
        }

        $step1 = [
            'runtime' => [
                'have_chmod' => $this->getChmodLabel(Yii::getAlias('@runtime')),
                'require_chmod' => '可读、可写',
                'check_chmod' => is_writable(Yii::getAlias('@runtime'))
            ],
            'runtime/cache'=>[
                'have_chmod' =>$this->getChmodLabel(Yii::getAlias('@runtime/cache')),
                'require_chmod' => '可读、可写',
                'check_chmod'=>is_writable(Yii::getAlias('@runtime/cache')),
            ],
            'runtime/install'=>[
                'have_chmod' =>$this->getChmodLabel(Yii::getAlias('@runtime/install')),
                'require_chmod' => '可读、可写',
                'check_chmod'=>is_writable(Yii::getAlias('@runtime/install')),
            ],
            'config/db'=>[
                'have_chmod' =>$this->getChmodLabel(Yii::getAlias('@app/config/db.php')),
                'require_chmod' => '可读、可写',
                'check_chmod'=>is_writable(Yii::getAlias('@app/config/db.php')),
            ]
        ];

        return $this->display('/install/step1',compact('step1'));
    }

    public function actionStep2()
    {
        echo 'step2';
    }

    public function action333()
    {
        echo 33444;
    }

    /**
     * 获取权限
     * @param $dirName
     * @return string
     * Author Minnyue
     * Created At 2020/1/9 12:00
     */
    private function getChmodLabel($dirName)
    {
        $chmod = '';

        is_readable($dirName) && $chmod = '可读、';
        is_writable($dirName) && $chmod .= '可写、';
        is_executable($dirName) && $chmod .= '可执行、';

        return trim($chmod, '、');
    }


}
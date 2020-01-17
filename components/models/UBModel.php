<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/1/8
 * Time: 12:21
 */
namespace app\components\models;

use app\models\Account;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class UBModel extends ActiveRecord
{
    public $models;
    public $pages;
    public $params;
    public $query;
    public $count;
    public $sql;
    public $pageSize = 20;

    CONST ACTION_STATUS = 10;           //启用状态
    CONST DISABLE_STATUS = 20;          //禁用状态
    CONST DELETE_STATUS = 30;           //删除状态

    public $statusLabels = [
        self::ACTION_STATUS => '正常',
        self::DISABLE_STATUS => '禁用',
        self::DELETE_STATUS => '删除'
    ];

    /**
     * 实例化模型
     * @param null $condition
     * @return Model|null
     * Author Minnyue
     * Created At 2020/1/8 14:00
     */
    public static function findModel($condition = null)
    {
        if (!$condition) {
            return new static();
        }

        if (($model = static::findOne($condition)) !== null) {
            return $model;
        }
    }

    /**
     * 获取错误信息
     * @return int|null|string
     * Author Minnyue
     * Created At 2020/1/8 14:03
     */
    public function getErrorLabel()
    {
        return key($this->getFirstErrors());
    }

    /**
     * 创建加密Id
     * Author Minnyue
     * Created At 2020/1/8 14:03
     */
    public function createEncodeId()
    {
        return date('Y') . substr(time(),-5) .substr(microtime(),2,5);
    }

    /**
     * 获取状态文案
     * @return mixed
     * Author Minnyue
     * Created At 2020/1/8 14:05
     */
    public function getStatusLabel()
    {
        return $this->statusLabels[$this->status];
    }

    /**
     * 获取创建者
     * Author Minnyue
     * Created At 2020/1/8 14:05
     */
    public function getCreater()
    {
        return $this->hasOne(Account::className(),['id'=>'creater_id']);
    }

    /**
     * 获取更新者
     * Author Minnyue
     * Created At 2020/1/8 14:05
     */
    public function getUpdater()
    {
        return $this->hasOne(Account::className(),['id'=>'updater_id']);
    }

    public function getUserIp()
    {
        return Yii::$app->request->userIP;
    }

    /**
     * 获取当前格式化时间
     * @param string $format
     * @return false|string
     * Author Minnyue
     * Created At 2020/1/8 14:09
     */
    public function getNowTime($format = '')
    {
        $format = $format ? : 'Y-m-d H:i:s';
        return date($format);
    }

    public function getRandomString()
    {
        $key = Yii::$app->getSecurity()->generateRandomString();
        return $key;
    }

    CONST ENCRYPT_TYPE_DES = 1;

    CONST ENCRYPT_TYPE_AES = 2;

    /**
     * 获取安装时间
     * @return mixed
     * Author Minnyue
     * Created At 2020/1/8 15:37
     */
    public function getInstallTime()
    {
        $file = Yii::getAlias("@runtime") .'/install/install.lock';
        if (file_exists($file)){
            $install = file_get_contents($file);
            return json_decode($install)->installed_at;
        }
    }

    /**
     * 获取错误信息
     * @return mixed
     * Author Minnyue
     * Created At 2020/1/17 15:06
     */
    public function getErrorMessage()
    {
        return current($this->getFirstErrors());
    }


}
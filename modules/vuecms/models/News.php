<?php
/**
 * Created by PhpStorm.
 * User: MinngYue
 * Date: 2020/3/10
 * Time: 14:36
 */
namespace app\modules\vuecms\models;

use Yii;
use app\components\models\UBModel;

class News extends UBModel
{
    public static function tableName(){
        return '{{%articles}}';
    }
    public static function getDb()
    {
        return Yii::$app->db2;
    }
}

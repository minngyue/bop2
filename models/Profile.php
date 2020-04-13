<?php
namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

class Profile extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%profile}}';
    }
}
<?php

namespace app\models\logs;

use Yii;

/**
 * This is the model class for table "{{%login_log}}".
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property string $user_name 用户名称
 * @property string $user_email 用户邮箱
 * @property string $ip 登录ip
 * @property string $location 登录地址
 * @property string|null $browser 浏览器
 * @property string|null $os 操作系统
 * @property string|null $created_at 登录时间
 * @property string|null $updated_at 更新时间
 */
class CreateLog extends \app\components\models\UBModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%login_log}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['user_name', 'user_email', 'ip'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_name', 'user_email', 'ip'], 'string', 'max' => 50],
            [['location'], 'string', 'max' => 255],
            [['browser', 'os'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'user_email' => 'User Email',
            'ip' => 'Ip',
            'location' => 'Location',
            'browser' => 'Browser',
            'os' => 'Os',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

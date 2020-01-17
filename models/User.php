<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $email 登录邮箱
 * @property string $name 昵称
 * @property string $password_hash 密码
 * @property string $auth_key
 * @property int $type 用户类型，10:普通用户 20:管理员
 * @property int $status 会员状态
 * @property string $ip 注册ip
 * @property string $location IP地址
 * @property string|null $created_at 创建时间
 * @property string|null $updated_at 更新时间
 */
class User extends \app\components\models\UBModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auth_key', 'status'], 'required'],
            [['type', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['email', 'name'], 'string', 'max' => 50],
            [['password_hash', 'auth_key', 'ip'], 'string', 'max' => 250],
            [['location'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'Name',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'type' => 'Type',
            'status' => 'Status',
            'ip' => 'Ip',
            'location' => 'Location',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @param string $password
     * @param string $cost
     */
    public function setPassword($password,$cost = null){
        $this->password_hash = Yii::$app->security->generatePasswordHash($password,$cost);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
}

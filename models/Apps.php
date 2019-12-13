<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%apps}}".
 *
 * @property string $appid APPID
 * @property string $appkey 通用密钥
 * @property string $app_secret 支付密钥
 * @property string $name 名称
 * @property string $slug Slug
 * @property string $logo 图标
 * @property string $remark 简介
 * @property int $mode 模式
 * @property string $type 类型
 * @property string $stype 子分类
 * @property int $state 状态
 * @property int $pay_state 开启支付
 * @property int $score 评分
 * @property int $is_original 是否原创
 * @property string $open_date 开放时间
 * @property string $created_user 创建者
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 * @property string $published_at 发布时间
 */
class Apps extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%apps}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['appid'], 'required'],
            [['appid', 'mode', 'type', 'stype', 'state', 'pay_state', 'score', 'is_original', 'created_at', 'updated_at', 'published_at'], 'integer'],
            [['open_date'], 'safe'],
            [['appkey', 'app_secret', 'name', 'slug', 'created_user'], 'string', 'max' => 32],
            [['logo'], 'string', 'max' => 128],
            [['remark'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['appid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'appid' => 'Appid',
            'appkey' => 'Appkey',
            'app_secret' => 'App Secret',
            'name' => 'Name',
            'slug' => 'Slug',
            'logo' => 'Logo',
            'remark' => 'Remark',
            'mode' => 'Mode',
            'type' => 'Type',
            'stype' => 'Stype',
            'state' => 'State',
            'pay_state' => 'Pay State',
            'score' => 'Score',
            'is_original' => 'Is Original',
            'open_date' => 'Open Date',
            'created_user' => 'Created User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'published_at' => 'Published At',
        ];
    }
}

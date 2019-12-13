<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%activities}}".
 *
 * @property string $id
 * @property string $appid APPID
 * @property string $title 标题
 * @property string $slug SEO链接
 * @property string $logo LOGO
 * @property string $banner Banner
 * @property int $type 活动类型
 * @property string $content 活动内容
 * @property string $show_at 显示时间
 * @property string $start_at 开始时间
 * @property string $end_at 结束时间
 * @property int $state 状态
 * @property string $created_user 操作人
 * @property string $created_at
 * @property string $updated_user 更新者
 * @property int $updated_at
 */
class Activities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%activities}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['appid', 'type', 'show_at', 'start_at', 'end_at', 'state', 'created_at', 'updated_at'], 'integer'],
            [['content', 'show_at', 'updated_at'], 'required'],
            [['content'], 'string'],
            [['title', 'logo', 'banner'], 'string', 'max' => 128],
            [['slug', 'created_user', 'updated_user'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'appid' => 'Appid',
            'title' => 'Title',
            'slug' => 'Slug',
            'logo' => 'Logo',
            'banner' => 'Banner',
            'type' => 'Type',
            'content' => 'Content',
            'show_at' => 'Show At',
            'start_at' => 'Start At',
            'end_at' => 'End At',
            'state' => 'State',
            'created_user' => 'Created User',
            'created_at' => 'Created At',
            'updated_user' => 'Updated User',
            'updated_at' => 'Updated At',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%env}}".
 *
 * @property int $id
 * @property string $encode_id 加密id
 * @property int $project_id 项目id
 * @property string $title 环境名称
 * @property string $name 环境标识
 * @property string $base_url 环境根路径
 * @property int $sort 环境排序
 * @property int $status 环境状态
 * @property int $creater_id 创建者id
 * @property int $updater_id 更新者id
 * @property string|null $created_at 创建时间
 * @property string|null $updated_at 更新时间
 */
class Env extends \app\components\models\UBModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%env}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['encode_id', 'project_id', 'title', 'name', 'base_url'], 'required'],
            [['project_id', 'sort', 'status', 'creater_id', 'updater_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['encode_id', 'title'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 10],
            [['base_url'], 'string', 'max' => 250],
            [['encode_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'encode_id' => 'Encode ID',
            'project_id' => 'Project ID',
            'title' => 'Title',
            'name' => 'Name',
            'base_url' => 'Base Url',
            'sort' => 'Sort',
            'status' => 'Status',
            'creater_id' => 'Creater ID',
            'updater_id' => 'Updater ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%api}}".
 *
 * @property int $id
 * @property string $encode_id 加密id
 * @property int $project_id 项目ID
 * @property int $module_id 模块id
 * @property string $title 接口名
 * @property string $request_method 请求方式
 * @property string $response_format 响应格式
 * @property string $uri 接口地址
 * @property string $remark 接口简介
 * @property int $status 接口状态
 * @property int $sort 接口排序
 * @property int $creater_id 创建者id
 * @property int $updater_id 更新者id
 * @property string|null $created_at 创建时间
 * @property string|null $updated_at 更新时间
 */
class Api extends \app\components\models\UBModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%api}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['encode_id', 'title', 'request_method', 'response_format', 'uri', 'status', 'sort'], 'required'],
            [['project_id', 'module_id', 'status', 'sort', 'creater_id', 'updater_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['encode_id'], 'string', 'max' => 50],
            [['title', 'uri', 'remark'], 'string', 'max' => 250],
            [['request_method', 'response_format'], 'string', 'max' => 20],
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
            'module_id' => 'Module ID',
            'title' => 'Title',
            'request_method' => 'Request Method',
            'response_format' => 'Response Format',
            'uri' => 'Uri',
            'remark' => 'Remark',
            'status' => 'Status',
            'sort' => 'Sort',
            'creater_id' => 'Creater ID',
            'updater_id' => 'Updater ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

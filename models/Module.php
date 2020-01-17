<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%module}}".
 *
 * @property int $id
 * @property string $encode_id 加密id
 * @property int $project_id 项目id
 * @property string $title 模块名称
 * @property string $remark 项目描述
 * @property int $status 模块状态 
 * @property int $sort 模块排序
 * @property int $creater_id 创建者id
 * @property int $updater_id 更新者id
 * @property string|null $created_at 创建时间
 * @property string|null $updated_at 更新时间
 */
class Module extends \app\components\models\UBModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%module}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['encode_id', 'project_id', 'title', 'status'], 'required'],
            [['project_id', 'status', 'sort', 'creater_id', 'updater_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['encode_id', 'title'], 'string', 'max' => 50],
            [['remark'], 'string', 'max' => 250],
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

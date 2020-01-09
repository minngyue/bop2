<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%project}}".
 *
 * @property int $id
 * @property string $encode_id 加密id
 * @property string $title 项目名称
 * @property string $remark 项目描述
 * @property int $sort 项目排序
 * @property int $status 项目状态
 * @property int $type 项目类型
 * @property int $creater_id 创建者id
 * @property int $updater_id 更新者id
 * @property string|null $created_at 创建时间
 * @property string|null $updated_at 更新时间
 */
class Project extends \app\components\models\UModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%project}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['encode_id', 'title', 'status', 'type'], 'required'],
            [['sort', 'status', 'type', 'creater_id', 'updater_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['encode_id'], 'string', 'max' => 50],
            [['title', 'remark'], 'string', 'max' => 250],
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
            'title' => 'Title',
            'remark' => 'Remark',
            'sort' => 'Sort',
            'status' => 'Status',
            'type' => 'Type',
            'creater_id' => 'Creater ID',
            'updater_id' => 'Updater ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

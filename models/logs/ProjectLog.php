<?php

namespace app\models\logs;

use Yii;

/**
 * This is the model class for table "{{%project_log}}".
 *
 * @property int $id
 * @property int $project_id 项目id
 * @property string $object_name 操作对象
 * @property int $object_id 操作对象id
 * @property int $user_id 操作人id
 * @property string $type 操作类型
 * @property string $content 操作内容
 * @property string|null $created_at 创建时间
 * @property string|null $updated_at 更新时间
 */
class ProjectLog extends \app\components\models\UBModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%project_log}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'object_id', 'user_id'], 'integer'],
            [['object_name', 'content'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['object_name', 'type'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'object_name' => 'Object Name',
            'object_id' => 'Object ID',
            'user_id' => 'User ID',
            'type' => 'Type',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

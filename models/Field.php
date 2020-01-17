<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%field}}".
 *
 * @property int $id
 * @property string $encode_id 加密ID
 * @property int|null $api_id 接口ID
 * @property int|null $post_method post请求方式
 * @property string|null $header_fields header字段
 * @property string|null $request_fields 请求字段
 * @property string|null $response_fields 响应字段
 * @property int $creater_id 创建者id
 * @property int $updater_id 更新者id
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class Field extends \app\components\models\UBModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%field}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['encode_id', 'created_at'], 'required'],
            [['api_id', 'post_method', 'creater_id', 'updater_id'], 'integer'],
            [['header_fields', 'request_fields', 'response_fields'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['encode_id'], 'string', 'max' => 50],
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
            'api_id' => 'Api ID',
            'post_method' => 'Post Method',
            'header_fields' => 'Header Fields',
            'request_fields' => 'Request Fields',
            'response_fields' => 'Response Fields',
            'creater_id' => 'Creater ID',
            'updater_id' => 'Updater ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

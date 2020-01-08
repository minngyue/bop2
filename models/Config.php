<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%config}}".
 *
 * @property int $id
 * @property string $type 配置类型
 * @property string $content 配置内容
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class Config extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%config}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'content'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['type'], 'string', 'max' => 10],
            [['type'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * 获取不存在字段
     * @param string $name
     * @return mixed|void
     * Author Minnyue
     * Created At 2020/1/8 12:18
     */
    public function __get($name)
    {
        if (!$this->hasAttribute($name)){
            $config = json_decode($this->content);
            return $config->$name;
        }
        return parent::__get($name);
    }


}

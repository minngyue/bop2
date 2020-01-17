<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%member}}".
 *
 * @property int $id
 * @property string $encode_id 加密id
 * @property int $project_id 项目id
 * @property int $user_id 用户id
 * @property int $join_type 加入方式
 * @property string $project_rule 项目权限
 * @property string $env_rule 环境权限
 * @property string $template_rule 模板权限
 * @property string $module_rule 模块权限
 * @property string $api_rule 接口权限
 * @property string $member_rule 成员权限
 * @property int $creater_id 创建者id
 * @property int|null $updater_id 更新者id
 * @property string|null $created_at 创建时间
 * @property string|null $updated_at 更新时间
 */
class Member extends \app\components\models\UBModel
{
    const INITIATIVE_JOIN_TYPE = 10; // 主动加入
    const PASSIVE_JOIN_TYPE    = 20; // 邀请加入

    public $find = ['look','create','update','transfer','export','delete','remove','template'];

    public $replace = ['查看、','添加、','编辑、','转让、','导出、','删除、','移除、','模板、'];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%member}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['encode_id', 'project_id', 'user_id', 'join_type'], 'required'],
            [['project_id', 'user_id', 'join_type', 'creater_id', 'updater_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['encode_id'], 'string', 'max' => 50],
            [['project_rule', 'env_rule', 'template_rule', 'module_rule', 'api_rule', 'member_rule'], 'string', 'max' => 100],
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
            'user_id' => 'User ID',
            'join_type' => 'Join Type',
            'project_rule' => 'Project Rule',
            'env_rule' => 'Env Rule',
            'template_rule' => 'Template Rule',
            'module_rule' => 'Module Rule',
            'api_rule' => 'Api Rule',
            'member_rule' => 'Member Rule',
            'creater_id' => 'Creater ID',
            'updater_id' => 'Updater ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * 成员所有加入方式
     * @return array
     */
    public function getJoinTypeLabels()
    {
        return [
            self::INITIATIVE_JOIN_TYPE => '申请加入',
            self::PASSIVE_JOIN_TYPE    => '邀请加入',
        ];
    }

    /**
     * 获取成员加入方式标签
     * @return mixed
     */
    public function getJoinTypeLabel()
    {
        return $this->joinTypeLabels[$this->join_type];
    }

    /**
     * @return \yii\db\ActiveQuery
     * Author Minnyue
     * Created At 2020/1/17 16:25
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(),['id'=>'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     * Author Minnyue
     * Created At 2020/1/17 16:25
     */
    public function getAccount()
    {
        return $this->hasOne(Account::className(),['id'=>'user_id']);
    }

}

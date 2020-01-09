<?php

namespace app\models;

use Yii;
use app\components\models\UBModel;

/**
 * This is the model class for table "doc_apply".
 *
 * @property int $id
 * @property int $project_id 项目id
 * @property int $user_id 申请用户id
 * @property int $status 审核状态
 * @property string $ip IP
 * @property string $location ip定位地址
 * @property string|null $created_at 申请日期
 * @property string|null $updated_at 更新时间
 * @property string|null $checked_at 处理日期
 */
class Apply extends UBModel
{

    const CHECK_STATUS = 10; //待审核状态
    const PASS_STATUS  = 20; //审核通过状态
    const REFUSE_STATUS = 30; //审核拒绝状态

    public $statusLabels = [
        self::CHECK_STATUS => '审核中',
        self::PASS_STATUS => '审核通过',
        self::REFUSE_STATUS => '审核拒绝',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%apply}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'user_id', 'ip', 'location'], 'required'],
            [['project_id', 'user_id', 'status'], 'integer'],
            [['created_at', 'updated_at', 'checked_at'], 'safe'],
            [['ip', 'location'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => '项目ID',
            'user_id' => '申请用户id',
            'status' => '审核状态',
            'ip' => 'IP',
            'location' => 'ip定位地址',
            'created_at' => '申请日期',
            'updated_at' => '更新时间',
            'checked_at' => '处理日期',
        ];
    }

    /**
     * 获取项目
     * @return \yii\db\ActiveQuery
     * Author Minnyue
     * Created At 2020/1/9 11:35
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(),['id'=>'project_id']);
    }

    /**
     * 获取申请者
     * @return \yii\db\ActiveQuery
     */
    public function getApplier()
    {
        return $this->hasOne(Account::className(),['id'=>'user_id']);
    }
}

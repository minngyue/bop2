<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Apps;

/**
 * AppsSearch represents the model behind the search form of `app\models\Apps`.
 */
class AppsSearch extends Apps
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['appid', 'mode', 'type', 'stype', 'state', 'pay_state', 'score', 'is_original', 'created_at', 'updated_at', 'published_at'], 'integer'],
            [['appkey', 'app_secret', 'name', 'slug', 'logo', 'remark', 'open_date', 'created_user'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Apps::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'appid' => $this->appid,
            'mode' => $this->mode,
            'type' => $this->type,
            'stype' => $this->stype,
            'state' => $this->state,
            'pay_state' => $this->pay_state,
            'score' => $this->score,
            'is_original' => $this->is_original,
            'open_date' => $this->open_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'published_at' => $this->published_at,
        ]);

        $query->andFilterWhere(['like', 'appkey', $this->appkey])
            ->andFilterWhere(['like', 'app_secret', $this->app_secret])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'created_user', $this->created_user]);

        return $dataProvider;
    }
}

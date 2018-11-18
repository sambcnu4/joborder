<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Orders;

/**
 * OrdersSearch represents the model behind the search form of `app\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'assign_id', 'departments_id', 'status_id'], 'integer'],
            [['date_at', 'order_no', 'user_request', 'location', 'asset_no', 'equipment', 'title', 'details', 'hc_job', 'photo', 'file'], 'safe'],
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
        $query = Orders::find();

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
            'id' => $this->id,
            'assign_id' => $this->assign_id,
            'departments_id' => $this->departments_id,
            'status_id' => $this->status_id,
        ]);

        $query->andFilterWhere(['like', 'date_at', $this->date_at])
            ->andFilterWhere(['like', 'order_no', $this->order_no])
            ->andFilterWhere(['like', 'user_request', $this->user_request])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'asset_no', $this->asset_no])
            ->andFilterWhere(['like', 'equipment', $this->equipment])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'hc_job', $this->hc_job])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}

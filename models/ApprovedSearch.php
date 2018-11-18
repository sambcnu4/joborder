<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Approved;
//use app\models\Status;

/**
 * ApprovedSearch represents the model behind the search form of `app\models\Approved`.
 */
class ApprovedSearch extends Approved {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['id', 'orders_id'], 'integer'],
                [['date_ap', 'approve_name', 'comment'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Approved::find();

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
            'orders_id' => $this->orders_id,
            //'status_id' => $this->orders->status->id,
        ]);

        $query->andFilterWhere(['like', 'date_ap', $this->date_ap])
                ->andFilterWhere(['like', 'approve_name', $this->approve_name])
                ->andFilterWhere(['like', 'comment', $this->comment]);
                //->andFilterWhere(['like', 'status', $this->orders->status->status_name]);

        return $dataProvider;
    }

}

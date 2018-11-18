<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Actions;

/**
 * ActionsSearch represents the model behind the search form of `app\models\Actions`.
 */
class ActionsSearch extends Actions {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['id', 'orders_id', 'forward_id', 'cost', 'wage'], 'integer'],
                [['operator_name', 'forward_no', 'cause', 'process', 'date_start', 'date_end', 'sparepart', 'pr_no', 'remask', 'photo', 'file'], 'safe'],
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
        $query = Actions::find();

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
            'forward_id' => $this->forward_id,
            'cost' => $this->cost,
            'wage' => $this->wage,
        ]);

        $query->andFilterWhere(['like', 'operator_name', $this->operator_name])
                ->andFilterWhere(['like', 'forward_no', $this->forward_no])
                ->andFilterWhere(['like', 'cause', $this->cause])
                ->andFilterWhere(['like', 'process', $this->process])
                ->andFilterWhere(['like', 'date_start', $this->date_start])
                ->andFilterWhere(['like', 'date_end', $this->date_end])
                ->andFilterWhere(['like', 'sparepart', $this->sparepart])
                ->andFilterWhere(['like', 'pr_no', $this->pr_no])
                ->andFilterWhere(['like', 'remask', $this->remask])
                ->andFilterWhere(['like', 'photo', $this->photo])
                ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }

}

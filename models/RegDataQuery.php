<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RegData;

/**
 * RegDataQuery represents the model behind the search form of `app\models\RegData`.
 */
class RegDataQuery extends RegData
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['company_name', 'inn', 'adress', 'kkt', 'zn_kkt', 'fn', 'zn_fn', 'licens', 'proshivka', 'rnm', 'vid_raboti', 'date_reg', 'status'], 'safe'],
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
        $query = RegData::find();

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
            'proshivka' => $this->proshivka,
            'date_reg' => $this->date_reg,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'kkt', $this->kkt])
            ->andFilterWhere(['like', 'zn_kkt', $this->zn_kkt])
            ->andFilterWhere(['like', 'fn', $this->fn])
            ->andFilterWhere(['like', 'zn_fn', $this->zn_fn])
            ->andFilterWhere(['like', 'licens', $this->licens])
            ->andFilterWhere(['like', 'rnm', $this->rnm])
            ->andFilterWhere(['like', 'vid_raboti', $this->vid_raboti])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}

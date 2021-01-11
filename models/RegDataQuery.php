<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RegData;

/**
 * RegDataQuery represents the model behind the search form about `app\models\RegData`.
 */
class RegDataQuery extends RegData
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'inn', 'mesto_ustanovki', 'adress_ustanovki', 'kkt', 'zn_kkt', 'fn', 'zn_fn', 'rnm', 'licens', 'proshivka', 'vid_raboti', 'date_reg', 'status'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = RegData::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'proshivka' => $this->proshivka,
            'date_reg' => $this->date_reg,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'mesto_ustanovki', $this->mesto_ustanovki])
            ->andFilterWhere(['like', 'adress_ustanovki', $this->adress_ustanovki])
            ->andFilterWhere(['like', 'kkt', $this->kkt])
            ->andFilterWhere(['like', 'zn_kkt', $this->zn_kkt])
            ->andFilterWhere(['like', 'fn', $this->fn])
            ->andFilterWhere(['like', 'zn_fn', $this->zn_fn])
            ->andFilterWhere(['like', 'rnm', $this->rnm])
            ->andFilterWhere(['like', 'licens', $this->licens])
            ->andFilterWhere(['like', 'vid_raboti', $this->vid_raboti])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }

    public function searchExp()
    {
        $query = RegData::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // if (!($this->load($params) && $this->validate())) {
        //     return $dataProvider;
        // }

        $query->andFilterWhere([
            'id' => $this->id,
            'proshivka' => $this->proshivka,
            'date_reg' => $this->date_reg,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'mesto_ustanovki', $this->mesto_ustanovki])
            ->andFilterWhere(['like', 'adress_ustanovki', $this->adress_ustanovki])
            ->andFilterWhere(['like', 'kkt', $this->kkt])
            ->andFilterWhere(['like', 'zn_kkt', $this->zn_kkt])
            ->andFilterWhere(['like', 'fn', $this->fn])
            ->andFilterWhere(['like', 'zn_fn', $this->zn_fn])
            ->andFilterWhere(['like', 'rnm', $this->rnm])
            ->andFilterWhere(['like', 'licens', $this->licens])
            ->andFilterWhere(['like', 'vid_raboti', $this->vid_raboti])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Organization;

/**
 * OrganizationQuery represents the model behind the search form about `app\models\Organization`.
 */
class OrganizationQuery extends Organization
{
    public function rules()
    {
        return [
            [['name', 'inn', 'adress', 'director', 'ofd'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Organization::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'inn' => $this->inn,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'director', $this->director])
            ->andFilterWhere(['like', 'ofd', $this->ofd]);

        return $dataProvider;
    }

    public function searchExp($params)
    {
        $query = Organization::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // if (($this->load($params) && $this->validate())) {
        //     return $dataProvider;
        // }

        $query->andFilterWhere([
            'inn' => $this->inn,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'director', $this->director])
            ->andFilterWhere(['like', 'ofd', $this->ofd]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Organization;

/**
 * OrganizationQuery represents the model behind the search form of `app\models\Organization`.
 */
class OrganizationQuery extends Organization
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'inn', 'adress', 'director', 'mesto_ustanovki', 'adress_ustanovki', 'ofd'], 'safe'],
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
        $query = Organization::find();

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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'director', $this->director])
            ->andFilterWhere(['like', 'mesto_ustanovki', $this->mesto_ustanovki])
            ->andFilterWhere(['like', 'adress_ustanovki', $this->adress_ustanovki])
            ->andFilterWhere(['like', 'ofd', $this->ofd]);

        return $dataProvider;
    }
}

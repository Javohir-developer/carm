<?php

namespace backend\modules\companies\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\companies\models\Companies;

/**
 * CompaniesSearch represents the model behind the search form of `backend\modules\companies\models\Companies`.
 */
class CompaniesSearch extends Companies
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'companies_type'], 'integer'],
            [['name', 'subdomain', 'logo_sliders', 'photo_companies', 'currency', 'address_ru', 'address_uz', 'latitude', 'longitude', 'working_mode', 'email', 'call', 'telegram', 'facebook', 'instagram', 'about', 'created_at', 'updated_at'], 'safe'],
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
        $query = Companies::find();

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
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'companies_type' => $this->companies_type,
        ]);

        $query->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'photo_companies', $this->photo_companies])
            ->andFilterWhere(['ilike', 'currency', $this->currency])
            ->andFilterWhere(['ilike', 'address_ru', $this->address_ru])
            ->andFilterWhere(['ilike', 'address_uz', $this->address_uz])
            ->andFilterWhere(['ilike', 'latitude', $this->latitude])
            ->andFilterWhere(['ilike', 'longitude', $this->longitude])
            ->andFilterWhere(['ilike', 'working_mode', $this->working_mode])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'call', $this->call])
            ->andFilterWhere(['ilike', 'telegram', $this->telegram])
            ->andFilterWhere(['ilike', 'facebook', $this->facebook])
            ->andFilterWhere(['ilike', 'instagram', $this->instagram])
            ->andFilterWhere(['ilike', 'about', $this->about]);

        return $dataProvider;
    }
}

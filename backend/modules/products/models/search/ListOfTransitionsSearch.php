<?php

namespace app\modules\products\models\search;

use backend\modules\products\models\ListOfTransitions;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ListOfTransitionsSearch represents the model behind the search form of `backend\modules\products\models\ListOfTransitions`.
 */
class ListOfTransitionsSearch extends ListOfTransitions
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_date', 'to_date'], 'safe'],
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
        $query = ListOfTransitions::find();
        $query->where(['user_id' => Yii::$app->user->id, 'company_id' => Yii::$app->company->id()]);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['>=', 'date', $this->from_date])
                ->andFilterWhere(['<=', 'date', $this->to_date]);

        return $dataProvider;
    }
}

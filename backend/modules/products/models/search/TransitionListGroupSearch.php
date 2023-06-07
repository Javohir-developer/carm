<?php

namespace app\modules\products\models\search;

use backend\modules\products\models\TransitionListGroup;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TransitionListGroupSearch represents the model behind the search form of `backend\modules\products\models\TransitionListGroup`.
 */
class TransitionListGroupSearch extends TransitionListGroup
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
        $query = TransitionListGroup::find();
        $query->select(['code_group', 'user_id', 'warehouse_id', 'supplier_id', 'count(*) as count_product', 'sum(amount) as amount', 'sum(sum_entry_price) as sum_entry_price', 'sum(sum_exit_price) as sum_exit_price']);
        $query->where(['user_id' => Yii::$app->user->id, 'company_id' => Yii::$app->company->id()]);
        $query->groupBy(['code_group', 'user_id', 'warehouse_id', 'supplier_id']);
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

        // grid filtering conditions
        $query->andFilterWhere(['>=', 'date', $this->from_date])
            ->andFilterWhere(['<=', 'date', $this->to_date]);

        return $dataProvider;
    }
}

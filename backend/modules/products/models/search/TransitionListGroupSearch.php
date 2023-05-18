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
            [['id', 'user_id', 'company_id', 'warehouse_id', 'supplier_id', 'product_types_id', 'currency', 'barcode', 'group', 'size_num', 'size_type', 'ikpu', 'unit_amount', 'max_ast', 'min_ast', 'term_amount', 'term_type', 'ndc', 'unit_type', 'amount', 'input_status', 'status', 'code_group'], 'integer'],
            [['date', 'name', 'model', 'brand', 'production_time', 'valid', 'created_at', 'updated_at'], 'safe'],
            [['currency_amount', 'entry_price', 'evaluation', 'exit_price', 'sum_entry_price', 'sum_exit_price'], 'number'],
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
        $query->select(['code_group', 'user_id', 'date', 'warehouse_id', 'supplier_id', 'count(*) as count_product', 'sum(amount) as amount', 'sum(sum_entry_price) as sum_entry_price', 'sum(sum_exit_price) as sum_exit_price']);
        $query->where(['user_id' => Yii::$app->user->id, 'company_id' => Yii::$app->company->id()]);
        $query->groupBy(['code_group', 'user_id', 'date', 'warehouse_id', 'supplier_id', 'code_group']);
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

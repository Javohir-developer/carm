<?php

namespace app\modules\products\models\search;

use backend\modules\products\models\Products;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProductsSearch represents the model behind the search form of `backend\modules\products\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'company_id', 'warehouse_id', 'supplier_id', 'currency', 'currency_amount', 'barcode', 'group', 'ikpu', 'unit_amount', 'max_ast', 'min_ast', 'term_amount', 'term_type', 'ndc', 'entry_price', 'exit_price', 'old_entry_price', 'old_exit_price', 'unit_type', 'amount', 'input_status', 'status'], 'integer'],
            [['date', 'type', 'model', 'brand', 'size', 'production_time', 'valid', 'created_at', 'updated_at'], 'safe'],
            [['evaluation', 'old_evaluation'], 'number'],
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
        $query = Products::find();

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
            'user_id' => $this->user_id,
            'company_id' => $this->company_id,
            'warehouse_id' => $this->warehouse_id,
            'supplier_id' => $this->supplier_id,
            'date' => $this->date,
            'currency' => $this->currency,
            'currency_amount' => $this->currency_amount,
            'barcode' => $this->barcode,
            'group' => $this->group,
            'ikpu' => $this->ikpu,
            'unit_amount' => $this->unit_amount,
            'max_ast' => $this->max_ast,
            'min_ast' => $this->min_ast,
            'production_time' => $this->production_time,
            'term_amount' => $this->term_amount,
            'term_type' => $this->term_type,
            'valid' => $this->valid,
            'ndc' => $this->ndc,
            'entry_price' => $this->entry_price,
            'evaluation' => $this->evaluation,
            'exit_price' => $this->exit_price,
            'old_entry_price' => $this->old_entry_price,
            'old_evaluation' => $this->old_evaluation,
            'old_exit_price' => $this->old_exit_price,
            'unit_type' => $this->unit_type,
            'amount' => $this->amount,
            'input_status' => $this->input_status,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['ilike', 'type', $this->type])
            ->andFilterWhere(['ilike', 'model', $this->model])
            ->andFilterWhere(['ilike', 'brand', $this->brand])
            ->andFilterWhere(['ilike', 'size', $this->size]);

        return $dataProvider;
    }
}

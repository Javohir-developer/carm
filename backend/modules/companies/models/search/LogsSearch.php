<?php

namespace backend\modules\companies\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\companies\models\Logs;

/**
 * LogsSearch represents the model behind the search form of `common\models\Logs`.
 */
class LogsSearch extends Logs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['user_name', 'user_old_log', 'user_new_log', 'datetime'], 'safe'],
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
        $query = Logs::find();

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
            'datetime' => $this->datetime,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'user_old_log', $this->user_old_log])
            ->andFilterWhere(['like', 'user_new_log', $this->user_new_log]);

        return $dataProvider;
    }
}

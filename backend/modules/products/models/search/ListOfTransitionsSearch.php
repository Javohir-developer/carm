<?php

namespace app\modules\products\models\search;

use backend\modules\products\models\ListOfTransitions;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

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
            [['code_group'], 'safe'],
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

        $query->andFilterWhere(['=', 'code_group', $this->code_group]);

        return $dataProvider;
    }
}

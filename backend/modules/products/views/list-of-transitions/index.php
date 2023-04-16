<?php

use backend\modules\products\models\ListOfTransitions;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var \app\modules\products\models\search\ListOfTransitionsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'List Of Transitions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-of-transitions-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create List Of Transitions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'company_id',
            'warehouse_id',
            'supplier_id',
            //'date',
            //'currency',
            //'currency_amount',
            //'barcode',
            //'group',
            //'type',
            //'model',
            //'brand',
            //'size',
            //'ikpu',
            //'unit_amount',
            //'max_ast',
            //'min_ast',
            //'production_time',
            //'term_amount',
            //'term_type',
            //'valid',
            //'ndc',
            //'entry_price',
            //'evaluation',
            //'exit_price',
            //'sum_entry_price',
            //'sum_exit_price',
            //'unit_type',
            //'amount',
            //'input_status',
            //'status',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ListOfTransitions $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

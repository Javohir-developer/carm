<?php

use backend\modules\parameters\models\Products;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var \app\modules\parameters\models\search\ProductsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
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
            //'old_entry_price',
            //'old_evaluation',
            //'old_exit_price',
            //'unit_type',
            //'amount',
            //'input_status',
            //'status',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Products $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

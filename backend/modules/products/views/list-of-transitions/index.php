<?php

use backend\modules\products\models\ListOfTransitions;
use backend\modules\products\models\ProductTypes;
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
<div class="container-fluid list-of-transitions-index">


<!--    <p>-->
<!--        --><?php //= Html::a('Create List Of Transitions', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'options' => ['class' => 'table-parent-div'],
        'headerRowOptions' => ['class' => 'no-wrap'],
        'tableOptions' => ['class' => 'table table-striped table-bordered'],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['class'=>'left-position-sticky'],
                'contentOptions' => ['class' => 'left-position-sticky'],
            ],
            'barcode',
            [
                'attribute' => 'warehouse_id',
                'value' => function($data){
                    return $data->warehouse->name;
                }
            ],
            [
                'attribute' => 'supplier_id',
                'value' => function($data){
                    return $data->supplier->name;
                }
            ],
            [
                'attribute' => 'product_types_id',
                'value' => function($data){
                    return isset($data->productTypes->name) ? $data->productTypes->name : '';
                }
            ],
            [
                'attribute' => 'currency',
                'value' => function($data){
                    return ListOfTransitions::currencyType()[$data->currency];
                }
            ],
            [
                'attribute' => 'unit_type',
                'value' => function($data){
                    return ListOfTransitions::unitType()[$data->unit_type];
                }
            ],
            'amount',
            'entry_price',
            'evaluation',
            'exit_price',
            'sum_entry_price',
            'sum_exit_price',
            'brand',
            'model',
            'size',
            'date',
        ],
    ]); ?>

</div>

<?php

use backend\modules\products\models\TransitionListGroup;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var \app\modules\products\models\search\TransitionListGroupSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<div class="container-fluid transition-list-group-index">
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
            [
                'attribute' => 'date',
                'value' => function($data){
                    return $data::dateCodeGroup($data->code_group);
                }
            ],
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
            'count_product',
            'amount',
            [
                'attribute' => 'sum_entry_price',
                'value' => function($data){
                    return $data::Currency((int)$data->sum_entry_price);
                }
            ],
            [
                'attribute' => 'sum_exit_price',
                'value' => function($data){
                    return $data::Currency((int)$data->sum_exit_price);
                }
            ],
            [
                'attribute' => 'user_id',
                'value' => function($data){
                    return Yii::$app->user->identity->full_name;
                }
            ],
            [
                'headerOptions' => ['class'=>'right-position-sticky'],
                'contentOptions' => ['class' => 'right-position-sticky'],
                'format' => 'raw',
                'value' => function ($data) {
                    $buttons = '';
                    $buttons .=  Html::a('<i class="bi bi-eye-fill"></i>', Url::to(['/products/list-of-transitions/index', 'ListOfTransitionsSearch[code_group]' => $data->code_group]), [
                        'class' => 'text-primary',
                        'style' => 'font-size: 18px;'
                    ]);
                    return $buttons;
                },
            ],
        ],
    ]); ?>


</div>

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
            'date',
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
            'amount',
            [
                'attribute' => 'sum_entry_price',
                'value' => function($data){
                    return $data::Currency($data->entry_price);
                }
            ],
            [
                'attribute' => 'sum_exit_price',
                'value' => function($data){
                    return $data::Currency($data->exit_price);
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
                    $buttons .=  Html::a(Yii::t('app', '<i class="bi bi-eye"></i>'), Yii::$app->urlManager->createUrl(['/abs/service-nodes/edit', 'ServiceNodes[id]' => $data->id]), [
                            'class' => 'text-primary',
                            'style' => 'font-size: 20px;',
                        ]).'<br>';
                    return $buttons;
                },
            ],
        ],
    ]); ?>
</div>

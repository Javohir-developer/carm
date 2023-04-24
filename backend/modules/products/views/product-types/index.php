<?php

use backend\modules\products\models\ProductTypes;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var \app\modules\products\models\search\ProductTypesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
?>
<div class="product-types-index container-fluid">


    <p>
        <?= Html::a(Yii::t('app', 'Дабавить тип'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            'name',
            [
                'attribute' => 'status',
                'value' => function($model) {
                    return $model->status == 1 ? Yii::t('app', 'Актив') : Yii::t('app', 'Не актив');
                }
            ],
            'created_at',
            [
                'class' => ActionColumn::className(),
                'template' => '{update}{delete}',
                'urlCreator' => function ($action, ProductTypes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>

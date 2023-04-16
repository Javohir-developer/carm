<?php

use backend\modules\parameters\models\Suppliers;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var \app\modules\parameters\models\search\SuppliersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suppliers-index container-fluid">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        float-right margin-bottom-15-->
        <?= Html::a(Yii::t('app', 'Создать поставщиков'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'summary' => '',
        'options' => ['class' => 'table-parent-div'],
        'headerRowOptions' => ['class' => 'no-wrap'],
        'tableOptions' => ['class' => 'table table-striped table-bordered'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'phone',
            'inn',
            'ndc',
            [
                'attribute' => 'status',
                'value' => function($model) {
                    return $model->status == 1 ? Yii::t('app', 'Актив') : Yii::t('app', 'Не актив');
                }
            ],
            'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Suppliers $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

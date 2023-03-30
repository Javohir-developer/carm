<?php

use common\models\City;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create City', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'region_id',
                'attribute' => 'region_id',
                'value' => function ($model) {
                    return $model->regions[$model->region_id];
                }
            ],
            'name_ru',
            'name_uz',
            [
                'label' => 'status',
                'attribute' => 'status',
                'filter' => ['1' => 'активный', '0' => 'неактивный'],
                'filterInputOptions' => ['prompt' => 'Все образования', 'class' => 'form-control', 'id' => null],
                'value' => function ($model) {
                    if ($model->status == 1){
                        return 'активный';
                    }else{
                        return 'неактивный';
                    }
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, City $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

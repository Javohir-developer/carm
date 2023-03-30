<?php

use common\models\Region;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\RegionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Regions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Region', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
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
                'urlCreator' => function ($action, Region $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

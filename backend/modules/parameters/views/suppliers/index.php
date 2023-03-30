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
<div class="suppliers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Создать поставщиков'), ['create'], ['class' => 'btn btn-success float-right margin-bottom-15']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
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

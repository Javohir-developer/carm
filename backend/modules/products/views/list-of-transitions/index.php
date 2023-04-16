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
<div class="container-fluid list-of-transitions-index">

<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

<!--    <p>-->
<!--        --><?php //= Html::a('Create List Of Transitions', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'options' => ['class' => 'table-parent-div'],
        'headerRowOptions' => ['class' => 'no-wrap'],
        'tableOptions' => ['class' => 'table table-striped table-bordered'],
        'columns' => [
            'warehouse_id',
            'supplier_id',
            'date',
            'currency',
            'currency_amount',
            'barcode',
            'group',
            'type',
            'model',
            'brand',
            'size',
            'ikpu',
            'unit_amount',
            'max_ast',
            'min_ast',
            'production_time',
            'term_amount',
            'term_type',
            'valid',
            'ndc',
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
        ],
    ]); ?>

<!--    <div class="products-index">-->
<!--        <div  class="table-parent-div">-->
<!--            <table class="table table-striped table-bordered"><thead>-->
<!--                <tr>-->
<!--                    <th class="">#</th>-->
<!--                    <th class="">--><?php //=Yii::t('app', 'Бар код')?><!--</th>-->
<!--                    <th class="">--><?php //=Yii::t('app', 'Тип')?><!--</th>-->
<!--                    <th class="">--><?php //=Yii::t('app', 'Тип')?><!--</th>-->
<!--                    <th class="">--><?php //=Yii::t('app', 'Тип')?><!--</th>-->
<!--                    <th class="">--><?php //=Yii::t('app', 'Бренд')?><!--</th>-->
<!--                    <th class="">--><?php //=Yii::t('app', 'Модель')?><!--</th>-->
<!--                    <th class="">--><?php //=Yii::t('app', 'Размер')?><!--</th>-->
<!--                    <th class="">--><?php //=Yii::t('app', 'Валюта')?><!--</th>-->
<!--                    <th class="">--><?php //=Yii::t('app', 'Ед изм')?><!--</th>-->
<!--                    <th class="">--><?php //=Yii::t('app', 'Кол-во')?><!--</th>-->
<!--                    <th class="">--><?php //=Yii::t('app', 'Цена прх.')?><!--</th>-->
<!--                    <th class="">--><?php //=Yii::t('app', 'Оценка')?><!--</th>-->
<!--                    <th class="">--><?php //=Yii::t('app', 'Цена прд.')?><!--</th>-->
<!--                    <th class="">--><?php //=Yii::t('app', 'Стар. цена прх.')?><!--</th>-->
<!--                    <th class="">--><?php //=Yii::t('app', 'Стар. цена прд.')?><!--</th>-->
<!--                    <th class="">--><?php //=Yii::t('app', 'Созд. время')?><!--</th>-->
<!--                    <th class=""></th>-->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                --><?php //foreach (Products::getProductInCache() as $product):?>
<!--                    <tr>-->
<!--                        <td>1</td>-->
<!--                        <td>0</td>-->
<!--                        <td>0</td>-->
<!--                        <td>0</td>-->
<!--                        <td>tuxum</td>-->
<!--                        <td>SHerzod dukon</td>-->
<!--                        <td>tuxumlar</td>-->
<!--                        <td>1</td>-->
<!--                        <td>1</td>-->
<!--                        <td>&nbsp;</td>-->
<!--                        <td>1</td>-->
<!--                        <td>15000</td>-->
<!--                        <td>20.1</td>-->
<!--                        <td>18000</td>-->
<!--                        <td>15000</td>-->
<!--                        <td>18000</td>-->
<!--                        <td>2023-03-31</td>-->
<!--                        <td  class="">-->
<!--                            <a href="--><?php //=Url::to(['/products/products/update', 'id' => 2])?><!--" title="Редактировать">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>-->
<!--                            </a>-->
<!--                            <a href="--><?php //=Url::to(['/products/products/delete', 'id' => 2])?><!--" title="Удалить" data-confirm="Вы уверены, что хотите удалить этот элемент?">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>-->
<!--                            </a>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                --><?php //endforeach;?>
<!--                </tbody>-->
<!--            </table>-->
<!--        </div>-->
<!--    </div>-->
</div>

<?php

use backend\modules\products\models\ListOfTransitions;
use backend\modules\products\models\ProductTypes;
use kartik\widgets\Select2;
use yii\bootstrap4\Modal;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var \app\modules\products\models\search\ListOfTransitionsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
?>
<div class="container-fluid list-of-transitions-index">
    <?php if ($code_group): ?>
        <?= Html::a('<i class="bi bi-file-earmark-spreadsheet"></i>', ['/products/list-of-transitions/excel-export', 'ListOfTransitionsSearch[code_group]' => $code_group], ['class' => 'btn btn-info'])?>
        <?= Html::a('<i class="bi bi-file-earmark-pdf"></i>', ['/products/list-of-transitions/export-bar-code-pdf', 'code_group' => $code_group], ['class' => 'btn btn-info'])?>
        <?php Pjax::begin(['timeout' => 5000, 'id'=>'pjax-list-of-transitions-index', 'enablePushState' => false]); ?>
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
                'name',
                [
                    'attribute' => 'product_types_id',
                    'value' => function($data){
                        return $data::productType($data->product_types_id);
                    }
                ],
                'brand',
                'model',
                [
                    'attribute' => 'size_num',
                    'value' => function($data){
                        if ($data->size_num && $data->size_type){
                            return $data->size_num.$data::sizeType()[$data->size_type];
                        }
                    }
                ],
                'amount',
                [
                    'attribute' => 'entry_price',
                    'value' => function($data){
                        return $data::Currency($data->entry_price);
                    }
                ],
                [
                    'attribute' => 'evaluation',
                    'value' => function($data){
                        return $data::Currency($data->evaluation);
                    }
                ],
                [
                    'attribute' => 'exit_price',
                    'value' => function($data){
                        return $data::Currency($data->exit_price);
                    }
                ],
                [
                    'attribute' => 'sum_entry_price',
                    'value' => function($data){
                        return $data::Currency($data->exit_price);
                    }
                ],
                [
                    'attribute' => 'sum_exit_price',
                    'value' => function($data){
                        return $data::Currency($data->exit_price);
                    }
                ],
                'date',
                [
                    'headerOptions' => ['class'=>'right-position-sticky'],
                    'contentOptions' => ['class' => 'right-position-sticky'],
                    'format' => 'raw',
                    'value' => function ($data) {
                        $buttons = '';
                        $buttons .=  Html::button('<i class="bi bi-pencil-square"></i>', [
                                'class' => 'text-primary',
                                'style' => 'font-size: 18px;border: none;background: none;',
                                'data-id' => $data->id,
                                'data-url' => Url::to(['/products/list-of-transitions/ajax-get-list-of-transitions']),
                                'onclick' => 'ajaxGetListOfTransitions(this)',
                            ]);
                        $buttons .=  Html::a('<i class="bi bi-trash"></i>', Url::to(['/products/list-of-transitions/delete', 'id' => $data->id, 'code_group' => Yii::$app->request->get('ListOfTransitionsSearch')['code_group']]), [
                                'class' => 'text-primary',
                                'style' => 'font-size: 18px;',
                                'data' => [
                                    'confirm' => Yii::t('app', 'Действительно хотите удалить?'),
                                ],
                            ]);
                        return $buttons;
                    },
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    <?php endif;?>
</div>
<?php Modal::begin(['title' => Yii::t('app', 'Редактировать'), 'closeButton' => ['id' => 'close-modal-button'], 'id' => 'update-list-of-transitions-form-modal', 'size' => 'modal-xl', 'bodyOptions' => ['id' => 'id-modal-body']]); ?>
<?php Modal::end();?>


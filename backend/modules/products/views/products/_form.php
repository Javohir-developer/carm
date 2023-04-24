<?php

use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var backend\modules\products\models\Products $model */
/** @var yii\widgets\ActiveForm $form */
$confg = [
    'enableAjaxValidation'=>true,
    'options' => [
        'onsubmit' => 'return addProductToCache(this);',
        'id' => 'products-form-send-ajax',
        'data-url' => Url::to(['/products/products/add-product-to-cache']),
    ]
];
?>

<div class="products-form container-fluid">
    <?php $form = ActiveForm::begin($confg); ?>

        <div class="card padding-class">
            <div class="row">
                <h6 class="text-center h6-size"><?=Yii::t('app', 'Информация о товаре')?></h6>
                <div class="col-sm-2">
                    <?= $form->field($model, 'barcode')->textInput() ?>
                </div>
                <div class="col-sm-2">
                    <?= $form->field($model, 'warehouse_id')->dropDownList($model->Warehouses(), ['prompt'=> '-----']) ?>
                </div>
                <div class="col-sm-2">
                    <?= $form->field($model, 'supplier_id')->dropDownList($model->Suppliers(), ['prompt'=> '-----']) ?>
                </div>
                <div class="col-sm-2">
                    <?php echo $form->field($model, 'date')->textInput(['type' => 'date', 'value' => date('Y-m-d'), 'class' => 'date-style form-control']); ?>
                </div>
                <div class="col-sm-2">
                    <?= $form->field($model, 'group')->textInput() ?>
                </div>
                <div class="col-sm-2">
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'currency')->dropDownList($model::currencyType()) ?>
                        </div>
                        <div class="col-sm-6">
<!--                            --><?php //= $form->field($model, 'currency_amount')->textInput(['value' => 1])->label('cur_amo') ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-2">
                    <?= $form->field($model, 'product_types_id')->widget(Select2::classname(), [
                        'data' => $model::productTypes(),
                        'language' => 'ru',
                        'options' => ['placeholder' => '-----'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]) ?>
                </div>
                <div class="col-sm-2">
                    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-2">
                    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-2">
                    <?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-2">
                    <?= $form->field($model, 'ikpu')->textInput() ?>
                </div>
            </div>
        </div>

        <div class="card padding-class">
            <div class="row">
                <div class="col-sm-4 card">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="text-center h6-size"><?=Yii::t('app', 'Признаки')?></h6>
<!--                            --><?php //= $form->field($model, 'unit_amount')->textInput(['class' => 'form-control index-form-control']) ?>
                            <?= $form->field($model, 'max_ast')->textInput(['class' => 'form-control index-form-control']) ?>
                            <?= $form->field($model, 'min_ast')->textInput(['class' => 'form-control index-form-control']) ?>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="text-center h6-size"><?=Yii::t('app', 'Срок годности')?></h6>
                            <?= $form->field($model, 'production_time')->textInput(['type' => 'date', 'class' => 'form-control index-form-control date-style', 'placeholder'=>Yii::t('app', 'Выбираете склад')]) ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($model, 'term_amount')->textInput(['class' => 'form-control index-form-control']) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($model, 'term_type')->dropDownList($model::termType(), ['prompt'=> '-----']) ?>
                                </div>
                            </div>
                            <?= $form->field($model, 'valid')->textInput(['type' => 'date', 'value' => date('Y-m-d'), 'class' => 'form-control index-form-control date-style']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 card">
                    <h6 class="text-center h6-size"><?=Yii::t('app', 'Цены')?></h6>
                    <div class="row">
                        <div class="col-sm-6">
<!--                            --><?php //= $form->field($model, 'ndc')->textInput() ?>
                            <?= $form->field($model, 'entry_price')->textInput() ?>
                            <?= $form->field($model, 'evaluation')->textInput(['disabled' => true]) ?>
                            <?= $form->field($model, 'exit_price')->textInput([ 'class' => 'class-disabled form-control']) ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($model, 'sum_entry_price')->textInput(['disabled' => true]) ?>
                            <?= $form->field($model, 'sum_exit_price')->textInput(['disabled' => true]) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 card">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <h6 class="text-center h6-size"><?=Yii::t('app', 'Количество')?></h6>
                                <div class="col-sm-6">
                                    <?= $form->field($model, 'unit_type')->dropDownList($model::unitType()) ?>
                                    <?= $form->field($model, 'amount')->textInput() ?>
                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group ">
                                <?= Html::submitButton(Yii::t('app', 'Добавить'), ['class' => 'btn btn-primary index-add-button']) ?>
                            </div>
                            <div class="form-group button-form">
                                <?= Html::Button(Yii::t('app', 'Провести'), ['class' => 'btn btn-success index-send-button', 'data-url' => Url::to(['/products/products/save-cache-products']), 'onclick' => 'saveCacheProducts(this)']) ?>
                            </div>
                            <div class="form-group button-form">
                                <?= Html::Button('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                      <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>',
                                    ['class' => 'btn btn-danger index-clear-button', 'data-url' => Url::to(['/products/products/clear-products-from-cache']), 'onclick' => 'clearProductsFromCache(this)']); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/** @var yii\web\View $this */
/** @var backend\modules\products\models\ListOfTransitions $model */
/** @var yii\widgets\ActiveForm $form */
$confg = [
    'enableAjaxValidation'=>true,
    'options' => [
//        'onsubmit' => 'return addProductToCache(this);',
//        'id' => 'products-form-send-ajax',
//        'data-url' => Url::to(['/products/products/add-product-to-cache']),
//        'class' => 'd-flex'
    ]
];
?>

<div class="list-of-transitions-form">

        <?php $form = ActiveForm::begin($confg); ?>

        <div class="card padding-class">
            <div class="row">
                <h6 class="text-center h6-size"><?=Yii::t('app', 'Информация о товаре')?></h6>
                <div class="col-sm-2">
                    <label class="control-label" for="products-barcode">Бар код</label>
                    <?= $form->field($model, 'barcode', ['template' => '<div class="input-group">{input}
                            <span class="input-group-addon" data-url="'.Url::to(['/products/products/search-barcode']).'" onclick="searchBarcode(this)"><i class="bi bi-search"></i></span>
                            <span class="input-group-qr-code" data-url="'.Url::to(['#']).'" onclick="generateBarcode();"><i class="bi bi-upc"></i></span></div>{hint}{error}']);  ?>
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
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'size_num')->textInput(['maxlength' => true, 'onkeyup' => 'listoftransitionsSizeNum(this)']) ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($model, 'size_type')->dropDownList($model::sizeType(), ['prompt'=> '-----'])->label('-') ?>
                        </div>
                    </div>
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
                            <?= $form->field($model, 'valid')->textInput(['type' => 'date', 'class' => 'form-control index-form-control date-style']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 card">
                    <h6 class="text-center h6-size"><?=Yii::t('app', 'Цены')?></h6>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'entry_price')->textInput(['onkeyup' => 'listoftransitionsEntryPrice(this)']) ?>
                            <?= $form->field($model, 'evaluation')->textInput(['onkeyup' => 'listoftransitionsEvaluation(this)']) ?>
                            <?= $form->field($model, 'exit_price')->textInput([ 'class' => 'class-disabled form-control', 'onkeyup' => 'listoftransitionsExitPrice(this)']) ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($model, 'old_entry_price')->textInput(['disabled' => true]) ?>
                            <?= $form->field($model, 'old_exit_price')->textInput(['disabled' => true]) ?>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

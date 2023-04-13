<?php

use kartik\widgets\DatePicker;
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
                    <?php echo $form->field($model, 'date')->textInput(['type' => 'date', 'value' => date('Y-m-d')]); ?>
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
                    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
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
                            <?= $form->field($model, 'unit_amount')->textInput(['class' => 'form-control index-form-control']) ?>
                            <?= $form->field($model, 'max_ast')->textInput(['class' => 'form-control index-form-control']) ?>
                            <?= $form->field($model, 'min_ast')->textInput(['class' => 'form-control index-form-control']) ?>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="text-center h6-size"><?=Yii::t('app', 'Срок годности')?></h6>
                            <?= $form->field($model, 'production_time')->textInput(['type' => 'date', 'class' => 'form-control index-form-control', 'placeholder'=>Yii::t('app', 'Выбираете склад')]) ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($model, 'term_amount')->textInput(['class' => 'form-control index-form-control']) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($model, 'term_type')->dropDownList($model::termType(), ['prompt'=> '-----']) ?>
                                </div>
                            </div>
                            <?= $form->field($model, 'valid')->textInput(['type' => 'date', 'value' => date('Y-m-d'), 'class' => 'form-control index-form-control']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 card">
                    <h6 class="text-center h6-size"><?=Yii::t('app', 'Цены')?></h6>
                    <div class="row">
                        <div class="col-sm-6">
<!--                            --><?php //= $form->field($model, 'ndc')->textInput() ?>
                            <?= $form->field($model, 'entry_price')->textInput() ?>
                            <?= $form->field($model, 'evaluation')->textInput() ?>
                            <?= $form->field($model, 'exit_price')->textInput() ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($model, 'old_entry_price')->textInput(['disabled' => true]) ?>
                            <?= $form->field($model, 'old_evaluation')->textInput(['disabled' => true]) ?>
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
                            <div class="form-group ">
                                <?= Html::Button(Yii::t('app', 'Провести'), ['class' => 'btn btn-success index-send-button', 'data-url' => Url::to(['/products/products/save-cache-products']), 'onclick' => 'saveCacheProducts(this)']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

</div>

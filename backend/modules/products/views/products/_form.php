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
        'data-url' => $model->isNewRecord ? Url::to(['/products/products/add-product-to-cache']) : Url::to(['/products/products/update-product-to-cache', 'id' => $model->id]),
    ]
];
?>
<?php Pjax::begin(); ?>
<div class="products-form container-fluid">
    <?php $form = ActiveForm::begin($confg); ?>

        <div class="card padding-class">
            <div class="row">
                <h6 class="text-center h6-size">Данные</h6>
                <div class="col-sm-2">
                    <?= $form->field($model, 'warehouse_id')->dropDownList($model->Warehouses(), ['prompt'=>Yii::t('app', 'Выбираете склад')]) ?>
                </div>
                <div class="col-sm-2">
                    <?= $form->field($model, 'supplier_id')->dropDownList($model->Suppliers(), ['prompt'=>Yii::t('app', 'Выбираете поставщик')]) ?>
                </div>
                <div class="col-sm-2">
                    <?php echo $form->field($model, 'date')->textInput(['type' => 'date', 'value' => date('Y-m-d')]); ?>
                </div>
                <div class="col-sm-2">
                    <?= $form->field($model, 'barcode')->textInput() ?>
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
            </div>
        </div>

        <div class="card padding-class">
            <div class="row">
                <h6 class="text-center h6-size">Продукт</h6>
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
                <div class="col-sm-2">

                </div>
            </div>
        </div>

        <div class="card padding-class">
            <div class="row">
                <div class="col-sm-4 card">
                    <h6 class="text-center h6-size">Продукт</h6>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($model, 'unit_amount')->textInput(['class' => 'form-control index-form-control']) ?>
                            <?= $form->field($model, 'max_ast')->textInput(['class' => 'form-control index-form-control']) ?>
                            <?= $form->field($model, 'min_ast')->textInput(['class' => 'form-control index-form-control']) ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($model, 'production_time')->textInput(['type' => 'date', 'class' => 'form-control index-form-control', 'placeholder'=>Yii::t('app', 'Выбираете склад')]) ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?= $form->field($model, 'term_amount')->textInput(['class' => 'form-control index-form-control']) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($model, 'term_type')->textInput(['class' => 'form-control index-form-control']) ?>
                                </div>
                            </div>
                            <?= $form->field($model, 'valid')->textInput(['type' => 'date', 'value' => date('Y-m-d'), 'class' => 'form-control index-form-control']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 card">
                    <h6 class="text-center h6-size">Продукт</h6>
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
                                <h6 class="text-center h6-size">Продукт</h6>
                                <div class="col-sm-6">
                                    <?= $form->field($model, 'unit_type')->textInput() ?>
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
                                <?= Html::Button(Yii::t('app', 'Провести'), ['class' => 'btn btn-success index-send-button']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
<?php Pjax::end(); ?>
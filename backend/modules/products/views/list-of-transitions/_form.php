<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\products\models\ListOfTransitions $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="list-of-transitions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'company_id')->textInput() ?>

    <?= $form->field($model, 'warehouse_id')->textInput() ?>

    <?= $form->field($model, 'supplier_id')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'currency')->textInput() ?>

    <?= $form->field($model, 'currency_amount')->textInput() ?>

    <?= $form->field($model, 'barcode')->textInput() ?>

    <?= $form->field($model, 'group')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ikpu')->textInput() ?>

    <?= $form->field($model, 'unit_amount')->textInput() ?>

    <?= $form->field($model, 'max_ast')->textInput() ?>

    <?= $form->field($model, 'min_ast')->textInput() ?>

    <?= $form->field($model, 'production_time')->textInput() ?>

    <?= $form->field($model, 'term_amount')->textInput() ?>

    <?= $form->field($model, 'term_type')->textInput() ?>

    <?= $form->field($model, 'valid')->textInput() ?>

    <?= $form->field($model, 'ndc')->textInput() ?>

    <?= $form->field($model, 'entry_price')->textInput() ?>

    <?= $form->field($model, 'evaluation')->textInput() ?>

    <?= $form->field($model, 'exit_price')->textInput() ?>

    <?= $form->field($model, 'sum_entry_price')->textInput() ?>

    <?= $form->field($model, 'sum_exit_price')->textInput() ?>

    <?= $form->field($model, 'unit_type')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'input_status')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var \app\modules\parameters\models\search\ProductsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'warehouse_id') ?>

    <?= $form->field($model, 'supplier_id') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'currency') ?>

    <?php // echo $form->field($model, 'currency_amount') ?>

    <?php // echo $form->field($model, 'barcode') ?>

    <?php // echo $form->field($model, 'group') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'brand') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'ikpu') ?>

    <?php // echo $form->field($model, 'unit_amount') ?>

    <?php // echo $form->field($model, 'max_ast') ?>

    <?php // echo $form->field($model, 'min_ast') ?>

    <?php // echo $form->field($model, 'production_time') ?>

    <?php // echo $form->field($model, 'term_amount') ?>

    <?php // echo $form->field($model, 'term_type') ?>

    <?php // echo $form->field($model, 'valid') ?>

    <?php // echo $form->field($model, 'ndc') ?>

    <?php // echo $form->field($model, 'entry_price') ?>

    <?php // echo $form->field($model, 'evaluation') ?>

    <?php // echo $form->field($model, 'exit_price') ?>

    <?php // echo $form->field($model, 'old_entry_price') ?>

    <?php // echo $form->field($model, 'old_evaluation') ?>

    <?php // echo $form->field($model, 'old_exit_price') ?>

    <?php // echo $form->field($model, 'unit_type') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'input_status') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

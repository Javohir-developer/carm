<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\parameters\models\Warehouses $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="warehouses-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--            --><?php //= $form->field($model, 'type')->textInput() ?>
        </div>
        <div class="col-sm-6">
<!--            --><?php //= $form->field($model, 'description')->textarea(['rows' => 5]) ?>

            <?= $form->field($model, 'status')->radioList($model::status()) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранять'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

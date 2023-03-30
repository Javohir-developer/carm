<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\parameters\models\Suppliers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="suppliers-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->textInput() ?>

            <?= $form->field($model, 'inn')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'ndc')->textInput() ?>

            <?= $form->field($model, 'status')->radioList($model::status()) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранять'), ['class' => 'btn btn-success margin-top-15']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

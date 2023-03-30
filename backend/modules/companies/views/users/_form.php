<?php

use backend\modules\companies\models\Companies;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\companies\models\Users */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_id')->dropDownList($model::companies()) ?>

    <?= $form->field($model, 'rule')->dropDownList($model::rule()) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->radioList($model::status())  ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранять', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

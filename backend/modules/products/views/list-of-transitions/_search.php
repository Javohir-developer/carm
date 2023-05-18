<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var \app\modules\products\models\search\ListOfTransitionsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="list-of-transitions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
        <div class="row">
            <div class="col-sm-2">
                <?= $form->field($model, 'from_date')->textInput(['type' => 'date', 'value' => date('Y-m-d')]) ?>
            </div>
            <div class="col-sm-2">
                <?= $form->field($model, 'to_date')->textInput(['type' => 'date', 'value' => date('Y-m-d')]) ?>
            </div>
<!--            <div class="col-sm-2">-->
<!--                --><?php //= $form->field($model, 'product_types_id')->dropDownList($model::productTypes(), ['prompt' => '-Выберите тип-']) ?>
<!--            </div>-->
            <div class="col-sm-6">
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Поиск'), ['class' => 'btn btn-primary', 'style' => 'margin-top: 27px;']) ?>
                </div>
            </div>
        </div>



    <?php ActiveForm::end(); ?>

</div>

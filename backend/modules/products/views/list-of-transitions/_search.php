<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var \app\modules\products\models\search\ListOfTransitionsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="list-of-transitions-search mb-3">

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
            <div class="col-sm-8">
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Поиск'), ['class' => 'btn btn-primary', 'style' => 'margin-top: 32px;']) ?>
                </div>
            </div>
        </div>



    <?php ActiveForm::end(); ?>

</div>

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\modules\companies\models\Companies */
/* @var $form yii\widgets\ActiveForm */
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="companies-form">

    <?php $form = ActiveForm::begin(['method' => 'post','options' => ['enctype' => 'multipart/form-data']]); ?>
    <input type="hidden" name="comp_id" value="<?=Yii::$app->request->get('comp_id')?>">
    <ul>
        <?php if ($model->errors): foreach ($model->errors as $key=>$val): foreach ($val as $v):?>
            <li class="errors"><?=$v;?></li>
        <?php endforeach; endforeach;endif; ?>
    </ul>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'name')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'currency')->dropDownList([1=>'SUM']) ?>
        </div>
    </div>

    <br>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <h3><?=Yii::t('app', 'Лого')?></h3>
            <div class="wrapper">
                <div class="box box-logo">
                    <div class="js--image-preview js--image-preview-logo" <?php if (!empty($model->logo)){ ?> style="background-image: url(<?=Yii::getAlias('@frontImages').'/images/companies-images/' . $model->logo; ?>);" <?php } ?>></div>
                    <div class="upload-options">
                        <label>
                            <?= $form->field($model, 'logo_param')->fileInput(['multiple' => true,'class'=>'image-upload', 'accept' => 'image/png, image/jpg, image/jpeg'])->label(false) ?>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <h3><?=Yii::t('app', 'Слэйдер фото')?></h3>
            <div class="wrapper">
                <div class="box">
                    <div class="js--image-preview" <?php if (!empty($model->logo_sliders)){ ?> style="background-image: url('/images/companies-images/<?= $model->logo_sliders[1] ?>');" <?php } ?>></div>
                    <div class="upload-options">
                        <label>
                            <?= $form->field($model, 'logo_sliders_massive[]')->fileInput(['multiple' => true,'class'=>'image-upload', 'accept' => 'image/png, image/jpg, image/jpeg'])->label(false) ?>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <h3><?=Yii::t('app', 'Контакты')?></h3>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'addres_ru')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'addres_uz')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'working_mode')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'phone')->textInput() ?>
        </div>
        <div class="col-md-12">
            <div class="ibox-content" style="position: relative; overflow: hidden;">
                <div id="ymap_ctrl_display" style="display: none; width: 100%; height: 100%; position: absolute; background-color: rgba(0, 0, 0, 0.5); z-index: 100; pointer-events: none;">
                    <div style="position: relative; top: 50%; left: 0; right: 0; color: white; text-align: center; font-size: 1.8em; pointer-events: none;"><?=Yii::t('app', 'Чтобы изменить масштаб, прокручивайте карту, удерживая клавишу Ctrl.'); ?></div>
                </div>
                <div id="map" style="width: 100%; height: 600px"></div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">
            <?= $form->field($model, 'latitude')->textInput(['readonly' => true, 'id'=>'companies-latitude']); ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'longitude')->textInput(['readonly' => true, 'id'=>'companies-longitude']); ?>
        </div>
        <div class="col-sm-3"></div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'telegram')->textInput() ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'facebook')->textInput() ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'instagram')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'about')->widget(CKEditor::className(),[
                'editorOptions' => [
                    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                    'inline' => false, //по умолчанию false
                ],
            ]); ?>
        </div>
    </div>

    <br>
    <br>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранять'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

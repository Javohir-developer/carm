<?php

use yii\bootstrap4\Modal;
use yii\helpers\Html;
?>


<?php
Modal::begin(['title' => Yii::t('app', 'Генератор баркода'), 'closeButton' => ['id' => 'close-modal-button'], 'id' => 'bar-code-modal', 'size' => 'modal-ms', 'bodyOptions' => ['id' => 'id-modal-body'],
    'footer' => Html::button('ОК', ['class' => 'btn btn-primary btn-sm', 'onclick' => 'addToTheInput()'])]);
?>
    <div class="container-fluid">
    <div class="modal-footer justify-content-between">
        <div class="form-check" onclick="generateBarcode()" style="cursor: pointer">
            <input class="form-check-input" type="radio" name="generate-barcode-check" id="generate-barcode-check" checked>
            <label class="form-check-label" for="generate-barcode-check">
                <?=Yii::t('app', 'Обучений')?>
            </label>
        </div>
        <div class="form-check" data-bar-code-type="<?=$model::BAR_CODE_TYPE_WEIGHT?>" onclick="generateBarcodeForWeight()" style="cursor: pointer">
            <input class="form-check-input" type="radio" name="generate-barcode-check" id="generate-barcode-for-weight-check" >
            <label class="form-check-label" for="generate-barcode-for-weight-check">
                <?=Yii::t('app', 'Весовой')?>
            </label>
        </div>
        <div class="form-check" data-bar-code-type="<?=$model::BAR_CODE_TYPE_PIECE?>" onclick="generateBarcodeForPiece()" style="cursor: pointer">
            <input class="form-check-input" type="radio" name="generate-barcode-check" id="generate-barcode-for-piece-check" >
            <label class="form-check-label" for="generate-barcode-for-piece-check">
                <?=Yii::t('app', 'Штучный')?>
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center barcode-generate-body">
            <div id="bar-cod-class">
                <div class="padding-barcode"></div>
            </div>
        </div>
        <input type="text" class="form-control text-center barcode-generate mb-2" id="barcode-generate-input">
    </div>
<?php Modal::end();?>
<?php

use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
?>


<?php
Modal::begin(['title' => Yii::t('app', 'Генератор баркода'), 'closeButton' => ['id' => 'close-modal-button', 'onclick' => 'closeButton(this)'], 'id' => 'bar-code-modal', 'size' => 'modal-ms', 'bodyOptions' => ['id' => 'id-modal-body'],
    'footer' => Html::button('ОК', ['class' => 'btn btn-primary btn-sm', 'onclick' => 'addToTheInput()'])]);
?>
    <div class="container-fluid">
    <div class="modal-footer justify-content-between">
        <button class="form-check form-check-button btn btn-primary" data-bar-code-type="<?=$model::BAR_CODE_TYPE_RANDOM?>" onclick="generateRandomBarCode(this)">
            <?=Yii::t('app', 'Обучений')?>
        </button>
        <button class="form-check form-check-button btn btn-primary" data-url = <?=Url::to(['/products/products/generate-bar-code-for-weight'])?> data-bar-code-type="<?=$model::BAR_CODE_TYPE_WEIGHT?>" onclick="generateBarCodeForWeight(this)">
            <?=Yii::t('app', 'Весовой')?>
        </button>
        <button class="form-check form-check-button btn btn-primary" data-url = <?=Url::to(['/products/products/generate-bar-code-for-piece'])?> data-bar-code-type="<?=$model::BAR_CODE_TYPE_PIECE?>" onclick="generateBarCodeForPiece(this)">
            <?=Yii::t('app', 'Штучный')?>
        </button>
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
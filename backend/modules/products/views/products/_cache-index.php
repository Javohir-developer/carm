<?php

use backend\modules\products\models\Products;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
$i = 1;
?>
<?php Pjax::begin(['timeout' => 5000, 'id'=>'products-cache-index', 'enablePushState' => false]); ?>
<div class="products-index">
    <div  class="table-parent-div">
        <div id="_cache-index" class="table table-striped table-bordered">
            <div  id="_cache-index1"  class="list">
                <ul class="list-group  list-group-horizontal title-horizontal title-sticky">
                    <li class="list-group-item left-position-sticky-title title-sticky number-item list-group-item-num  list-group-item-back z-index-title-num" ><input class="list-group-item-back" value="#" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Бар код')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Название')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Тип')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Валюта')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Ед изм')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Кол-во')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Цена прх.')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Наоценка')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Цена прд.')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Прх. Сумма')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Прод. Сумма')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Бренд')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Модель')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Размер')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Созд. время')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li  class="right-position-sticky-title title-sticky list-group-item"><input class=" up-ca-form-inp list-group-item-back list-group-item-title" disabled></li>
                </ul>
                <?php foreach (Products::getProductInCache() as $key => $val):?>
                    <?php echo Html::beginForm(false, 'post', ['enableAjaxValidation'=>true, 'onsubmit' => 'return updateProductFromCache(this);', 'data-url' => Url::to(['/products/products/update-product-from-cache'])]) ?>
                    <input type="hidden" name="id" value="<?=$key?>">
                    <ul class="list-group  list-group-horizontal">
                        <li class="list-group-item left-position-sticky-title number-item" ><input type="text" value="<?=$i++;?>" disabled></li>
                        <li class="list-group-item"><?= Html::textInput('barcode',      $val['barcode'], ['class' => 'text-center up-ca-form-inp up-ca-form-inp-barcod', 'required' => true, 'type' => 'number']) ?></li>
                        <li class="list-group-item"><?= Html::textInput('name',         $val['name'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></li>
                        <li class="list-group-item"><?= Html::textInput('product_types_id', Products::productType($val['product_types_id']), ['class' => 'text-center up-ca-form-inp', 'required' => true, 'disabled' => true]) ?></li>
                        <li class="list-group-item"><?= Html::dropDownList('currency',  [$val['currency']], Products::currencyType(), ['class' => 'text-center up-ca-form-inp']); ?></li>
                        <li class="list-group-item"><?= Html::dropDownList('unit_type', [$val['unit_type']], Products::unitType(), ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></li>
                        <li class="list-group-item"><?= Html::textInput('amount',       $val['amount'], ['class' => 'text-center up-ca-form-inp', 'required' => true, 'type' => 'number']) ?></li>
                        <li class="list-group-item"><?= Html::textInput('entry_price',  Products::Currency($val['entry_price']), ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></li>
                        <li class="list-group-item"><?= Html::textInput('evaluation',   Products::Currency($val['evaluation']), ['class' => 'text-center up-ca-form-inp', 'required' => true, 'type' => 'number', 'step' => 'any']) ?></li>
                        <li class="list-group-item"><?= Html::textInput('exit_price',   Products::Currency($val['exit_price']), ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></li>
                        <li class="list-group-item"><?= Html::textInput('sum_entry_price',  Products::Currency($val['sum_entry_price']), ['class' => 'text-center up-ca-form-inp', 'disabled' => true]) ?></li>
                        <li class="list-group-item"><?= Html::textInput('sum_exit_price',   Products::Currency($val['sum_exit_price']), ['class' => 'text-center up-ca-form-inp', 'disabled' => true]) ?></li>
                        <li class="list-group-item"><?= Html::textInput('brand',        $val['brand'], ['class' => 'text-center up-ca-form-inp']) ?></li>
                        <li class="list-group-item"><?= Html::textInput('model',        $val['model'], ['class' => 'text-center up-ca-form-inp']) ?></li>
                        <li class="list-group-item"><?= Html::textInput('size_num',         $val['size_num'], ['class' => 'text-center up-ca-form-inp']) ?></li>
                        <li class="list-group-item"><?= Html::textInput('date',         $val['date'], ['type' => 'date', 'class' => 'text-center up-ca-form-inp', 'required' => true]) ?></li>
                        <li  class="right-position-sticky list-group-item">
                            <?= Html::SubmitButton(
                                '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>',
                                ['class' => 'update-product-from-cache-form text-primary']);
                            ?>
                            <?=Html::a('<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/></svg>', Url::to(['#']), [
                                'class' => 'text-primary',
                                'data-id' => $key,
                                'data-url' => Url::to(['/products/products/delete-product-from-cache']),
                                'onclick' => 'deleteProductFromCache(this)',
                            ]);?>
                        </li>
                    </ul>
                    <?php echo Html::endForm() ?>
                <?php endforeach;?>
                <ul class="list-group list-group-horizontal">
                    <li class=" list-group-item buttom-sticky number-item list-group-item-num" ><input  class="up-ca-form-inp text-col" disabled></li>
                    <li class=" list-group-item buttom-sticky"><input value="" class="text-center up-ca-form-inp up-ca-form-inp-barcod text-col" disabled></li>
                    <li class=" list-group-item buttom-sticky"><input value="" class="text-center up-ca-form-inp text-col" disabled></li>
                    <li class=" list-group-item buttom-sticky"><input value="" class="text-center up-ca-form-inp text-col" disabled></li>
                    <li class=" list-group-item buttom-sticky"><input value="" class="text-center up-ca-form-inp text-col" disabled></li>
                    <li class=" list-group-item buttom-sticky"><input value="" class="text-center up-ca-form-inp text-col" disabled></li>
                    <li class=" list-group-item buttom-sticky"><input value="<?=isset(Products::getSumParamsInCache()['amount']) ? Products::getSumParamsInCache()['amount'] : 0; ?>" class="text-center up-ca-form-inp text-col" disabled></li>
                    <li class=" list-group-item buttom-sticky"><input value="" class="text-center up-ca-form-inp text-col" disabled></li>
                    <li class=" list-group-item buttom-sticky"><input value="" class="text-center up-ca-form-inp text-col" disabled></li>
                    <li class=" list-group-item buttom-sticky"><input value="" class="text-center up-ca-form-inp text-col" disabled></li>
                    <li class=" list-group-item buttom-sticky"><input value="<?=isset(Products::getSumParamsInCache()['sum_entry_price']) ? Products::Currency(Products::getSumParamsInCache()['sum_entry_price']) : 0; ?>" class="text-center up-ca-form-inp text-col" disabled></li>
                    <li class=" list-group-item buttom-sticky"><input value="<?=isset(Products::getSumParamsInCache()['sum_exit_price']) ? Products::Currency(Products::getSumParamsInCache()['sum_exit_price']) : 0; ?>" class="text-center up-ca-form-inp text-col" disabled></li>
                    <li class=" list-group-item buttom-sticky"><input value="" class="text-center up-ca-form-inp text-col" disabled></li>
                    <li class=" list-group-item buttom-sticky"><input value="" class="text-center up-ca-form-inp text-col" disabled></li>
                    <li class=" list-group-item buttom-sticky"><input value="" class="text-center up-ca-form-inp text-col" disabled></li>
                    <li class=" list-group-item buttom-sticky"><input value="" class="text-center up-ca-form-inp text-col" disabled></li>
                    <li  class="right-position-sticky-title buttom-sticky list-group-item"><input class=" up-ca-form-inp text-col list-group-item-title" disabled></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php Pjax::end(); ?>

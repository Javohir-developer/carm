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
                        <li class="list-group-item"><?= Html::textInput('barcode',      $val['barcode'], ['class' => 'text-center up-ca-form-inp', 'required' => true, 'type' => 'number']) ?></li>
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
                                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>',
                                ['class' => 'update-product-from-cache-form']);
                            ?>
                            <a data-id="<?=$key?>" data-url="<?=Url::to(['/products/products/delete-product-from-cache'])?>" onclick="deleteProductFromCache(this)" href="#" title="Удалить">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </a>
                        </li>
                    </ul>
                    <?php echo Html::endForm() ?>
                <?php endforeach;?>
                <ul class="list-group list-group-horizontal">
                    <li class=" list-group-item buttom-sticky number-item list-group-item-num" ><input  class="up-ca-form-inp text-col" disabled></li>
                    <li class=" list-group-item buttom-sticky"><input value="" class="text-center up-ca-form-inp text-col" disabled></li>
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

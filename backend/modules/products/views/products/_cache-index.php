<?php

use backend\modules\products\models\Products;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

?>
<?php Pjax::begin(['timeout' => 5000, 'id'=>'products-cache-index', 'enablePushState' => false]); ?>
<div class="products-index">
    <div  class="table-parent-div">
        <div id="_cache-index" class="table table-striped table-bordered">
            <div  id="_cache-index1"  class="list">
<!--                    <ul class="list-group  list-group-horizontal">-->
<!--                        <li class="list-group-item number-item">#</li>-->
<!--                        <li class="list-group-item">--><?php //=Yii::t('app', 'Бар код')?><!--</li>-->
<!--                        <li class="list-group-item">--><?php //=Yii::t('app', 'Тип')?><!--</li>-->
<!--                        <li class="list-group-item">--><?php //=Yii::t('app', 'Бренд')?><!--</li>-->
<!--                        <li class="list-group-item">--><?php //=Yii::t('app', 'Модель')?><!--</li>-->
<!--                        <li class="list-group-item">--><?php //=Yii::t('app', 'Размер')?><!--</li>-->
<!--                        <li class="list-group-item">--><?php //=Yii::t('app', 'Валюта')?><!--</li>-->
<!--                        <li class="list-group-item">--><?php //=Yii::t('app', 'Ед изм')?><!--</li>-->
<!--                        <li class="list-group-item">--><?php //=Yii::t('app', 'Кол-во')?><!--</li>-->
<!--                        <li class="list-group-item">--><?php //=Yii::t('app', 'ена прх.')?><!--</li>-->
<!--                        <li class="list-group-item">--><?php //=Yii::t('app', 'Оценка')?><!--</li>-->
<!--                        <li class="list-group-item">--><?php //=Yii::t('app', 'Цена прд.')?><!--</li>-->
<!--                        <li class="list-group-item">--><?php //=Yii::t('app', 'Стар. цена прх.')?><!--</li>-->
<!--                        <li class="list-group-item">--><?php //=Yii::t('app', 'Стар. цена прд.')?><!--</li>-->
<!--                        <li class="list-group-item">--><?php //=Yii::t('app', 'Созд. время')?><!--</li>-->
<!--                        <li class="right-position-sticky list-group-item"></li>-->
<!--                    </ul>-->
                <ul class="list-group  list-group-horizontal title-sticky">
                    <li class="list-group-item title-sticky number-item list-group-item-num  list-group-item-back" ><input class="list-group-item-back" value="#" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Бар код')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Тип')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Бренд')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Модель')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Размер')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Валюта')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Ед изм')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Кол-во')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'ена прх.')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Оценка')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Цена прд.')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Стар. цена прх.')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Стар. цена прд.')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li class="list-group-item title-sticky"><input value="<?=Yii::t('app', 'Созд. время')?>" class="text-center up-ca-form-inp list-group-item-back" disabled></li>
                    <li  class="right-position-sticky-title title-sticky list-group-item"><input class=" up-ca-form-inp list-group-item-back list-group-item-title" disabled></li>
                </ul>
                <?php $i = 1; foreach (Products::getProductInCache() as $key => $val):?>
                    <?php echo Html::beginForm(false, 'post', ['enableAjaxValidation'=>true, 'onsubmit' => 'return updateProductFromCache(this);', 'data-url' => Url::to(['/products/products/update-product-from-cache'])]) ?>
                    <?=Html::hiddenInput('id', $key); ?>
                    <ul class="list-group  list-group-horizontal">
                        <li class="list-group-item number-item" ><input type="text" value="<?=$i++;?>" disabled></li>
                        <li class="list-group-item"><?= Html::textInput('barcode',  $val['barcode'], ['class' => 'text-center up-ca-form-inp', 'required' => true, 'type' => 'number']) ?></li>
                        <li class="list-group-item"><?= Html::textInput('type',     $val['type'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></li>
                        <li class="list-group-item"><?= Html::textInput('brand',    $val['brand'], ['class' => 'text-center up-ca-form-inp']) ?></li>
                        <li class="list-group-item"><?= Html::textInput('model',    $val['model'], ['class' => 'text-center up-ca-form-inp']) ?></li>
                        <li class="list-group-item"><?= Html::textInput('size',     $val['size'], ['class' => 'text-center up-ca-form-inp']) ?></li>
                        <li class="list-group-item"><?=Html::dropDownList('category', [1, 3, 5], Products::currencyType(), ['class' => 'text-center up-ca-form-inp']); ?></li>
                        <li class="list-group-item"><?= Html::textInput('unit_type',$val['unit_type'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></li>
                        <li class="list-group-item"><?= Html::textInput('amount',       $val['amount'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></li>
                        <li class="list-group-item"><?= Html::textInput('entry_price',  $val['entry_price'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></li>
                        <li class="list-group-item"><?= Html::textInput('evaluation',   $val['evaluation'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></li>
                        <li class="list-group-item"><?= Html::textInput('exit_price',   $val['exit_price'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></li>
                        <li class="list-group-item"><?= Html::textInput('old_entry_price',  $val['old_entry_price'], ['class' => 'text-center up-ca-form-inp']) ?></li>
                        <li class="list-group-item"><?= Html::textInput('old_exit_price',  $val['old_exit_price'], ['class' => 'text-center up-ca-form-inp']) ?></li>
                        <li class="list-group-item"><?= Html::textInput('date',  $val['date'], ['type' => 'date', 'class' => 'text-center up-ca-form-inp', 'required' => true]) ?></li>
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
            </div>
        </div>
    </div>
</div>
<?php Pjax::end(); ?>
<style>
    ul {
        width: 1300px;
        overflow-x: scroll;
        white-space:nowrap;
        display:inline-block;
    }

    /* big */
    @media screen and (min-width:600px) {



        .list ul {
            display:table-row;
        }

        .list ul > li {
            text-align: center;
            width: 132px;
            display:table-cell;
            padding:.5px 1em;
        }

    }

    /* small */
    @media screen and (max-width:599px) {

        .list ul {
            border:solid 1px #ccc;
            display:block;
            list-style:none;
            margin:1em;
            padding:.5em 1em;
        }

        .list ul:first-child {
            display:none;
        }

        .list ul > li {
            display:block;
            padding:.25em 0;
        }

        .list ul:nth-child(odd) > li + li {
            border-top:solid 1px #ccc;
        }

        .list ul:nth-child(even) > li + li {
            border-top:solid 1px #eee;
        }

        .list ul > li:before {
            color:#4f6185;
            content:attr(data-label);
            display:inline-block;
            font-size:75%;
            font-weight:bold;
            text-transform:capitalize;
            vertical-align:top;
            width:50%;
        }

        .list p {
            margin:-1em 0 0 50%;
        }

    }

    /* tiny */
    @media screen and (max-width:349px) {

        .list ul > li:before {
            display:block;
        }

        .list p {
            margin:0;
        }

    }

</style>

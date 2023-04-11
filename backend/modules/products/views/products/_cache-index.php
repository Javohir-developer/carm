<?php

use backend\modules\products\models\Products;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="products-index">
    <div  class="table-parent-div">
        <table class="table table-striped table-bordered"><thead>
            <tr>
                <th class="no-wrap">#</th>
                <th class="no-wrap"><?=Yii::t('app', 'Бар код')?></th>
                <th class="no-wrap"><?=Yii::t('app', 'Тип')?></th>
                <th class="no-wrap"><?=Yii::t('app', 'Бренд')?></th>
                <th class="no-wrap"><?=Yii::t('app', 'Модель')?></th>
                <th class="no-wrap"><?=Yii::t('app', 'Размер')?></th>
                <th class="no-wrap"><?=Yii::t('app', 'Валюта')?></th>
                <th class="no-wrap"><?=Yii::t('app', 'Ед изм')?></th>
                <th class="no-wrap"><?=Yii::t('app', 'Кол-во')?></th>
                <th class="no-wrap"><?=Yii::t('app', 'Цена прх.')?></th>
                <th class="no-wrap"><?=Yii::t('app', 'Оценка')?></th>
                <th class="no-wrap"><?=Yii::t('app', 'Цена прд.')?></th>
                <th class="no-wrap"><?=Yii::t('app', 'Стар. цена прх.')?></th>
                <th class="no-wrap"><?=Yii::t('app', 'Стар. цена прд.')?></th>
                <th class="no-wrap"><?=Yii::t('app', 'Созд. время')?></th>
                <th class="no-wrap right-position-sticky"></th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; foreach (Products::getProductInCache() as $key => $val):?>
                <?php echo Html::beginForm(false, 'post', [ 'enableAjaxValidation'=>true, 'onsubmit' => 'return updateProductFromCache(this);', 'data-url' => Url::to(['/products/products/update-product-from-cache'])]) ?>
                    <tr>
                        <td><?=$i++;?></td>
                        <td><?= Html::textInput('barcode', $val['barcode'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></td>
                        <td><?= Html::textInput('barcode', $val['type'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></td>
                        <td><?= Html::textInput('barcode', $val['brand'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></td>
                        <td><?= Html::textInput('barcode', $val['model'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></td>
                        <td><?= Html::textInput('barcode', $val['size'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></td>
                        <td><?= Html::textInput('barcode', $val['currency'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></td>
                        <td><?= Html::textInput('barcode', $val['unit_type'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></td>
                        <td><?= Html::textInput('barcode', $val['amount'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></td>
                        <td><?= Html::textInput('barcode', $val['entry_price'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></td>
                        <td><?= Html::textInput('barcode', $val['evaluation'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></td>
                        <td><?= Html::textInput('barcode', $val['exit_price'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></td>
                        <td><?= Html::textInput('barcode', $val['old_entry_price'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></td>
                        <td><?= Html::textInput('barcode', $val['old_exit_price'], ['class' => 'text-center up-ca-form-inp', 'required' => true]) ?></td>
                        <td><?= Html::textInput('barcode', $val['date'], ['type' => 'date', 'class' => 'text-center up-ca-form-inp', 'required' => true]) ?></td>
                        <td  class="right-position-sticky">
                            <?= Html::submitButton(
                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>',
                                ['class' => 'update-product-from-cache-form']);
                            ?>
                            <a data-id="<?=$key?>" data-url="<?=Url::to(['/products/products/delete-product-from-cache'])?>" onclick="deleteProductFromCache(this)" href="#" title="Удалить">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </a>
                        </td>
                    </tr>
                <?php echo Html::endForm() ?>
            <?php endforeach;?>
            <tr>
                <td class="no-wrap-button"><?=--$i;?></td>
                <td class="no-wrap-button">0</td>
                <td class="no-wrap-button">0</td>
                <td class="no-wrap-button">0</td>
                <td class="no-wrap-button">0</td>
                <td class="no-wrap-button">0</td>
                <td class="no-wrap-button">0</td>
                <td class="no-wrap-button">0</td>
                <td class="no-wrap-button">0</td>
                <td class="no-wrap-button">0</td>
                <td class="no-wrap-button">0</td>
                <td class="no-wrap-button">0</td>
                <td class="no-wrap-button">0</td>
                <td class="no-wrap-button">0</td>
                <td class="no-wrap-button">0</td>
                <td class="no-wrap-button right-button-position-sticky"></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
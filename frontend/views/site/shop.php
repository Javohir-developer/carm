<?php

use yii\helpers\Url;
$i = 1;
$companie = Yii::$app->companie;
?>
<div class="columns">
    <div class="column main">
        <div class="home-page-1 enable-vertical-menu fixed-margin">
            <div class="container">
                <div class="bd-example">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <?php if ($companie->param('logo_sliders')):  foreach ($companie->param('logo_sliders') as $key => $val): ?>
                                <div class="carousel-item <?php if ($key == 1) {echo 'active';}?>">
                                    <img src="<?= Yii::getAlias('@images').'/images/companies-images/'. $val ?>" class="carousel-item-image d-block w-100">
                                </div>
                            <?php endforeach; else:?>
                                <div class="carousel-item active">
                                    <img src="<?= Yii::getAlias('@images').'/images/unversal/companies-default.jpeg' ?>" class="carousel-item-image d-block w-100">
                                </div>
                            <?php endif;?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Популярные бренды-->
<div class="container text-center my-3 brands_hide">
    <div class="row mx-auto my-auto">
        <div id="recipeCarousel" class="carousel slide w-100 recipeCarousel" data-ride="carousel">
            <div class="carousel-inner carousel-inner1 w-100" role="listbox">
                <?php foreach ($brands as $key => $val): ?>
                    <div class="carousel-item carousel-item1 status_for_brands <?php if ( $key == 0) {echo 'active';}?>">
                        <div class="col-md-2 card" style="border: none;">
                            <a href="#">
                                <div class=" card-body">
                                    <img class="img-fluid" src="<?= Yii::getAlias('@images').'/images/brands-images/'.$val->images ?>" style="width: 160px!important;height: 80px!important;">
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<!--Популярные товары-->
<div class="container" style="margin-top: 30px">
    <div class="block-title title_popularne_product_hide">
        <strong><?=Yii::t('app', 'Популярные товары')?></strong>
    </div>
    <div class="scrolling-wrapper row flex-row flex-nowrap mt-4 pb-4 pt-2">
        <?php foreach ($products->shopProducts(1) as $product):?>
            <div class="col-7 col-sm-4 col-md-3 col-lg-3 col-xl-2 status_for_title_popularne_product">
                <div class=" card product-item-info">
                    <div class="image-product">
                        <a href="<?=Url::to(["/products/product-view", "id" => $product->id], true)?>" class="product photo product-item-photo" tabindex="-1">
                            <span class="product-image-container product-image-container-2" style="width: 350px">
                                <span class="product-image-wrapper" style="padding-bottom: 100%;">
                                    <img class="product-image-photo" src="<?= Yii::getAlias('@images').'/images/products-images/'.$product->image[1] ?>" width="350" height="350" >
                                </span>
                            </span>
                        </a>
                        <div class="product-labels">
                            <div class="product-label ">
                                <?php if ($product->delivery):?>
                                    <img style="width: 25px; height: 25px" src="<?= \yii\helpers\Url::to(["../shopping/images/companies-images/delivery.svg"], true) ?>">
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <div class="product details product-item-details">
                        <div class="product-labels">
                            <div class="product-label new-label">
                                <?php if ($product->installment):?>
                                    <img style="width: 17px; height: 17px" src="<?= \yii\helpers\Url::to(["../shopping/images/companies-images/installment.svg"], true) ?>">
                                <?php endif;?>
                            </div>
                        </div>
                        <strong class="product name product-item-name">
                            <a class="product-item-link" href="<?=Url::to(["/products/product-view", "id" => $product->id], true)?>"><?= substr($product->{'name_'.Yii::$app->language},  0,55)?><?php if (strlen($product->{'name_'.Yii::$app->language}) > 55) echo '...'; ?> </a>
                        </strong>
                        <div class="price-actions">
                            <div class="price-box price-final_price">
                                <br>
                                <span class="old-price price_old">
                                    <?php if (isset($product->old_price) && $product['old_price'] != 0):?>
                                        <span class="price-container price-final_price tax weee">
                                            <span id="old-price-2" class="price-wrapper ">
                                                <span class="price price_old" style="color:#fe2424"><?=number_format($product->old_price, 0, ' ', ' ') ?> <?=Yii::t('app', 'сум')?></span>
                                            </span>
                                        </span>
                                    <?php endif;?>
                                </span>
                                <br>
                                <span class="special-price">
                                    <span class="price-container price-final_price tax weee">
                                        <span class="price-label">Special Price</span>
                                        <span id="product-price-2" data-price-amount="269" data-price-type="finalPrice" class="price-wrapper ">
                                            <span class="price"><?=number_format($product->new_price, 0, ' ', ' ') ?> <?=Yii::t('app', 'сум')?> </span>
                                        </span>
                                    </span>
                                </span>
                                <span class="old-price" style="text-decoration: none;">
                                    <span class="price-container price-final_price tax weee">
                                        <span class="price-label">Regular Price</span>
                                        <span id="old-price-2" data-price-amount="350" data-price-type="oldPrice" class="price-wrapper ">
                                            <span class="price" style="font-size: 1.3rem;">Рассрочка от 168 025 сум/мес</span>
                                        </span>
                                    </span>
                                </span>
                            </div>
                            <div class="product-item-inner">
                                <div class="product actions product-item-actions">
                                    <div class="actions-primary">
                                        <button type="submit"  data-id="<?=$product->id;?>" data-put-image="<?=Yii::getAlias('@images')?>" class="add-to-cart action tocart primary "  data-url="<?=Url::to(['/basket/add-basket'])?>" onclick="addBasket(this)" ><i class="bi bi-cart3"></i></button>
                                    </div>
                                    <div data-role="add-to-links" class="actions-secondary">
                                        <a href="<?=Url::to(["/products/product-view", "id" => $product->id], true)?>">
                                            <button id="cancel-btn"  class="bnt_kup btn__cancel"><?=Yii::t('app', 'Подробно')?></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
    </div>
</div>

<!--Новинки-->
<div class="container" style="margin-top: 30px">
    <div class="block-title title_new_hide">
        <strong><?=Yii::t('app', 'Новинки')?></strong>
    </div>
    <div class="scrolling-wrapper row flex-row flex-nowrap mt-4 pb-4 pt-2">
        <?php foreach ($products->shopProducts(3) as $product):?>
            <div class="col-7 col-sm-4 col-md-3 col-lg-3 col-xl-2 status_for_title_new">
                <div class=" card product-item-info">
                    <div class="image-product">
                        <a href="<?=Url::to(["/products/product-view", "id" => $product->id], true)?>" class="product photo product-item-photo" tabindex="-1">
                            <span class="product-image-container product-image-container-2" style="width: 350px">
                                <span class="product-image-wrapper" style="padding-bottom: 100%;">
                                    <img class="product-image-photo" src="<?= Yii::getAlias('@images').'/images/products-images/'.$product->image[1] ?>" width="350" height="350" >
                                </span>
                            </span>
                        </a>
                        <div class="product-labels">
                            <div class="product-label ">
                                <?php if ($product->delivery):?>
                                    <img style="width: 25px; height: 25px" src="<?= \yii\helpers\Url::to(["../shopping/images/companies-images/delivery.svg"], true) ?>">
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <div class="product details product-item-details">
                        <div class="product-labels">
                            <div class="product-label new-label">
                                <?php if ($product->installment):?>
                                    <img style="width: 17px; height: 17px" src="<?= \yii\helpers\Url::to(["../shopping/images/companies-images/installment.svg"], true) ?>">
                                <?php endif;?>
                            </div>
                        </div>
                        <strong class="product name product-item-name">
                            <a class="product-item-link" href="<?=Url::to(["/products/product-view", "id" => $product->id], true)?>"><?= substr($product->{'name_'.Yii::$app->language},  0,55)?><?php if (strlen($product->{'name_'.Yii::$app->language}) > 55) echo '...'; ?> </a>
                        </strong>
                        <div class="price-actions">
                            <div class="price-box price-final_price">
                                <br>
                                <span class="old-price price_old">
                                    <?php if (isset($product->old_price) && $product['old_price'] != 0):?>
                                        <span class="price-container price-final_price tax weee">
                                            <span id="old-price-2" class="price-wrapper ">
                                                <span class="price price_old" style="color:#fe2424"><?=number_format($product->old_price, 0, ' ', ' ') ?> <?=Yii::t('app', 'сум')?></span>
                                            </span>
                                        </span>
                                    <?php endif;?>
                                </span>
                                <br>
                                <span class="special-price">
                                    <span class="price-container price-final_price tax weee">
                                        <span class="price-label">Special Price</span>
                                        <span id="product-price-2" data-price-amount="269" data-price-type="finalPrice" class="price-wrapper ">
                                            <span class="price"><?=number_format($product->new_price, 0, ' ', ' ') ?> <?=Yii::t('app', 'сум')?> </span>
                                        </span>
                                    </span>
                                </span>
                                <span class="old-price" style="text-decoration: none;">
                                    <span class="price-container price-final_price tax weee">
                                        <span class="price-label">Regular Price</span>
                                        <span id="old-price-2" data-price-amount="350" data-price-type="oldPrice" class="price-wrapper ">
                                            <span class="price" style="font-size: 1.3rem;">Рассрочка от 168 025 сум/мес</span>
                                        </span>
                                    </span>
                                </span>
                            </div>
                            <div class="product-item-inner">
                                <div class="product actions product-item-actions">
                                    <div class="actions-primary">
                                        <button type="submit"  data-id="<?=$product->id;?>" data-put-image="<?=Yii::getAlias('@images')?>" class="add-to-cart action tocart primary"  data-url="<?=Url::to(['/basket/add-basket'])?>"  onclick="addBasket(this)" ><i class="bi bi-cart3"></i></button>
                                    </div>
                                    <div data-role="add-to-links" class="actions-secondary">
                                        <a href="<?=Url::to(["/products/product-view", "id" => $product->id], true)?>">
                                            <button id="cancel-btn"  class="bnt_kup btn__cancel"><?=Yii::t('app', 'Подробно')?></button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
    </div>
</div>

<!--Распродажа-->
<div class="container" style="margin-top: 30px">
    <div class="block-title title_sale_hide" >
        <strong><?=Yii::t('app', 'Распродажа')?></strong>
    </div>
    <div class="scrolling-wrapper row flex-row flex-nowrap mt-4 pb-4 pt-2">
        <?php foreach ($products->shopProducts(2) as $product):?>
                <div class="col-7 col-sm-4 col-md-3 col-lg-3 col-xl-2 status_for_title_sale">
                    <div class=" card product-item-info">
                        <div class="image-product">
                            <a href="<?=Url::to(["/products/product-view", "id" => $product->id], true)?>" class="product photo product-item-photo" tabindex="-1">
                                <span class="product-image-container product-image-container-2" style="width: 350px">
                                    <span class="product-image-wrapper" style="padding-bottom: 100%;">
                                        <img class="product-image-photo" src="<?= Yii::getAlias('@images').'/images/products-images/'.$product->image[1] ?>" width="350" height="350" >
                                    </span>
                                </span>
                            </a>
                            <div class="product-labels">
                                <div class="product-label ">
                                    <?php if ($product->delivery):?>
                                        <img style="width: 25px; height: 25px" src="<?= \yii\helpers\Url::to(["../shopping/images/companies-images/delivery.svg"], true) ?>">
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                        <div class="product details product-item-details">
                            <div class="product-labels">
                                <div class="product-label new-label">
                                    <?php if ($product->installment):?>
                                        <img style="width: 17px; height: 17px" src="<?= \yii\helpers\Url::to(["../shopping/images/companies-images/installment.svg"], true) ?>">
                                    <?php endif;?>
                                </div>
                            </div>
                            <strong class="product name product-item-name">
                                <a class="product-item-link" href="<?=Url::to(["/products/product-view", "id" => $product->id], true)?>"><?= substr($product->{'name_'.Yii::$app->language},  0,55)?><?php if (strlen($product->{'name_'.Yii::$app->language}) > 55) echo '...'; ?> </a>
                            </strong>
                            <div class="price-actions">
                                <div class="price-box price-final_price">
                                    <br>
                                    <span class="old-price price_old">
                                        <?php if (isset($product->old_price) && $product['old_price'] != 0):?>
                                            <span class="price-container price-final_price tax weee">
                                                <span id="old-price-2" class="price-wrapper ">
                                                    <span class="price price_old" style="color:#fe2424"><?=number_format($product->old_price, 0, ' ', ' ') ?> <?=Yii::t('app', 'сум')?></span>
                                                </span>
                                            </span>
                                        <?php endif;?>
                                    </span>
                                    <br>
                                    <span class="special-price">
                                        <span class="price-container price-final_price tax weee">
                                            <span class="price-label">Special Price</span>
                                            <span id="product-price-2" data-price-amount="269" data-price-type="finalPrice" class="price-wrapper ">
                                                <span class="price"><?=number_format($product->new_price, 0, ' ', ' ') ?> <?=Yii::t('app', 'сум')?> </span>
                                            </span>
                                        </span>
                                    </span>
                                    <span class="old-price" style="text-decoration: none;">
                                        <span class="price-container price-final_price tax weee">
                                            <span class="price-label">Regular Price</span>
                                            <span id="old-price-2" data-price-amount="350" data-price-type="oldPrice" class="price-wrapper ">
                                                <span class="price" style="font-size: 1.3rem;">Рассрочка от 168 025 сум/мес</span>
                                            </span>
                                        </span>
                                    </span>
                                </div>
                                <div class="product-item-inner">
                                    <div class="product actions product-item-actions">
                                        <div class="actions-primary">
                                            <button type="submit"  data-id="<?=$product->id;?>" data-put-image="<?=Yii::getAlias('@images')?>" class="add-to-cart action tocart primary "  data-url="<?=Url::to(['/basket/add-basket'])?>" onclick="addBasket(this)" ><i class="bi bi-cart3"></i></button>
                                        </div>
                                        <div data-role="add-to-links" class="actions-secondary">
                                            <a href="<?=Url::to(["/products/product-view", "id" => $product->id], true)?>">
                                                <button id="cancel-btn"  class="bnt_kup btn__cancel"><?=Yii::t('app', 'Подробно')?></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>
    </div>
</div>

<!--Акции-->
<div class="container promation_hide" style="margin-top: 30px">
    <div class="block-title">
        <strong><?=Yii::t('app', 'Акции')?></strong>
    </div>
    <div class=" text-center my-3">
        <div class="row mx-auto my-auto">
            <div id="recipeCarousel1" class="carousel slide w-100 recipeCarousel" data-ride="carousel">
                <div class="carousel-inner carousel-inner1 w-100" role="listbox">
                    <?php foreach ($promotions as $key => $val): ?>
                        <input type="hidden" class="status_for_title_promation" value="<?=$val->status?>">
                        <div class="carousel-item carousel-item1 <?php if ( $key == 0) {echo 'active';}?>">
                            <div class="col-12 col-sm-4">
                                <a href="<?=Url::to(["/services/promotion-view", 'id' => $val->id], true)?>">
                                    <div class="card" style="height: 115px;">
                                        <div class="card-horizontal">
                                            <div class="img-square-wrapper">
                                                <img class="img-fluid" src="<?= Yii::getAlias('@images').'/images/promotion-images/'.$val->images ?>" style="width: 160px!important;height: 120px!important;">
                                            </div>
                                            <div class="card-body" style="width: 140px">
                                                <h4 class="card-title"><?=substr($val->{ 'name_'.Yii::$app->language }, 0, 110)?>...</h4>
                                                <p class="card-text"  style="color:red"><?php
                                                    switch($val->status) {
                                                        case 0:
                                                            echo Yii::t('app', 'Акция Завершена');
                                                            break;
                                                        case 1:
                                                            echo Yii::t('app', 'Акция Активно');
                                                            break;
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
                <a class="carousel-control-prev w-auto" href="#recipeCarousel1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next w-auto" href="#recipeCarousel1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>





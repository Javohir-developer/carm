<?php
use yii\helpers\Url;
?>
<div class="container text-center my-3">
    <div class="row mx-auto my-auto">
        <div id="recipeCarouse2" class="carousel slide w-100 recipeCarousel" data-ride="carousel">
            <div class="carousel-inner carousel-inner1 w-100" role="listbox">
                <?php foreach ($categories->categories as $key => $val): ?>
                    <div class="carousel-item carousel-item1 <?php if ( $key == 0) {echo 'active';}?>">
                        <div class="col-sm-1 card"  style="border: none; width: 10%;flex: 0 0 12.499%;max-width: 11.499%;">
                            <a href="<?=Url::to(["/categories/view", 'id' => $val->id], true)?>">
                                <img class="card-img-top" src="<?= Yii::getAlias('@images').'/images/categories-images/'.$val->image ?>" style="width: 115px!important;height: 105px!important;">
                                <div class="card-body">
                                    <h5 class="card-text"><?= substr($val->{'name_'.Yii::$app->language}, 0, 25); ?><?php if(strlen($val->{'name_'.Yii::$app->language}) > 25){echo '...';}?></h5>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <a class="carousel-control-prev w-auto" href="#recipeCarouse2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next w-auto" href="#recipeCarouse2" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<div class="header-bottom ontop-element">
    <div class="container">
        <div class="desktop-menu">
            <div class="vertical-block">
                <div class="vertical-menu">
                    <div class="vertical-menu-block">
                        <div class="block-title-menu" style="cursor: pointer"  data-toggle="modal" data-target="#exampleModalLong"><i class="bi bi-text-left"></i><span><?=Yii::t('app', 'Каталог');?></span><i class="bi bi-chevron-down"></i></div>
                    </div>
                </div>
            </div>

            <div class="horizontal-block">
                <div class="horizontal-menu">
                    <div class="horizontal-megamenu-block">
                        <nav class="sm_megamenu_wrapper_horizontal_menu sambar" id="sm_megamenu_menu61ba82d1c65f6">
                            <div class="sambar-inner">
                                <div class="mega-content">
                                    <ul class="horizontal-type sm-megamenu-hover sm_megamenu_menu sm_megamenu_menu_black" data-jsapi="on">
                                        <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent    ">
                                            <a class="sm_megamenu_head sm_megamenu_drop " href="<?=Url::to(["/services/delivery"], true)?>" id="sm_megamenu_17">
                                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Доставка') ?></span>
                                                            </span>
                                            </a>
                                        </li>
                                        <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent    ">
                                            <a class="sm_megamenu_head sm_megamenu_drop " href="<?=Url::to(["/services/installment"], true)?>" id="sm_megamenu_17">
                                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Рассрочка') ?></span>
                                                            </span>
                                            </a>
                                        </li>
                                        <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent    ">
                                            <a class="sm_megamenu_head sm_megamenu_drop " href="<?=Url::to(["/services/promotions"], true)?>" id="sm_megamenu_17">
                                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Акции') ?></span>
                                                            </span>
                                            </a>
                                        </li>
                                        <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent    ">
                                            <a class="sm_megamenu_head sm_megamenu_drop " href="<?=Url::to(["/services/leave"], true)?>" id="sm_megamenu_17">
                                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Оставить отзыв') ?></span>
                                                            </span>
                                            </a>
                                        </li>
                                        <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent    ">
                                            <a class="sm_megamenu_head sm_megamenu_drop " href="<?=Url::to(["/services/about-contacts"], true)?>" id="sm_megamenu_17">
                                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'О нас и Контакты') ?></span>
                                                            </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="special-item hvr-buzz">
                    <a href="#">
                        <img class="image_shopping" src="<?=Url::to(["../shopping/images/companies-images/shop-icon1.jpeg"], true)?>" alt="Slide Image" width="260" height="50">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
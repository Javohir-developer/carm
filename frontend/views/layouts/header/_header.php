<?php

use frontend\models\Categories;
use yii\helpers\Url;
$categories = new Categories();
$companie = Yii::$app->companie;
?>
<div class="page-wrapper">
    <header class="page-header">
        <div class="header-container header-style-1">
            <?php
                echo $this->render('_header-top-section', ['companie' => $companie, 'categories' => $categories]);
                if (Yii::$app->companie->param('companies_type') == 1) {
                    echo $this->render('_header-param-section', ['companie' => $companie, 'categories' => $categories]);
                    echo $this->render('_categories-section', ['companie' => $companie, 'categories' => $categories]);
                } elseif (Yii::$app->companie->param('companies_type') == 2) {
                    echo $this->render('_header-param-section', ['companie' => $companie, 'categories' => $categories]);
                    if (isset($product)){
                        echo $this->render('_categories-section', ['companie' => $companie, 'categories' => $categories]);
                    }
                }
            ?>
        </div>
        <div class="header-mobile" id="sm-header-mobile" data-menutype="megamenu" data-breakpoint="1023">
            <div class="mobile-top">
                <div class="container">
                    <div class="mobile-header-content">
                        <div class="mobile-menu" onclick="showMobileMenu(this)">
                            <a id="btn-nav-mobile" href="javascript:void(0);">
                                <span class="s-top"></span>
                                <span class="s-middle"></span>
                                <span class="s-bottom"></span>
                            </a>
                        </div>
                        <div class="mobile-logo">
                            <a href="/">
                                <img class="img_logo" src="<?=Url::to(["../shopping/images/companies-images/empl.png"], true)?>" width="205" height="34"/><span class="logo_name_mobile">Mediapar</span>
                            </a>
                        </div>

                        <div class="mobile-cart">
                            <div id="minicart-mobile" class="minicart-mobile">
                                <?php if (Yii::$app->language == 'uz'): ?>
                                    <a href="/ru">
                                        <img class="mobile-language" src="<?=Url::to(["../shopping/images/companies-images/flags/uz.png"], true)?>" >
                                    </a>
                                <?php elseif (Yii::$app->language == 'ru'):?>
                                    <a href="/uz">
                                        <img class="mobile-language" src="<?=Url::to(["../shopping/images/companies-images/flags/ru.png"], true)?>" >
                                    </a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mobile-bottom">
                <div class="container">
                    <div class="block-search-mobile">
                        <div class="block-content">
                            <?= $this->render('_search-form'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sidebar-nav-mobile">
                <nav>
                    <div class="row">
                        <div class="col-10">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="menu-mobile-tab" data-toggle="tab" href="default#menu-mobile" role="tab" aria-controls="menu-mobile" aria-selected="true"><?=Yii::t('app', 'Категории') ?></a>
                                <!--                                <a class="nav-item nav-link" id="setting-mobile-tab" data-toggle="tab" href="default#setting-mobile" role="tab" aria-controls="setting-mobile" aria-selected="false">--><?//=Yii::t('app', 'Язык') ?><!--</a>-->
                                <!--                        <a class="nav-item nav-link" id="my-account-mobile-tab" data-toggle="tab" href="default#account-mobile" role="tab" aria-controls="account-mobile" aria-selected="false">--><?//=Yii::t('app', 'Фильтры') ?><!--</a>-->
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="button" onclick="closeMobileMenu(this)" class="close close-mobile-menu" aria-label="Close">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </div>
                </nav>
                <div class="tab-content-mobile" id="nav-tabContent">
                    <div class="tab-panel fade show active" id="menu-mobile" role="tabpanel" aria-labelledby="menu-mobile-tab">
                        <div class="nav-mobile-container sidebar-type">
                            <nav id="navigation-mobile" class="navigation-mobile">
                                <ul class="horizontal-type  sm_megamenu_menu sm_megamenu_menu_black display_none">
                                    <?php foreach ($categories->categories as $key => $val): ?>
                                        <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent parent-item" onclick="menuTab(this)">
                                            <a class="sm_megamenu_head sm_megamenu_drop sm_megamenu_haschild" href="javascript:void(0)" id="sm_megamenu_16">
                                                <span class="icon_items"></span>
                                                <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                    <span class="sm_megamenu_title"><?=$val->{'name_'.Yii::$app->language}?></span>
                                                </span>
                                            </a>
                                            <div class="sm-megamenu-child sm_megamenu_dropdown_4columns classMenuTab">
                                                <div class="sm_megamenu_col_4 sm_megamenu_firstcolumn">
                                                    <div class="sm_megamenu_col_6 sm_megamenu_firstcolumn">
                                                        <div class="sm_megamenu_head_item">
                                                            <div class="sm_megamenu_title  ">
                                                                <div class="sm_megamenu_content">
                                                                    <div class="mega-feature-content">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 feature-column">
                                                                                <a href="<?=Url::to(["/categories/category-products", 'id' => $val->id], true);?>"><h3 class="feature-title"><?=$val->{'name_'.Yii::$app->language}?></h3></a>
                                                                                <ul>
                                                                                    <?php foreach ($categories->SubCategories($val->id) as $values):?>
                                                                                        <li><a href="<?=Url::to(["/categories/category-products", 'id' => $values['id']], true);?>"><?=$values['name_'.Yii::$app->language]?></a></li>
                                                                                    <?php endforeach; ?>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="btn-submobile"><i class="bi bi-chevron-down"></i></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="tab-panel fade" id="account-mobile" role="tabpanel" aria-labelledby="account-mobile-tab">
                        <div id="customer-mobile"><span class="hidden">Mobile Customer</span></div>
                    </div>
                    <div class="tab-panel fade" id="setting-mobile" role="tabpanel" aria-labelledby="setting-mobile-tab">
                        <div class="switcher language switcher-language" data-ui-id="language-switcher" id="switcher-language-nav">
                            <!--                            <strong class="label switcher-label"><span>--><?//=Yii::t('app', 'Язык') ?><!--</span></strong>-->
                            <div class="switcher-content">
                                <div class="dropdown-switcher">
                                    <ul class="list-item">
                                        <li class="view-french switcher-option">
                                            <a href="default#">
                                                <span style="background-repeat: no-repeat; background-image:url('<?=Url::to(["../shopping/images/companies-images/flags/ru.png"], true)?>');"><?=Yii::t('app', 'Русский') ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="switcher-content">
                                <div class="dropdown-switcher">
                                    <ul class="list-item">
                                        <li class="view-french switcher-option">
                                            <a href="default#">
                                                <span style="background-repeat: no-repeat; background-image:url('<?=Url::to(["../shopping/images/companies-images/flags/uz.png"], true)?>');"><?=Yii::t('app', 'O`zbekcha') ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal kategory -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle" style="font-weight: 700;color: black;"><?=Yii::t('app', 'Все каталоги')?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-3">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <?php foreach ($categories->categories as $key => $val): ?>
                                        <a class="nav-link  <?php if ( $key == 0):?> show active <?php endif;?> sm_megamenu_head sm_megamenu_drop" data-toggle="pill" href="#menu_<?= $val->id; ?>" role="tab" aria-controls="menu_<?= $val->id; ?>" aria-selected="true" >
                                            <span class="icon_items"><img src="<?= Yii::getAlias('@images').'/images/categories-images/'.$val->image ?>" style="width: 35px;"></span>
                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                <span class="sm_megamenu_title"><?=$val->{'name_'.Yii::$app->language}; ?></span>
                                            </span>
                                        </a>
                                    <?php endforeach;?>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <?php foreach ($categories->categories as $key => $val): ?>
                                        <div class="tab-pane fade <?php if ( $key == 0):?> show active <?php endif;?>" id="menu_<?= $val->id; ?>" role="tabpanel" aria-labelledby="menu_<?= $val->id; ?>">
                                            <div class="container">
                                                <div class="categories-page fixed-margin">
                                                    <div class="block-primary categories-box">
                                                        <div class="block block-categories">
<!--                                                            <div class="block-title text-center">-->
<!--                                                                <strong>--> <!--</strong>-->
<!--                                                            </div>-->
                                                            <div class="block-content">
                                                                <div class="cat-wrap">
                                                                    <div class="item">
                                                                        <div class="content-box border-coler-mod">
                                                                            <div class="image-cat">
                                                                                <a href="<?=Url::to(["/categories/category-products", 'parentId' => $val->id], true);?>">
                                                                                    <img title="<?=$val->{'name_'.Yii::$app->language}?>" src="<?=Yii::getAlias('@images').'/images/categories-images/'.$val->image ?>">
                                                                                </a>
                                                                            </div>
                                                                            <div class="cat-title">
                                                                                <a class="all-parent-name" href="<?=Url::to(["/categories/category-products", 'id' => $val->id], true)?>"><?=Yii::t('app', 'Просмотреть все')?></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php foreach ($categories->SubCategories($val->id) as $values):?>
                                                                        <div class="item">
                                                                            <div class="content-box">
                                                                                <div class="image-cat">
                                                                                    <a href="<?=Url::to(["/categories/category-products", 'id' => $values['id']], true)?>">
                                                                                        <img src="<?=Yii::getAlias('@images').'/images/categories-images/'.$values['image'] ?>">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="cat-title">
                                                                                    <a href="<?=Url::to(["/categories/category-products", 'id' => $values['id']], true)?>"><?=$values['name_'.Yii::$app->language]?></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal kategory -->
        <div class="modal fade" id="exampleModalLong-korzina" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongKorzinaTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="page messages">
                            <div data-placeholder="messages"></div>
                        </div>
                        <div class="columns">
                            <div class="cart-container"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="nav-overlay"><span class="hidden">Overlay</span></div>


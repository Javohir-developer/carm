<?php

use frontend\models\Categories;
use yii\helpers\Url;
$categories = new Categories();
$companie = Yii::$app->companie;
?>
<?= $this->render('_header-top-section', ['companie' => $companie, 'categories' => $categories]);?>
<div class="page-wrapper">
    <header class="page-header">
        <div class="header-container header-style-1">
            <div class="header-bottom ontop-element">
                <div class="container">
                    <div class="desktop-menu">
                        <div class="vertical-block">
                            <div class="vertical-menu">
                                <div class="vertical-menu-block">
                                    <div class="block-title-menu" style="cursor: pointer"  data-toggle="modal" data-target="#exampleModalLong">
                                        <?php if (Yii::$app->companie->param('companies_type') == 1):?>
                                            <a href="<?=Url::to(['account/index'])?>">
                                                <button type="button" class="btn btn-light button-to-announce">
                                                    <i class="bi bi-broadcast-pin"></i>
                                                    <?=Yii::$app->companie->param('name');?>
                                                </button>
                                            </a>
                                        <?php elseif (Yii::$app->companie->param('companies_type') == 2): ?>
                                            <a href="<?=Url::to(['/create-user-products/create'])?>">
                                                <button type="button" class="btn btn-light button-to-announce">
                                                    <i class="bi bi-broadcast-pin"></i>
                                                    <?=Yii::t('app', 'Подать объявление');?>
                                                </button>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="horizontal-block">
                            <div class="horizontal-menu">
                                <div class="horizontal-megamenu-block">
                                    <nav class="sm_megamenu_wrapper_horizontal_menu sambar" id="sm_megamenu_menu61ba82d1c65f6">
                                        <div class="sambar-inner">
                                            <div class="mega-content">
                                                <?php if (Yii::$app->companie->param('companies_type') == 1):?>
                                                    <ul class="horizontal-type sm-megamenu-hover sm_megamenu_menu sm_megamenu_menu_black" data-jsapi="on">
                                                        <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent    ">
                                                            <a class="sm_megamenu_head sm_megamenu_drop " href="<?=Url::to(["/account/index"], true)?>" id="sm_megamenu_17">
                                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Заказы') ?></span>
                                                            </span>
                                                            </a>
                                                        </li>
                                                        <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent    ">
                                                            <a class="sm_megamenu_head sm_megamenu_drop " href="<?=Url::to(["#"], true)?>" id="sm_megamenu_17">
                                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Настройки') ?></span>
                                                            </span>
                                                            </a>
                                                        </li>
                                                        <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent    ">
                                                            <a class="sm_megamenu_head sm_megamenu_drop " href="<?=Url::to(["#"], true)?>" id="sm_megamenu_17">
                                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Платежи и счёт').' '.Yii::$app->companie->param('name'); ?></span>
                                                            </span>
                                                            </a>
                                                        </li>
                                                        <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent parent-item">
                                                            <a class="sm_megamenu_head sm_megamenu_drop sm_megamenu_haschild" href="<?=Url::to(['/account/index'])?>">
                                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
														        <i class="bi bi-person-circle"></i><span class="sm_megamenu_title"><?=Yii::t('app', 'Ваш профиль') ?></span><i class="bi bi-chevron-down"></i>
															</span>
                                                            </a>
                                                            <div class="sm-megamenu-child sm_megamenu_dropdown_4columns ">
                                                                <div data-link="" class="sm_megamenu_col_4 sm_megamenu_firstcolumn    ">
                                                                    <div data-link="" class="sm_megamenu_col_6 sm_megamenu_firstcolumn    ">
                                                                        <div class="sm_megamenu_head_item">
                                                                            <div class="sm_megamenu_title  ">
                                                                                <div class="sm_megamenu_content">
                                                                                    <div class="mega-feature-content">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-12 col-md-12 feature-column">
                                                                                                <ul>
                                                                                                    <li><a href="<?=Url::to(["/account/logout"], true)?>"><?=Yii::t('app', 'Выйти') ?></a></li>
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
                                                            <span class="btn-submobile"></span>
                                                        </li>
                                                    </ul>
                                                <?php elseif (Yii::$app->companie->param('companies_type') == 2): ?>
                                                    <ul class="horizontal-type sm-megamenu-hover sm_megamenu_menu sm_megamenu_menu_black" data-jsapi="on">
                                                    <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent    ">
                                                        <a class="sm_megamenu_head sm_megamenu_drop " href="<?=Url::to(["/account/index"], true)?>" id="sm_megamenu_17">
                                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Объявления') ?></span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent    ">
                                                        <a class="sm_megamenu_head sm_megamenu_drop " href="<?=Url::to(["#"], true)?>" id="sm_megamenu_17">
                                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Настройки') ?></span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent    ">
                                                        <a class="sm_megamenu_head sm_megamenu_drop " href="<?=Url::to(["#"], true)?>" id="sm_megamenu_17">
                                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Платежи и счёт').' '.Yii::$app->companie->param('name'); ?></span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent parent-item">
                                                        <a class="sm_megamenu_head sm_megamenu_drop sm_megamenu_haschild" href="<?=Url::to(['/account/index'])?>">
                                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
														        <i class="bi bi-person-circle"></i><span class="sm_megamenu_title"><?=Yii::t('app', 'Ваш профиль') ?></span><i class="bi bi-chevron-down"></i>
															</span>
                                                        </a>
                                                        <div class="sm-megamenu-child sm_megamenu_dropdown_4columns ">
                                                            <div data-link="" class="sm_megamenu_col_4 sm_megamenu_firstcolumn    ">
                                                                <div data-link="" class="sm_megamenu_col_6 sm_megamenu_firstcolumn    ">
                                                                    <div class="sm_megamenu_head_item">
                                                                        <div class="sm_megamenu_title  ">
                                                                            <div class="sm_megamenu_content">
                                                                                <div class="mega-feature-content">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-12 col-md-12 feature-column">
                                                                                            <ul>
                                                                                                <li><a href="<?=Url::to(["/account/logout"], true)?>"><?=Yii::t('app', 'Выйти') ?></a></li>
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
                                                        <span class="btn-submobile"></span>
                                                    </li>
                                                </ul>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

            <div class="sidebar-nav-mobile">
                <nav>
                    <div class="row">
                        <div class="col-10">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="menu-mobile-tab" data-toggle="tab" href="default#menu-mobile" role="tab" aria-controls="menu-mobile" aria-selected="true"><?=Yii::t('app', 'Категории') ?></a>
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
                                <?php if (Yii::$app->companie->param('companies_type') == 1):?>
                                    <ul class="horizontal-type  sm_megamenu_menu sm_megamenu_menu_black display_none">
                                        <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent parent-item">
                                            <a class="sm_megamenu_head sm_megamenu_drop sm_megamenu_haschild" href="<?=Url::to(['account/index'])?>">
                                                <span class="icon_items"></span>
                                                <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Заказы')?></span>
                                            </span>
                                            </a>
                                        </li>
                                        <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent parent-item">
                                            <a class="sm_megamenu_head sm_megamenu_drop sm_megamenu_haschild" href="javascript:void(0)">
                                                <span class="icon_items"></span>
                                                <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Настройки')?></span>
                                            </span>
                                            </a>
                                        </li>
                                        <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent parent-item">
                                            <a class="sm_megamenu_head sm_megamenu_drop sm_megamenu_haschild" href="javascript:void(0)">
                                                <span class="icon_items"></span>
                                                <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Платежи и счёт').' '.Yii::$app->companie->param('name')?></span>
                                            </span>
                                            </a>
                                        </li>
                                        <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent parent-item" onclick="menuTab(this)">
                                            <a class="sm_megamenu_head sm_megamenu_drop sm_megamenu_haschild" href="javascript:void(0)" id="sm_megamenu_16">
                                                <span class="icon_items"></span>
                                                <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Ваш профиль')?></span>
                                            </span>
                                            </a>
                                            <div class="sm-megamenu-child sm_megamenu_dropdown_4columns classMenuTab" style="padding: 0 0 0 0!important;">
                                                <div class="sm_megamenu_col_4 sm_megamenu_firstcolumn">
                                                    <div class="sm_megamenu_col_6 sm_megamenu_firstcolumn">
                                                        <div class="sm_megamenu_head_item">
                                                            <div class="sm_megamenu_title  ">
                                                                <div class="sm_megamenu_content">
                                                                    <div class="mega-feature-content">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 col-md-6 feature-column">
                                                                                <ul>
                                                                                    <li><a href="<?=Url::to(['account/logout'])?>"><?=Yii::t('app','Выйти')?></a></li>
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
                                    </ul>
                                <?php elseif (Yii::$app->companie->param('companies_type') == 2):?>
                                    <ul class="horizontal-type  sm_megamenu_menu sm_megamenu_menu_black display_none">
                                    <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent parent-item">
                                        <a class="sm_megamenu_head sm_megamenu_drop sm_megamenu_haschild" href="<?=Url::to(['account/index'])?>">
                                            <span class="icon_items"></span>
                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Объявления')?></span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent parent-item">
                                        <a class="sm_megamenu_head sm_megamenu_drop sm_megamenu_haschild" href="javascript:void(0)">
                                            <span class="icon_items"></span>
                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Настройки')?></span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent parent-item">
                                        <a class="sm_megamenu_head sm_megamenu_drop sm_megamenu_haschild" href="javascript:void(0)">
                                            <span class="icon_items"></span>
                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Платежи и счёт CLX')?></span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="other-toggle sm_megamenu_lv1 sm_megamenu_drop parent parent-item" onclick="menuTab(this)">
                                        <a class="sm_megamenu_head sm_megamenu_drop sm_megamenu_haschild" href="javascript:void(0)" id="sm_megamenu_16">
                                            <span class="icon_items"></span>
                                            <span class="sm_megamenu_icon sm_megamenu_nodesc">
                                                <span class="sm_megamenu_title"><?=Yii::t('app', 'Ваш профиль')?></span>
                                            </span>
                                        </a>
                                        <div class="sm-megamenu-child sm_megamenu_dropdown_4columns classMenuTab" style="padding: 0 0 0 0!important;">
                                            <div class="sm_megamenu_col_4 sm_megamenu_firstcolumn">
                                                <div class="sm_megamenu_col_6 sm_megamenu_firstcolumn">
                                                    <div class="sm_megamenu_head_item">
                                                        <div class="sm_megamenu_title  ">
                                                            <div class="sm_megamenu_content">
                                                                <div class="mega-feature-content">
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-md-6 feature-column">
                                                                            <ul>
                                                                                <li><a href="<?=Url::to(['account/logout'])?>"><?=Yii::t('app','Выйти')?></a></li>
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
                                </ul>
                                <?php endif;?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="nav-overlay"><span class="hidden">Overlay</span></div>


<?php
use yii\helpers\Url;
?>
<div class="header-middle">
    <div class="container">
        <div class="middle-content">
            <div class="logo-container">
                <h1 class="logo-content">
                    <a class="logo" href="/" title="Mediapar">
                        <img class="img_logo" src="<?=Url::to(["../shopping/images/companies-images/empl.png"], true)?>" title="<?=$companie->param('name');?>" width="205" height="34"/><span class="logo_name"><?=$companie->param('name');?></span>
                    </a>
                </h1>
            </div>
            <div class="right-container">
                <div class="right-content">
                    <!--Поиск-->
                    <div class="search-container">
                        <div class="search-wrapper">
                            <div class="block block-search">
                                <div class="block block-content">
                                    <?= $this->render('_search-form'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Аккаунт-->
                    <div class="customer-action" style="cursor: pointer">
                        <div class="customer-links" data-move="customer-mobile">
                            <ul class="header links">
                                <li class="link authorization-link" data-label="or">
                                    <a href="<?=Url::to(["/account/login"], true)?>" title="<?=Yii::t('app', 'Аккаунт') ?>"><?=Yii::t('app', 'Аккаунт') ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php if (Yii::$app->companie->param('companies_type') == 1):?>
                        <div class="minicart-header" data-url="<?=Url::to(['/basket/basket-show'])?>" onclick="basketShow(this)" data-move="minicart-mobile" <?php if (Yii::$app->controller->action->id != 'checkout'): ?> data-toggle="modal" <?php endif;?> data-target="#exampleModalLong-korzina" style="cursor: pointer">
                            <div data-block="minicart" class="minicart-wrapper logo_korzin">
                                <a class="action showcart">
                                    <span class="counter qty empty" >
                                        <span class="counter-number"></span>
                                            <span class="counter-number counter-number-qty"><?= $_SESSION['cart.qty'][$companie->id()] ?? 0 ?></span>
                                            <span class="counter-label">
                                        </span>
                                    </span>
                                    <!--Корзина-->
                                    <span class="price-minicart"></span>
                                    <span class="price-minicart">
                                        <div class="subtotal" >
                                            <div class="amount price-container">
                                                <span class="price-wrapper">
                                                    <span class="price"><?=Yii::t('app', 'Корзина')?></span>
                                                </span>
                                            </div>
                                        </div>
                                    </span>
                                </a>
                                <div class="block block-minicart">
                                    <div id="minicart-content-wrapper" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php elseif (Yii::$app->companie->param('companies_type') == 2):?>
                        <div class="minicart-header" data-url="<?=Url::to(['/like/like-show'])?>" onclick="likeShow(this)" data-move="minicart-mobile" <?php if (Yii::$app->controller->action->id != 'checkout'): ?> data-toggle="modal" <?php endif;?> data-target="#exampleModalLong-korzina" style="cursor: pointer">
                            <div data-block="minicart" class="minicart-wrapper logo_korzin">
                                <a class="action showcart">
                                    <span class="counter qty empty" >
                                        <span class="counter-number"></span>
                                            <span class="counter-number counter-number-qty"><?= $_SESSION['cart.qty'][$companie->id()] ?? 0 ?></span>
                                            <span class="counter-label">
                                        </span>
                                    </span>
                                    <!--Корзина-->
                                    <span class="price-minicart"></span>
                                    <span class="price-minicart">
                                        <div class="subtotal" >
                                            <div class="amount price-container">
                                                <span class="price-wrapper">
                                                    <span class="price"><?=Yii::t('app', 'Избранное')?></span>
                                                </span>
                                            </div>
                                        </div>
                                    </span>
                                </a>
                                <div class="block block-minicart">
                                    <div id="minicart-content-wrapper" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

use yii\helpers\Url;

?>


<nav class="mobile-bottom-nav">
    <div class="mobile-bottom-nav__item mobile-bottom-nav__item--active">
        <a href="/">
            <div class="mobile-bottom-nav__item-content">
                <i class="bi bi-house-fill size-menu-icons"></i>
                <?=Yii::t('app', 'Главная')?>
            </div>
        </a>
    </div>
    <div class="mobile-bottom-nav__item"  onclick="showMobileMenuButtm(this)">
        <div class="mobile-bottom-nav__item-content">
            <i class="bi bi-ui-checks-grid size-menu-icons"></i>
            <?=Yii::t('app', 'Каталог')?>
        </div>
    </div>
    <?php if (Yii::$app->companie->param('companies_type') == 2): ?>
        <div class="mobile-bottom-nav__item">
            <a href="<?=Url::to(['/create-user-products/create'])?>">
                <div class="mobile-bottom-nav__item-content">
                    <i class="bi bi-plus-square size-menu-icons"></i>
                    <?=Yii::t('app', 'Создать')?>
                </div>
            </a>
        </div>
        <div class="mobile-bottom-nav__item">
            <a href="<?=Url::to(['/products/checkout'])?>">
                <div class="mobile-bottom-nav__item-content">
                    <i class="bi bi-emoji-heart-eyes basket-icon"></i>
                    <?=Yii::t('app', 'Избранное')?>
                </div>
            </a>
        </div>
    <?php elseif (Yii::$app->companie->param('companies_type') == 1): ?>
        <div class="mobile-bottom-nav__item">
            <a href="<?=Url::to(['/products/checkout'])?>">
                <div class="mobile-bottom-nav__item-content">
                    <i class="bi bi-cart4 size-menu-icons"></i>
                    <?=Yii::t('app', 'Корзина')?>
                </div>
            </a>
        </div>
    <?php endif;?>
    <div class="mobile-bottom-nav__item">
        <a href="<?=Url::to(['/account/login'])?>">
            <div class="mobile-bottom-nav__item-content">
                <i class="bi bi-person-circle size-menu-icons"></i>
                <?=Yii::t('app', 'Профиль')?>
            </div>
        </a>
    </div>
</nav>
<style>
    .size-menu-icons{
        font-size: 24px;
    }
    .mobile-bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        will-change: transform;
        transform: translateZ(0);
        display: flex;
        height: 50px;
        box-shadow: 0 -2px 5px -2px #333;
        background-color: #fff;
    }
    .mobile-bottom-nav__item {
        flex-grow: 1;
        text-align: center;
        font-size: 12px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .mobile-bottom-nav__item-content {
        line-height: 15px;
        display: flex;
        flex-direction: column;
    }
</style>
</body>
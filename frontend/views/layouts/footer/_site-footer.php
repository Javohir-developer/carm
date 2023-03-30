<?php

use yii\helpers\Url;
$companie = Yii::$app->companie;
?>
</div>
</div>
</div>
</main>
<div class="page-bottom">
    <div class="content">
        <div class="back2top">
            <div class="b-icon">&#8593;</div>
            <div class="b-text">Back to Top</div>
        </div>
    </div>
</div>

<footer class="page-footer">
    <div class="footer-style-1">
        <div class="footer-top">
            <div class="services-list clearfix">
                <!--                <div class="container">-->
                <!--                    <ul>-->
                <!--                        <li>-->
                <!--                            <div class="item">-->
                <!--                                <div class="item-icon"><img src="--><?//=Url::to(["../shopping/media/wysiwyg/services/icon-1.png"], true)?><!--" alt="Service Image" width="60" height="60"></div>-->
                <!--                                <div class="item-info">-->
                <!--                                    <div class="item-title">--><?//=Yii::t('app', 'служба доставки') ?><!--</div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <div class="item">-->
                <!--                                <div class="item-icon"><img src="--><?//=Url::to(["../shopping/media/wysiwyg/services/icon-2.png"], true)?><!--" alt="Service Image" width="60" height="60"></div>-->
                <!--                                <div class="item-info">-->
                <!--                                    <div class="item-title">--><?//=Yii::t('app', 'онлайн оплата') ?><!--</div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <div class="item">-->
                <!--                                <div class="item-icon"><img src="--><?//=Url::to(["../shopping/media/wysiwyg/services/icon-3.png"], true)?><!--" alt="Service Image" width="60" height="60"></div>-->
                <!--                                <div class="item-info">-->
                <!--                                    <div class="item-title">--><?//=Yii::t('app', 'ОНЛАЙН ПОМОЩЬ') ?><!--</div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <div class="item">-->
                <!--                                <div class="item-icon"><img src="--><?//=Url::to(["../shopping/media/wysiwyg/services/icon-4.png"], true)?><!--" alt="Service Image" width="60" height="60"></div>-->
                <!--                                <div class="item-info">-->
                <!--                                    <div class="item-title">--><?//=Yii::t('app', 'АКЦИЯ ПОДАРОК') ?><!--</div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </div>-->
            </div>
        </div>
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-sm-6">
                        <div class="block-footer block-footer-contact clearfix"><img style="margin-top: -10px;margin-left: -16px;" class="footer-logo-img img_logo" src="<?=Url::to(["../shopping/images/companies-images/empl.png"], true)?>" alt="Logo footer" width="205" height="34"><span class="logo_name block-footer-title"><?=Yii::t('app', 'Контакты')?></span>
                            <br>
                            <br>
                            <div class="block-footer-content footer-contact">
                                <ul>
                                    <li class="address"><a href="<?=Url::to(["/services/about-contacts"], true)?>"><?=Yii::t('app', 'О нас ?') ?></a></li>
                                    <li class="email"><?=Yii::t('app', 'Телефон поддержки') ?><br><?=$companie->param('phone'); ?></li>
                                    <li class="time"><?=Yii::t('app', 'Рабочее время') ?><br><?=$companie->param('working_mode'); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-sm-6">
                        <div class="block-footer block-service-footer">
                            <div class="block-footer-title"><?=Yii::t('app', 'Покупателям') ?></div>
                            <div class="block-footer-content">
                                <ul>
                                    <li><a href="<?=Url::to(["/services/about-contacts"], true)?>"><?=Yii::t('app', 'Контакты') ?></a></li>
                                    <li><a href="<?=Url::to(["/services/delivery"], true)?>"><?=Yii::t('app', 'Доставка') ?></a></li>
                                    <li><a href="<?=Url::to(["/services/leave"], true)?>"><?=Yii::t('app', 'Оставить отзыв') ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-sm-6">
                        <div class="block-footer block-info-footer">
                            <div class="block-footer-title"><?=Yii::t('app', 'Услуг') ?></div>
                            <div class="block-footer-content">
                                <ul>
                                    <li><a href="<?=Url::to(["/services/make-purchase"], true)?>"><?=Yii::t('app', 'Как сделать покупку?') ?></a></li>
                                    <li><a href="<?=Url::to(["/services/payment-methods"], true)?>"><?=Yii::t('app', 'Способы оплаты') ?></a></li>
                                    <li><a href="<?=Url::to(["/services/installment"], true)?>"><?=Yii::t('app', 'Условия рассрочки') ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-sm-6">
                        <div class="block-footer block-info-footer">
                            <div class="block-footer-title"><?=Yii::t('app', 'Социальная сеть') ?></div>
                            <div class="block-footer-content">
                                <ul>
                                    <li><a target="_blank" href="/<?=$companie->param('telegram'); ?>"> <?=Yii::t('app', 'Телеграм') ?></a></li>
                                    <li><a target="_blank" href="/<?=$companie->param('facebook'); ?>"><?=Yii::t('app', 'Фейсбук') ?></a></li>
                                    <li><a target="_blank" href="/<?=$companie->param('instagram'); ?>"><?=Yii::t('app', 'Инстаграм') ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <address><?=Yii::t('app', 'создал cros') ?></address>
                    </div>
                    <div class="col-lg-6">
                    </div>
                </div>
            </div>
        </div>
</footer>

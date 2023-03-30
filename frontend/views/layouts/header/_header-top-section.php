<?php
use yii\helpers\Url;
?>
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="header-left-box">
                    <div class="header-left-info">
                        <ul>
                            <li class="phone-header"><a href="tel:+<?=$companie->param('phone');?>">+<?=$companie->param('phone');?></a></li>
                        </ul>
                    </div>
                </div>
                <!--Язык-->
                <div class="language-currency">
                    <div class="switcher language switcher-language" data-ui-id="language-switcher" id="switcher-language">
                        <strong class="label switcher-label"><span><?=Yii::t('app', 'Язык') ?></span></strong>
                        <div class="switcher-content">
                            <div class="action-switcher" id="switcher-language-trigger">
                                <div class="heading-switcher view-default" style="background-repeat: no-repeat; background-image:url('<?=Url::to(["../shopping/images/companies-images/flags/".Yii::$app->language.".png"], true)?>');">
                                    <span><?=Yii::t('app', Yii::$app->language == 'uz' ? 'O`zbekcha' : 'Русский') ?><i class="bi bi-chevron-down"></i></span>
                                </div>
                            </div>

                            <div class="dropdown-switcher">
                                <ul class="list-item">
                                    <li class="view-french switcher-option">
                                        <a href="<?=Url::to(['/', 'language' => Yii::$app->language == 'uz' ? 'ru' : 'uz'])?>">
                                            <span style="line-height: 24px;padding-left: 43px;font-size: 12px;height: 22px; background-repeat: no-repeat; background-image:url('<?=Url::to(["../shopping/images/companies-images/flags/".Yii::$app->language == 'uz' ? 'ru' : 'uz'.".png"], true)?>');"><?=Yii::t('app', Yii::$app->language == 'uz' ? 'Русский' : 'O`zbekcha') ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="free_shipping">
                    <div class="clock">
                        <ul>
                            <li id="hours">00</li>
                            <li id="separator">:</li>
                            <li id="minutes">00</li>
                            <li id="separator">:</li>
                            <li id="seconds">00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
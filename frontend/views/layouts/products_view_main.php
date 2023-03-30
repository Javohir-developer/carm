<?php
/* @var $this \yii\web\View */
/* @var $content string */
use common\widgets\Alert;
use frontend\assets\AppAsset;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <?= $this->render('header/_title-params'); ?>
    <body data-container="body" id="html-body" class="enable-ladyloading enable-stickymenu header-1-style product-1-style footer-1-style catalog-product-view product-hard-case-for-sphero-star-wars page-layout-2columns-right body-on-top">
        <?= $this->render('header/_header', ['product' => true]) ?>
            <?php $this->beginBody() ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            <?php $this->endBody() ?>
        <?= $this->render('footer/_footer'); ?>
    </body>
<?php $this->endPage();?>
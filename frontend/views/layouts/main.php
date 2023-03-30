<?php
/* @var $this \yii\web\View */
/* @var $content string */
use common\widgets\Alert;
use frontend\assets\AppAsset;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <?= $this->render('header/_title-params'); ?>
    <body class="enable-ladyloading enable-stickymenu header-1-style product-1-style footer-1-style cms-home-demo-01 cms-index-index page-layout-1column show-vertical-menu">
        <?= $this->render('header/_header') ?>
            <?php $this->beginBody() ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            <?php $this->endBody() ?>
        <?= $this->render('footer/_footer'); ?>
    </body>
<?php $this->endPage();?>
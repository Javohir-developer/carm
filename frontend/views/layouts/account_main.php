<?php
/* @var $this \yii\web\View */
/* @var $content string */
use common\widgets\Alert;
use frontend\assets\AppAsset;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <?= $this->render('header/_title-params'); ?>
    <body class="enable-ladyloading">
        <?= $this->render('header/_account-header') ?>
            <?php $this->beginBody() ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            <?php $this->endBody() ?>
        <?= $this->render('footer/_mobile-footer'); ?>
    </body>
<?php $this->endPage();?>
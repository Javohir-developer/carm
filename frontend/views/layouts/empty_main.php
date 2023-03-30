<?php
/* @var $this \yii\web\View */
/* @var $content string */
use common\widgets\Alert;
use frontend\assets\EmptyAsset;
EmptyAsset::register($this);

?>
<?php $this->beginPage() ?>
    <?= $this->render('header/_title-params'); ?>
    <?php $this->beginBody() ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    <?php $this->endBody() ?>
<?php $this->endPage();?>
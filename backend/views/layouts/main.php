
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\CorkAsset;
use common\widgets\Alert;
use yii\bootstrap\Html;
CorkAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
        <head>
            <meta charset="<?= Yii::$app->charset ?>">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <?php $this->registerCsrfMetaTags() ?>
            <title><?= Html::encode($this->title) ?></title>
            <?php $this->head() ?>
        </head>
        <body  class="layout-boxed enable-secondaryNav">
            <?php $this->beginBody() ?>
                <?= $this->render('header/_header'); ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>
                <?= $this->render('footer/_footer'); ?>
            <?php $this->endBody() ?>
        </body>
    </html>
<?php $this->endPage();

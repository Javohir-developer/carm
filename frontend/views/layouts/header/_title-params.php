<?php

use yii\helpers\Html; ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="title" content="<?= Html::encode($this->title) ?>"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <?php if (Yii::$app->companie->param('logo')): ?>
        <link href="<?= Yii::getAlias('@images').'/images/companies-images/'.Yii::$app->companie->param('logo') ?>" rel="icon">
    <?php else:?>
        <link href="<?= Yii::getAlias('@images').'/images/unversal/companies-shop.png' ?>" rel="icon">
    <?php endif;?>
    <?php $this->registerCsrfMetaTags() ?>
    <title>
        <?= Html::encode($this->title) ?>
    </title>
    <?php $this->head() ?>
</head>


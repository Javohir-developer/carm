<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\companies\models\Users */

$this->title = 'создать пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Пользователь', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

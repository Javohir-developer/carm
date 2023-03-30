<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\parameters\models\Warehouses $model */

$this->title = 'Create Warehouses';
$this->params['breadcrumbs'][] = ['label' => 'Warehouses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

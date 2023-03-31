<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\parameters\models\Warehouses $model */

?>
<div class="warehouses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

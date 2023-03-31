<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\parameters\models\Warehouses $model */

?>
<div class="warehouses-create">

    <h1><?= Html::encode(Yii::t('app', 'Создать склад')) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

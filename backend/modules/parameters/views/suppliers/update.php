<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\parameters\models\Suppliers $model */

?>
<div class="suppliers-update">

    <h1><?= Html::encode(Yii::t('app', 'Обновление поставщиков')) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

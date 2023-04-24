<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\parameters\models\Suppliers $model */

$this->title = Yii::t('app', 'Создать поставщиков');
?>
<div class="suppliers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\products\models\ProductTypes $model */
$this->title = Yii::t('app', 'Создать тип');
?>
<div class="product-types-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

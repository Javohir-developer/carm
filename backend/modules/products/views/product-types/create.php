<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\products\models\ProductTypes $model */

?>
<div class="product-types-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

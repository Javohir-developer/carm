<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\products\models\ListOfTransitions $model */


?>
<div class="list-of-transitions-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

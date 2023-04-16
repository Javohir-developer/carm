<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\products\models\ListOfTransitions $model */

$this->title = 'Create List Of Transitions';
$this->params['breadcrumbs'][] = ['label' => 'List Of Transitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-of-transitions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

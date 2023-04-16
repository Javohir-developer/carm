<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\products\models\ListOfTransitions $model */

$this->title = 'Update List Of Transitions: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'List Of Transitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="list-of-transitions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

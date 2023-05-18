<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\products\models\TransitionListGroup $model */

$this->title = 'Create Transition List Group';
$this->params['breadcrumbs'][] = ['label' => 'Transition List Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transition-list-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

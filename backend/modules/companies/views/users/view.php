<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\companies\models\Users */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'email:email',
            'rule',
            [
                'label' => 'status',
                'attribute' => 'status',
                'filter' => ['10' => 'активный', '9' => 'неактивный'],
                'filterInputOptions' => ['prompt' => 'Все образования', 'class' => 'form-control', 'id' => null],
                'value' => function ($model) {
                    if ($model->status == 10){
                        return 'активный';
                    }else{
                        return 'неактивный';
                    }
                }
            ],
            [
                'attribute' => 'created_at',
                'filter' => true,
                'format' => 'raw',
                'value' => function ($model) {
                    return date('Y-m-d', $model->created_at);
                }
            ],
            //'updated_at',
            //'verification_token',
        ],
    ]) ?>

</div>

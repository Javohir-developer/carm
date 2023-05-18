<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\modules\products\models\TransitionListGroup $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Transition List Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="transition-list-group-view">

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
            'id',
            'user_id',
            'company_id',
            'warehouse_id',
            'supplier_id',
            'product_types_id',
            'date',
            'currency',
            'currency_amount',
            'barcode',
            'group',
            'name',
            'model',
            'brand',
            'size_num',
            'size_type',
            'ikpu',
            'unit_amount',
            'max_ast',
            'min_ast',
            'production_time',
            'term_amount',
            'term_type',
            'valid',
            'ndc',
            'entry_price',
            'evaluation',
            'exit_price',
            'sum_entry_price',
            'sum_exit_price',
            'unit_type',
            'amount',
            'input_status',
            'status',
            'code_group',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

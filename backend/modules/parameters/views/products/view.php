<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\modules\parameters\models\Products $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">

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
            'date',
            'currency',
            'currency_amount',
            'barcode',
            'group',
            'type',
            'model',
            'brand',
            'size',
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
            'old_entry_price',
            'old_evaluation',
            'old_exit_price',
            'unit_type',
            'amount',
            'input_status',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

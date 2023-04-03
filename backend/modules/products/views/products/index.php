<?php

use yii\widgets\Pjax;
//echo '<pre>';
//print_r($getProductInCache);
?>
<div id="_cache-index">
    <?= $this->render('_cache-index')?>
</div>
<?= $this->render('_form', ['model' => $model]) ?>


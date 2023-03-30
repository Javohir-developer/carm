<?php
use yii\helpers\Url;
$count_number = 1;
?>
<div class="container text-center my-3">
    <div class="row mx-auto my-auto">
        <div class="carousel slide w-100">
            <div class="carousel-inner carousel-inner1">
                <div class="row row-categories-width">
                    <?php foreach ($categories as $key => $val): ?>
                        <div class="category-<?=$count_number;?> col-4 col-sm-3 col-md-3 col-lg-2 multi-shop-class-width" data-check-num="<?=$count_number++;?>" data-id="<?=$val->id;?>" data-url="<?=Url::to(['/'])?>" onclick="subCategories(this)">
                            <a href="#">
                                <img class="card-img-top category-image-multe-hom" src="<?= Yii::getAlias('@images').'/images/categories-images/'.$val->image ?>">
                                <div class="card-body">
                                    <h5 class="card-text"><?= substr($val->{'name_'.Yii::$app->language}, 0, 25); ?></h5>
                                </div>
                            </a>
                        </div>
                    <?php endforeach;?>
                    <input type="hidden" name="count-number" value="<?=$count_number-1;?>">
                </div>
            </div>
        </div>
    </div>
</div>


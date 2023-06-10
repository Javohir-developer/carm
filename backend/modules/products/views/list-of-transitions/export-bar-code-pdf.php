<?php
use diecoding\barcode\generator\Barcode;
?>
<div class="row">
    <?php foreach($model as $value):?>
        <div class="column">
            <div class="card">
                <div style="width:86%;float:left;">
                    <p><?= $value->name ?></p>
                    <p><?= $value->exit_price ?></p>
                    <span><?=Barcode::widget([
  'tag'     => 'img',
  'value'   => '12345678',
  'options' => [
      'style' => "width: 4cm; height: 1cm;",
  ],
  'pluginOptions' => [
      'displayValue' => false,
  ],
]);?></span>
                </div>
                <div style="text-align:center;">
                    <span class="barcod-date"><?=substr(date('Y'), 2)?></span><br>
                    <span class="barcod-date">|</span><br>
                    <span class="barcod-date"><?=date('m')?></span><br>
                    <span class="barcod-date">|</span><br>
                    <span class="barcod-date"><?=date('d')?></span>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>

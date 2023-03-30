<?php use yii\helpers\Url;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([ 'action' => Url::to(['/search/search']), 'method' => 'get', 'options' => ['id' => 'searchbox_mini_form', 'class' => 'form minisearch' ]]); ?>
    <div class="field search">
        <div class="control">
            <input  type="text" name="Search[search]" required placeholder="Что вы ищете..." class="input-text" autocomplete="off" />
        </div>
    </div>
    <div class="actions">
        <button type="submit" title="Search" class="btn-searchbox">
            <span title="<?=Yii::t('app', 'Поиск') ?>"><?=Yii::t('app', 'Поиск') ?></span>
            <i class="bi bi-search"></i>
        </button>
    </div>
<?php ActiveForm::end(); ?>
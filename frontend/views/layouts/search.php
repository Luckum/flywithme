<?php

use kartik\typeahead\Typeahead;
use yii\jui\DatePicker;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\helpers\Html;

$script = <<<JS
    $(function () {
        $('#twidget').twidget({
            locale: 'en',
            marker: 198799,
            type: 'avia',
            open_in_new_tab: false
        });
    });
JS;
$this->registerJs($script, $this::POS_END);
?>
<div class="search-frm-title">
    <h1><?= Yii::t('app', 'Book now') ?></h1>
</div>
<div class="search-frm-content row">
    <ul class="fly-types-switcher">
        <li class="fly-types-switcher-tab active" data-type="return"><?= Yii::t('app', 'Return') ?>
        <li class="fly-types-switcher-tab" data-type="oneway"><?= Yii::t('app', 'One way') ?>
    </ul>
    
    <div class="twidget-container" id="twidget"></div>
</div>


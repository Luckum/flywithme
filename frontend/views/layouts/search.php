<?php

use kartik\typeahead\Typeahead;
use yii\jui\DatePicker;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;

$script = <<<JS
    $(function () {
        $('#twidget').twidget({
            locale: 'en',
            marker: 198799,
            type: 'avia',
            open_in_new_tab: false
        });
    });
    
    function submitClientData()
    {
        $.ajax({
            url: "/client/submit-data",
            type: "POST",
            data: $("#client-data-frm").serialize(),
            success: function(data) {
                $("#promocode-value").val(data.code);
            }
        });
    }
JS;
$this->registerJs($script, $this::POS_END);
?>
<div class="search-frm-title">
    <h1><?= Yii::t('app', 'Book now') ?></h1>
</div>
<div class="search-frm-content row">
    <ul class="client-cnt">
        <li class="client-tab" data-type="return" data-toggle="modal" data-target="#client-data-modal"><span class="glyphicon glyphicon-user header-menu-icon"></span>&nbsp;&nbsp;<?= Yii::t('app', 'For clients') ?>
    </ul>
    <ul class="fly-types-switcher">
        <li class="fly-types-switcher-tab active" data-type="return"><?= Yii::t('app', 'Return') ?>
        <li class="fly-types-switcher-tab" data-type="oneway"><?= Yii::t('app', 'One way') ?>
    </ul>
    
    <div class="twidget-container" id="twidget"></div>
</div>

<?php Modal::begin([
    'id' => 'client-data-modal',
    'options' => ['tabindex' => false],
    'clientOptions' => [
        'backdrop' => 'static',
        'keyboard' => false
    ],
    'footer' => '<a class="btn btn-default" data-dismiss="modal" aria-hidden="true">' . Yii::t('app', 'Close') . '</a>
                 <button id="submit-client-data-btn" class="btn btn-info" type="button" onclick="submitClientData()">' . Yii::t('app', 'Submit') . '</button>',
]); ?>

    <form id="client-data-frm">
        <input type="text" class="client-input-fld" placeholder="<?= Yii::t('app', 'Last name') ?>" name="l_name">
        <input type="text" class="client-input-fld" placeholder="<?= Yii::t('app', 'First name') ?>" name="f_name">
        <input type="text" class="client-input-fld" placeholder="<?= Yii::t('app', 'Second name') ?>" name="s_name">
        <input type="text" class="client-input-fld" placeholder="<?= Yii::t('app', 'Passport') ?>" name="pass">
        <input type="text" class="client-input-fld" placeholder="<?= Yii::t('app', 'Promocode') ?>" name="code">
    </form>

<?php Modal::end(); ?>
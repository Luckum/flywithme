<?php

use kartik\typeahead\Typeahead;
use yii\jui\DatePicker;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\helpers\Html;

$template = '<div><p><span class="srch-frm-value-city">{{city}}</span>, ' .
            '<span class="srch-frm-value-country">{{country}}</span></p>' .
            '<p class="srch-frm-value-airport">{{airport}}</p></div>';


$script = <<<JS
    $(function () {
        var dateFormat = "D. d M, yy",
            from = $("#date-from")
                .datepicker({
                    changeMonth: false,
                    numberOfMonths: 2,
                    dateFormat: dateFormat,
                    minDate: new Date(),
                    showButtonPanel: true,
                    currentText: "",
                    closeText: "Close",
                })
                .on("change", function () {
                    to.datepicker("option", "minDate", getDate(this));
                })
                
            to = $("#date-to")
                .datepicker({
                    changeMonth: false,
                    numberOfMonths: 2,
                    dateFormat: dateFormat,
                    minDate: new Date(),
                    showButtonPanel: true,
                    currentText: "",
                    closeText: "Close"
                })
                .on("change", function () {
                    from.datepicker("option", "maxDate", getDate(this));
                });
        function getDate(element) {
            var date;
            try {
                date = $.datepicker.parseDate(dateFormat, element.value);
            } catch(error) {
                date = null;
            }
     
            return date;
        }
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
</div>
<div class="search-frm-content row">
    <div class="col-md-6">
        <?php
            echo Typeahead::widget([
                'name' => 'srch_frm_from', 
                'options' => ['placeholder' => Yii::t('app', 'From')],
                'pluginOptions' => [
                    'minLength' => 3,
                    'highlight' => true,
                ],
                'dataset' => [
                    [
                        'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
                        'display' => 'city',
                        'remote' => [
                            'url' => Url::to(['search/place-list']) . '?q=%QUERY',
                            'wildcard' => '%QUERY'
                        ],
                        'templates' => [
                            'notFound' => '<div class="text-danger" style="padding:0 8px">Unable to find city or airport for selected query</div>',
                            'suggestion' => new JsExpression("Handlebars.compile('{$template}')")
                        ]
                    ]
                ]
            ]);
        ?>
    </div>
    <div class="col-md-6">
        <?php
            echo Typeahead::widget([
                'name' => 'srch_frm_to', 
                'options' => ['placeholder' => Yii::t('app', 'To')],
                'pluginOptions' => [
                    'minLength' => 3,
                    'highlight' => true,
                ],
                'dataset' => [
                    [
                        'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
                        'display' => 'city',
                        'remote' => [
                            'url' => Url::to(['search/place-list']) . '?q=%QUERY',
                            'wildcard' => '%QUERY'
                        ],
                        'templates' => [
                            'notFound' => '<div class="text-danger" style="padding:0 8px">Unable to find city or airport for selected query</div>',
                            'suggestion' => new JsExpression("Handlebars.compile('{$template}')")
                        ]
                    ]
                ]
            ]);
        ?>
    </div>
</div>
<div class="search-frm-content row">
    <div class="col-md-6 has-feedback">
        <input type="text" class="form-control" id="date-from" placeholder="<?= Yii::t('app', 'Departure') ?>">
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
    </div>
    <div class="col-md-6 has-feedback" id="date-to-cnt">
        <input type="text" class="form-control" id="date-to" placeholder="<?= Yii::t('app', 'Return') ?>">
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
    </div>
</div>
<div class="search-frm-content row">
    <div class="col-md-6 has-feedback">
        <div class="form-control passengers-detail-cnt"><span>1 <?= Yii::t('app', 'adult') ?></span></div>
        <div class="passengers-detail-options">
            <ul class="passengers-detail-age-group">
                <li>
                    <div class="passengers-detail-age-name">
                        <span><?= Yii::t('app', 'Adults') ?></span>
                    </div>
                    <div class="passengers-detail-age-value" data-age="adults">
                        <div class="age-value-dec" onclick="passenger_remove(this);"><span class="glyphicon glyphicon-minus"></span></div>
                        <div class="age-value-val">1</div>
                        <div class="age-value-inc" onclick="passenger_add(this);"><span class="glyphicon glyphicon-plus"></span></div>
                    </div>
                </li>
                <li>
                    <div class="passengers-detail-age-name">
                        <span><?= Yii::t('app', 'Children to 12 years') ?></span>
                    </div>
                    <div class="passengers-detail-age-value" data-age="children">
                        <div class="age-value-dec" onclick="passenger_remove(this);"><span class="glyphicon glyphicon-minus"></span></div>
                        <div class="age-value-val">0</div>
                        <div class="age-value-inc" onclick="passenger_add(this);"><span class="glyphicon glyphicon-plus"></span></div>
                    </div>
                </li>
                <li>
                    <div class="passengers-detail-age-name">
                        <span><?= Yii::t('app', 'Infants to 2 years') ?></span>
                    </div>
                    <div class="passengers-detail-age-value" data-age="infants">
                        <div class="age-value-dec" onclick="passenger_remove(this);"><span class="glyphicon glyphicon-minus"></span></div>
                        <div class="age-value-val">0</div>
                        <div class="age-value-inc" onclick="passenger_add(this);"><span class="glyphicon glyphicon-plus"></span></div>
                    </div>
                </li>
            </ul>
            <div class="message"><span></span></div>
            <div class="passengers-detail-footer">
                <button class="search-frm-close-btn pull-right"><?= Yii::t('app', 'Close') ?></button>
            </div>
        </div>
        <span class="glyphicon glyphicon-chevron-down form-control-feedback"></span>
    </div>
    <div class="col-md-6">
        <div class="rail-select">
            <div class="select-side">
                <i class="glyphicon glyphicon-chevron-down"></i>
            </div>
            <select id="trip-class" class="trip-class form-control">
                <option value="Y" selected><?= Yii::t('app', 'Economy class') ?></option>
                <option value="C"><?= Yii::t('app', 'Business class') ?></option>
            </select>
        </div>
    </div>
</div>
<div class="search-frm-content row">
    <div class="col-md-6">
        <button class="btn btn-info btn-search" id="submit-search-frm-btn"><?= Yii::t('app', 'Search flights') ?></button>
    </div>
</div>
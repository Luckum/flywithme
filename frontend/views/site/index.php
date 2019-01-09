<?php

use Yii;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>
<div class="site-index">
    <div class="popular-searches">
        <div class="container">
            <h2><?= Yii::t('app', 'Popular searches') ?></h2>
            <div class="item-cnt pull-left">
            </div>
            <div class="item-cnt">
            </div>
            <div class="item-cnt pull-right">
            </div>
        </div>
    </div>
    
    <div class="latest-deals">
        <div class="container">
            <h2><?= Yii::t('app', 'Latest deals') ?></h2>
            <div class="item-cnt pull-left">
            </div>
            <div class="item-cnt">
            </div>
            <div class="item-cnt pull-right">
            </div>
        </div>
    </div>
    
    <div class="info">
        <div class="container">
            <div class="info-title">
                <span><?= Yii::t('app', 'Why FlySafe-24?') ?></span>
            </div>
            <div class="info-cnt">
                <div class="item-cnt pull-left">
                    Our travel service deals with more then 600 airlines in more than 200 countries and territories
                </div>
                <div class="item-cnt">
                    Using Flywithme is very easy. You can buy your flight-ticket within 2 clicks
                </div>
                <div class="item-cnt pull-right">
                    Flywithme is safe and secure
                </div>
            </div>
            <div class="info-links pull-right">
                <a href="<?= Url::to(['/about']) ?>"><?= Yii::t('app', 'About us') ?></a>
                <a href="<?= Url::to(['/contact']) ?>"><?= Yii::t('app', 'Contact us') ?></a>
                <a href="<?= Url::to(['/advantages']) ?>"><?= Yii::t('app', 'More advantages') ?></a>
            </div>
        </div>
    </div>
</div>

<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>
<div class="site-index">
    <div class="popular-searches">
        <div class="container">
            <h2><?= Yii::t('app', 'Popular searches') ?></h2>
            <div class="item-cnt pull-left">
                <script async src="//www.travelpayouts.com/weedle/widget.js?marker=198799&host=search.flysafe-24.com%2Fflights&locale=en_us&currency=usd&powered_by=false&destination=MOW&destination_name=%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0" charset="UTF-8"></script>
            </div>
            <div class="item-cnt">
                <script async src="//www.travelpayouts.com/weedle/widget.js?marker=198799&host=search.flysafe-24.com%2Fflights&locale=en_us&currency=usd&powered_by=false&destination=PAR&destination_name=%D0%9F%D0%B0%D1%80%D0%B8%D0%B6" charset="UTF-8"></script>
            </div>
            <div class="item-cnt pull-right">
                <script async src="//www.travelpayouts.com/weedle/widget.js?marker=198799&host=search.flysafe-24.com%2Fflights&locale=en_us&currency=usd&powered_by=false&destination=ROM&destination_name=%D0%A0%D0%B8%D0%BC" charset="UTF-8"></script>
            </div>
        </div>
    </div>
    
    <div class="latest-deals">
        <div class="container">
            <h2><?= Yii::t('app', 'Special offers') ?></h2>
            <script async src="//www.travelpayouts.com/ducklett/scripts_en_us.js?widget_type=brickwork&currency=usd&host=search.flysafe-24.com%2Fflights&marker=198799.&limit=3&powered_by=false" charset="UTF-8"></script>
        </div>
    </div>
    
    <div class="info">
        <div class="container">
            <div class="info-title">
                <span><?= Yii::t('app', 'Why FlySafe-24?') ?></span>
            </div>
            <div class="info-cnt">
                <div class="item-cnt pull-left">
                    <img class="item-img" src="/images/airline.png">
                    Our travel service deals with more then 600 airlines in more than 200 countries and territories
                </div>
                <div class="item-cnt">
                    <img class="item-img" src="/images/easy.png">
                    Using Flywithme is very easy. You can buy your flight-ticket within 2 clicks
                </div>
                <div class="item-cnt pull-right">
                    <img class="item-img" src="/images/safe.png">
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

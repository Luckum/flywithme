<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Ubuntu:300%7CUbuntu:400%7CUbuntu:500%7CUbuntu:700"/>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap main-wrap">
    <div class="header-wide-container">
        <header>
            <!--<div class="header-menu-container">
                <ul class="header-menu-list">
                    <li><span class="glyphicon glyphicon-user header-menu-icon"></span><?= Yii::t('app', 'Log in or Sign up') ?>
                    <li class="header-menu-separator"><span></span>
                    <li><span class="glyphicon glyphicon-star header-menu-icon"></span><?= Yii::t('app', 'Enter promocode') ?>
                </ul>
            </div>-->
            <div class="header-logo-container">
                <a href="/"><img src="/images/logo-3.png"></a>
            </div>
        </header>
        <div class="search-frm-container">
            <?= $this->render('search') ?>
        </div>
    </div>

    <div class="wide-container">
        <div id="wait" style="display: none;">
            waiting
        </div>
        <?= $content ?>
    </div>
</div>

<footer class="footer-container">
    <div class="footer-wide-container">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="/images/logo-3.png">
            </div>
            <div class="footer-bottom-links">
                <a class="footer-link" href="<?= Url::to(['/terms-and-conditions']) ?>"><?= Yii::t('app', 'Terms and conditions') ?></a>
                <a class="footer-link" href="<?= Url::to(['/privacy-policy']) ?>"><?= Yii::t('app', 'Privacy policy') ?></a>
                <a class="footer-link" href="<?= Url::to(['/advantages']) ?>"><?= Yii::t('app', 'Why FlySafe-24') ?></a>
            </div>
            <div class="footer-copy">
                &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?>. <?= Yii::$app->params['companyAddress'] ?>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

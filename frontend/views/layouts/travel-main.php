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
    <script type="text/javascript">
        var globals = {
            maxPassengersCount      : '<?= Yii::$app->params['maxPassengersCount'] ?>',
            maxPassengersCountStr   : '<?= Yii::t('app', 'The maximum number of passengers is 9.') ?>',
            maxChildrenCountStr     : '<?= Yii::t('app', 'Maximum of 2 children per adult.') ?>',
            maxInfantsCountStr      : '<?= Yii::t('app', 'Maximum of 1 infant per adult.') ?>',
            maxChildrenInfantsCountStr  : '<?= Yii::t('app', 'Maximum of 1 infant + 1 child per adult.') ?>',
            adultStr                : '<?= Yii::t('app', 'adult') ?>',
            adultsStr               : '<?= Yii::t('app', 'adults') ?>',
            childStr                : '<?= Yii::t('app', 'child') ?>',
            childrenStr             : '<?= Yii::t('app', 'children') ?>',
            infantStr               : '<?= Yii::t('app', 'infant') ?>',
            infantsStr              : '<?= Yii::t('app', 'infants') ?>',
        };
    </script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap main-wrap">
    <div class="header-wide-container-results">
        <header>
            <div class="header-logo-container">
                <a href="/"><img src="/images/logo-3.png"></a>
            </div>
        </header>
        
    </div>

    <div class="container">

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

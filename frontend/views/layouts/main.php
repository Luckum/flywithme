<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
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

<div class="wrap">
    <div class="header-wide-container">
        <header>
            <div class="header-menu-container">
                <ul class="header-menu-list">
                    <li>Page1
                    <li class="header-menu-separator"><span></span>
                    <li>Page2
                    <li class="header-menu-separator"><span></span>
                    <li>Page3
                    <li class="header-menu-separator"><span></span>
                    <li>Page4
                </ul>
            </div>
            <div class="header-logo-container">
                LOGO
            </div>
        </header>
        <div class="search-frm-container">
            <?= $this->render('search') ?>
        </div>
    </div>

    <div class="container">

        <?= $content ?>
    </div>
</div>

<footer class="footer-container">
    <div class="footer-wide-container">
        <div class="footer-content">
            <a href="#">link1</a>
            <a href="#">link2</a>
            <a href="#">link3</a>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

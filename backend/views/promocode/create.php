<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Promocode */

$this->title = 'Добавить промокод';
$this->params['breadcrumbs'][] = ['label' => 'Промокоды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promocode-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

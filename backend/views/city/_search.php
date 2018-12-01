<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'country_id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'name_ru') ?>

    <?php // echo $form->field($model, 'name_fr') ?>

    <?php // echo $form->field($model, 'name_de') ?>

    <?php // echo $form->field($model, 'coordinates_lon') ?>

    <?php // echo $form->field($model, 'coordinates_lat') ?>

    <?php // echo $form->field($model, 'time_zone') ?>

    <?php // echo $form->field($model, 'name_translations') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

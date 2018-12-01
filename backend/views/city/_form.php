<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'country_id')->textInput() ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_fr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_de')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coordinates_lon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coordinates_lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time_zone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_translations')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

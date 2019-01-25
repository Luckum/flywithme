<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Promocode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promocode-form">

    <div class="col-md-8 generate-buttons" style="margin-bottom: 15px;">
        <a class="btn btn-info btn-sm" href="javascript:void(0);" data-type="numbs">Сгенерировать числовой код</a>
        <a class="btn btn-info btn-sm" href="javascript:void(0);" data-type="chars">Сгенерировать символьный код</a>
        <a class="btn btn-info btn-sm" href="javascript:void(0);" data-type="mixed">Сгенерировать символьно-числовой код</a>
    </div>
    <div class="col-md-6">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'expire_at')->widget(DateTimePicker::classname(), [
            'options' => ['placeholder' => 'Введите дату и время истечения'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'startDate' => date('Y-m-d H:i:s')
                ]
        ])->label($model->getAttributeLabel('expire_at') . ' (оставьте пустым для бессрочного действия)') ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>

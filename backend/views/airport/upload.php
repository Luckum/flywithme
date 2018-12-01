<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Country */

$this->title = 'Загрузить из файла';
$this->params['breadcrumbs'][] = ['label' => 'Аэропорты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="col-md-6">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'upFile')->fileInput() ?>
                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>

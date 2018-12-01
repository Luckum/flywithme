<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Страны';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>-->
        <?= Html::a('Загрузить из файла', ['upload'], ['class' => 'btn btn-success']) ?>
        
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code',
            'name_ru',
            'name_en',
            'currency',
 
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

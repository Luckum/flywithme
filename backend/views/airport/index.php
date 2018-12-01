<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AirportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Аэропорты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="airport-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
<!--        <?= Html::a('Create Airport', ['create'], ['class' => 'btn btn-success']) ?>-->
        <?= Html::a('Загрузить из файла', ['upload'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'country_id',
            'city_id',
            'code',
            'name_ru',
            'name_en',
            //'coordinates_lon',
            //'coordinates_lat',
            //'time_zone',
            //'name_translations:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

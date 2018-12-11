<?php

namespace frontend\controllers;

use Yii;
use yii\web\Response;

class TravelController extends BaseController
{
    public $layout = "@app/views/layouts/travel-main";
    
    public function actionSearchResults(/*$from, $to, $adults, $children, $infants, $trip_class, $date_from, $date_to = ''*/)
    {
        return $this->render('index', [
             /*'from' => $from,
             'to' => $to,
             'date_from' => $date_from,
             'date_to' => $date_to,
             'adults' => $adults,
             'children' => $children,
             'infants' => $infants,
             'trip_class' => $trip_class,*/
        ]);
    }
    
    public function actionGetResults()
    {
        $from = $_POST['from'];
        $to = $_POST['to'];
        $adults = $_POST['adults'];
        $children = $_POST['children'];
        $infants = $_POST['infants'];
        $trip_class = $_POST['trip_class'];
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];
        
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $data;
    }
}
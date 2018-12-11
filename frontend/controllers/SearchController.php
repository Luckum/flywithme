<?php

namespace frontend\controllers;

use Yii;
use yii\web\Response;
use yii\filters\AccessControl;
use common\models\User;
use common\models\City;
use common\models\Airport;

class SearchController extends BaseController
{
    public function actionPlaceList($q)
    {
        if (!empty($q)) {
            $lang_code = explode('-', Yii::$app->language);
            $lang = $lang_code[0];
            
            $results = City::find()
                ->select('city.name_' . $lang . ' as city_name,
                    country.name_' . $lang . ' as country_name,
                    airport.name_' . $lang . ' as airport_name,
                    airport.code as airport_code,
                    city.code as city_code')
                ->joinWith('airports')
                ->joinWith('country')
                ->where("city.name_$lang LIKE '$q%'")
                ->orWhere("country.name_$lang LIKE '$q%'")
                ->orderBy('city.name_' . $lang)
                ->limit(Yii::$app->params['searchResultCount'])
                ->all();
                
            if ($results) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                $ret = $ret_f = [];
                foreach ($results as $k => $res) {
                    $airs = Airport::find()->joinWith('city')->where(['city.name_' . $lang => $res->city_name])->count();
                    if ($airs > 5) {
                        $ret_f[0]['city'] = $res->city_name;
                        $ret_f[0]['country'] = $res->country_name;
                        $ret_f[0]['airport'] = 'All airports';
                        $ret_f[0]['code'] = $res->city_code;
                        $k ++;
                    }
                    
                    $ret[$k]['city'] = $res->city_name;
                    $ret[$k]['country'] = $res->country_name;
                    $ret[$k]['airport'] = $res->airport_name;
                    $ret[$k]['code'] = $res->airport_code;
                }
                
                if (count($ret_f)) {
                    $ret = $ret_f + $ret; 
                }
                return $ret;
            }
        }
        return false;
    }
}
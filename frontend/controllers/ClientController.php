<?php

namespace frontend\controllers;

use Yii;
use common\models\Client;
use common\models\Promocode;

class ClientController extends BaseController
{
    public function actionSubmitData()
    {
        $first_name = Yii::$app->request->post('f_name');
        $last_name = Yii::$app->request->post('l_name');
        $mid_name = Yii::$app->request->post('s_name');
        $passport = Yii::$app->request->post('pass');
        $promocode = Yii::$app->request->post('code');
        
        if (!empty($first_name) && !empty($last_name) && !empty($passport)) {
            $client = Client::find()->where(['last_name' => $last_name, 'first_name' => $first_name, 'passport' => $passport])->one();
            if ($client) {
                Yii::$app->response->cookies->add(new \yii\web\Cookie([
                    'name' => 'client',
                    'value' => $client->id,
                    'domain' => Yii::$app->params['site.cookies.domain'],
                ]));
            }
        }
        if (!empty($promocode)) {
            $code = Promocode::find()->where(['value' => $promocode])->one();
            if ($code) {
                if (!empty($code->expire_at) && $code->expire_at < date('Y-m-d H:i:s')) {
                    return 'expire';
                }
                Yii::$app->response->cookies->add(new \yii\web\Cookie([
                    'name' => 'code',
                    'value' => $code->id,
                    'domain' => Yii::$app->params['site.cookies.domain'],
                ]));
            }
        }
    }
}

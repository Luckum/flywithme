<?php

namespace backend\controllers;

use Yii;
use common\models\Promocode;
use common\models\PromocodeSearch;
use backend\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;

/**
 * PromocodeController implements the CRUD actions for Promocode model.
 */
class PromocodeController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Promocode models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PromocodeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Promocode model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Promocode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Promocode();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Promocode model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Promocode model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Promocode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Promocode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Promocode::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionGenerate()
    {
        $type = Yii::$app->request->post('type');
        $code = $this->genCode($type);
        
        while (Promocode::find()->where(['value' => $code])->exists()) {
            $code = $this->genCode($type);
        }
        
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'code' => $code
        ];
    }
    
    protected function genCode($type)
    {
        $code = '';
        switch ($type) {
            case 'numbs':
                for ($i = 0; $i < 12; $i ++) {
                    $rand = rand(0, 9);
                    $code .= $rand;
                }
            break;
            case 'chars':
                $set = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                for ($i = 0; $i < 12; $i ++) {
                    $rand = rand(0, strlen($set) - 1);
                    $code .= $set[$rand];
                }
            break;
            case 'mixed':
                $set = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                for ($i = 0; $i < 12; $i ++) {
                    $rand = rand(0, strlen($set) - 1);
                    $code .= $set[$rand];
                }
            break;
        }
        return $code;
    }
}

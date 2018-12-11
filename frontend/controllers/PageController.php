<?php

namespace frontend\controllers;

use Yii;
use common\models\Page;

class PageController extends BaseController
{
    public $layout = "@app/views/layouts/travel-main";
    public function actionAbout()
    {
        $page = $this->findModel('about');
        if ($page) {
            return $this->render('show-page', [
                'page' => $page
            ]);
        }
        return $this->goHome();
    }
    
    public function actionTermsAndConditions()
    {
        $page = $this->findModel('terms-and-conditions');
        if ($page) {
            return $this->render('show-page', [
                'page' => $page
            ]);
        }
        return $this->goHome();
    }
    
    public function actionPrivacyPolicy()
    {
        $page = $this->findModel('privacy-policy');
        if ($page) {
            return $this->render('show-page', [
                'page' => $page
            ]);
        }
        return $this->goHome();
    }
    
    public function actionContract()
    {
        $page = $this->findModel('contract');
        if ($page) {
            return $this->render('show-page', [
                'page' => $page
            ]);
        }
        return $this->goHome();
    }
    
    public function actionContacts()
    {
        $page = $this->findModel('contacts');
        if ($page) {
            return $this->render('show-page', [
                'page' => $page
            ]);
        }
        return $this->goHome();
    }
    
    public function actionAdvantages()
    {
        $page = $this->findModel('advantages');
        if ($page) {
            return $this->render('show-page', [
                'page' => $page
            ]);
        }
        return $this->goHome();
    }
    
    protected function findModel($slug)
    {
        return Page::find()->where(['slug' => $slug, 'visibility' => 1])->one();
    }
}
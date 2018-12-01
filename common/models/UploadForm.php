<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    public $upFile;

    public function rules()
    {
        return [
            [['upFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'json'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'upFile' => 'Файл с данными в формате json'
        ];
    }
}
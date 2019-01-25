<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $mid_name
 * @property string $passport
 * @property string $comment
 * @property string $created_at
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'required'],
            [['comment'], 'string'],
            [['created_at'], 'safe'],
            [['first_name', 'last_name', 'mid_name'], 'string', 'max' => 100],
            [['passport'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'mid_name' => 'Отчество/Второе имя',
            'passport' => 'Паспорт',
            'comment' => 'Комментарий',
            'created_at' => 'Дата добавления',
        ];
    }
    
    public function getFullName()
    {
        return $this->last_name . ', ' . $this->first_name . (!empty($this->mid_name) ? ' ' . $this->mid_name : '');
    }
}

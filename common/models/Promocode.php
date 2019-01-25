<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "promocode".
 *
 * @property int $id
 * @property string $value
 * @property string $created_at
 * @property string $expire_at
 * @property string $used_at
 */
class Promocode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'promocode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'required'],
            [['created_at', 'expire_at', 'used_at'], 'safe'],
            [['value'], 'string', 'min' => 12, 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Промокод',
            'created_at' => 'Дата добавления',
            'expire_at' => 'Дата истечения',
            'used_at' => 'Дата использования',
        ];
    }
}

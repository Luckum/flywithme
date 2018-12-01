<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property string $code
 * @property string $name_en
 * @property string $name_ru
 * @property string $name_fr
 * @property string $name_de
 * @property string $currency
 * @property string $name_translations
 *
 * @property Airport[] $airports
 * @property City[] $cities
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name_en', 'currency', 'name_translations'], 'required'],
            [['name_translations'], 'string'],
            [['code', 'currency'], 'string', 'max' => 3],
            [['name_en', 'name_ru', 'name_fr', 'name_de'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name_en' => 'Name En',
            'name_ru' => 'Name Ru',
            'name_fr' => 'Name Fr',
            'name_de' => 'Name De',
            'currency' => 'Currency',
            'name_translations' => 'Name Translations',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAirports()
    {
        return $this->hasMany(Airport::className(), ['country_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['country_id' => 'id']);
    }
    
    public static function fillFromJson($file)
    {
        if (file_exists($file)) {
            $str = file_get_contents($file);
            $j_values = json_decode($str);
            foreach ($j_values as $val) {
                if (!self::find()->where(['code' => $val->code])->exists()) {
                    $model = new Country();
                    $model->code = $val->code;
                    $model->name_en = $val->name_translations->en;
                    $model->name_ru = isset($val->name_translations->ru) ? $val->name_translations->ru : null;
                    $model->name_fr = isset($val->name_translations->fr) ? $val->name_translations->fr : null;
                    $model->name_de = isset($val->name_translations->de) ? $val->name_translations->de : null;
                    $model->currency = $val->currency;
                    $model->name_translations = json_encode($val->name_translations);
                    
                    $model->save();
                }
            }
            return true;
        }
        return false;
    }
}

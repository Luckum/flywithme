<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property int $country_id
 * @property string $code
 * @property string $name_en
 * @property string $name_ru
 * @property string $name_fr
 * @property string $name_de
 * @property string $coordinates_lon
 * @property string $coordinates_lat
 * @property string $time_zone
 * @property string $name_translations
 *
 * @property Airport[] $airports
 * @property Country $country
 */
class City extends \yii\db\ActiveRecord
{
    public $city_name;
    public $country_name;
    public $airport_name;
    public $airport_code;
    public $city_code;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id', 'code', 'name_en', 'time_zone', 'name_translations'], 'required'],
            [['country_id'], 'integer'],
            [['coordinates_lon', 'coordinates_lat'], 'number'],
            [['name_translations'], 'string'],
            [['code'], 'string', 'max' => 3],
            [['name_en', 'name_ru', 'name_fr', 'name_de'], 'string', 'max' => 255],
            [['time_zone'], 'string', 'max' => 100],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_id' => 'Country ID',
            'code' => 'Code',
            'name_en' => 'Name En',
            'name_ru' => 'Name Ru',
            'name_fr' => 'Name Fr',
            'name_de' => 'Name De',
            'coordinates_lon' => 'Coordinates Lon',
            'coordinates_lat' => 'Coordinates Lat',
            'time_zone' => 'Time Zone',
            'name_translations' => 'Name Translations',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAirports()
    {
        return $this->hasMany(Airport::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }
    
    public static function fillFromJson($file)
    {
        if (file_exists($file)) {
            set_time_limit(10000);
            ini_set('memory_limit', '512M');
            $str = file_get_contents($file);
            $j_values = json_decode($str);
            foreach ($j_values as $val) {
                if (!self::find()->where(['code' => $val->code])->exists()) {
                    $country = Country::find()->where(['code' => $val->country_code])->one();
                    if ($country) {
                        $model = new City();
                        $model->code = $val->code;
                        $model->name_en = $val->name_translations->en;
                        $model->name_ru = isset($val->name_translations->ru) ? $val->name_translations->ru : null;
                        $model->name_fr = isset($val->name_translations->fr) ? $val->name_translations->fr : null;
                        $model->name_de = isset($val->name_translations->de) ? $val->name_translations->de : null;
                        $model->coordinates_lon = isset($val->coordinates->lon) ? $val->coordinates->lon : null;
                        $model->coordinates_lat = isset($val->coordinates->lat) ? $val->coordinates->lat : null;
                        $model->time_zone = $val->time_zone;
                        $model->name_translations = json_encode($val->name_translations);
                        $model->country_id = $country->id;
                        
                        $model->save();
                    }
                }
            }
            ini_set('memory_limit', '128M');
            return true;
        }
        return false;
    }
}

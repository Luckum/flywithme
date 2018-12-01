<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\City;

/**
 * CitySearch represents the model behind the search form of `common\models\City`.
 */
class CitySearch extends City
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id'], 'integer'],
            [['code', 'name_en', 'name_ru', 'name_fr', 'name_de', 'time_zone', 'name_translations'], 'safe'],
            [['coordinates_lon', 'coordinates_lat'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = City::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'country_id' => $this->country_id,
            'coordinates_lon' => $this->coordinates_lon,
            'coordinates_lat' => $this->coordinates_lat,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere(['like', 'name_fr', $this->name_fr])
            ->andFilterWhere(['like', 'name_de', $this->name_de])
            ->andFilterWhere(['like', 'time_zone', $this->time_zone])
            ->andFilterWhere(['like', 'name_translations', $this->name_translations]);

        return $dataProvider;
    }
}

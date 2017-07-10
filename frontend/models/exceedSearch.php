<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\exceed;

/**
 * exceedSearch represents the model behind the search form about `app\models\exceed`.
 */
class exceedSearch extends exceed
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ca_nums', 'valid'], 'integer'],
            [['date', 'city', 'major', 'name'], 'safe'],
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
        $query = exceed::find();

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
            'date' => $this->date,
            'valid' => $this->valid,
        ]);

        $query->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'major', $this->major])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterCompare('ca_nums', '>='.$this->ca_nums);

        return $dataProvider;
    }
}

<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Following;

/**
 * FollowingSearch represents the model behind the search form about `backend\models\Following`.
 */
class FollowingSearch extends Following
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_client', 'edad'], 'integer'],
            [['peso_actual', 'peso_ideal', 'peso_perder', 'por_grasa_actual', 'por_grasa_ideal', 'por_grasa_perder', 'kl_grasa_actual', 'kl_grasa_ideal', 'kl_grasa_perder', 'estatura'], 'number'],
            [['foto', 'observacion', 'fecha'], 'safe'],
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
        $query = Following::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_client' => $this->id_client,
            'peso_actual' => $this->peso_actual,
            'peso_ideal' => $this->peso_ideal,
            'peso_perder' => $this->peso_perder,
            'por_grasa_actual' => $this->por_grasa_actual,
            'por_grasa_ideal' => $this->por_grasa_ideal,
            'por_grasa_perder' => $this->por_grasa_perder,
            'kl_grasa_actual' => $this->kl_grasa_actual,
            'kl_grasa_ideal' => $this->kl_grasa_ideal,
            'kl_grasa_perder' => $this->kl_grasa_perder,
            'estatura' => $this->estatura,
            'edad' => $this->edad,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}

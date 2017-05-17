<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Disipline;

/**
 * DisiplineSearch represents the model behind the search form about `backend\models\Disipline`.
 */
class DisiplineSearch extends Disipline
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ilimitado', 'sabado'], 'integer'],
            [['nombre', 'detalle', 'precio', 'registro', 'estado'], 'safe'],
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
        $query = Disipline::find();

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
            'ilimitado' => $this->ilimitado,
            'sabado' => $this->sabado,
            'registro' => $this->registro,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'detalle', $this->detalle])
            ->andFilterWhere(['like', 'precio', $this->precio])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}

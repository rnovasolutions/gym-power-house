<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Provider;

/**
 * ProviderSearch represents the model behind the search form about `backend\models\Provider`.
 */
class ProviderSearch extends Provider
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'telefono'], 'integer'],
            [['nombre', 'direccion', 'email', 'registro', 'estado'], 'safe'],
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
        $query = Provider::find();

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
            'telefono' => $this->telefono,
            'registro' => $this->registro,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}

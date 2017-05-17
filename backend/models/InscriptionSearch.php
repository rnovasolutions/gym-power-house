<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Inscription;

/**
 * InscriptionSearch represents the model behind the search form about `backend\models\Inscription`.
 */
class InscriptionSearch extends Inscription
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_client', 'id_disipline', 'id_user'], 'integer'],
            [['fecha_inicio', 'fecha_fin', 'detalle', 'registro', 'estado'], 'safe'],
            [['cuenta', 'saldo', 'total'], 'number'],
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
        $query = Inscription::find();

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
            'id_disipline' => $this->id_disipline,
            'id_user' => $this->id_user,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'cuenta' => $this->cuenta,
            'saldo' => $this->saldo,
            'total' => $this->total,
            'registro' => $this->registro,
        ]);

        $query->andFilterWhere(['like', 'detalle', $this->detalle])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}

<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Assistance;

/**
 * AssistanceSearch represents the model behind the search form about `backend\models\Assistance`.
 */
class AssistanceSearch extends Assistance
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_inscription'], 'integer'],
            [['hora', 'fecha'], 'safe'],
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
        $query = Assistance::find();

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
            'id_inscription' => $this->id_inscription,
            'hora' => $this->hora,
            'fecha' => $this->fecha,
        ]);

        return $dataProvider;
    }
}

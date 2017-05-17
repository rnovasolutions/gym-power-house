<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "disipline".
 *
 * @property int $id
 * @property string $nombre
 * @property string $detalle
 * @property int $ilimitado
 * @property int $sabado
 * @property string $precio
 * @property string $registro
 * @property string $estado
 *
 * @property Inscription[] $inscriptions
 * @property Session[] $sessions
 */
class Disipline extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'disipline';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ilimitado', 'sabado'], 'integer'],
            [['registro'], 'safe'],
            [['nombre'], 'string', 'max' => 45],
            [['detalle'], 'string', 'max' => 250],
            [['precio'], 'string', 'max' => 100],
            [['estado'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'detalle' => Yii::t('app', 'Detalle'),
            'ilimitado' => Yii::t('app', 'Ilimitado'),
            'sabado' => Yii::t('app', 'Sabado'),
            'precio' => Yii::t('app', 'Precio'),
            'registro' => Yii::t('app', 'Registro'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscriptions()
    {
        return $this->hasMany(Inscription::className(), ['id_disipline' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSessions()
    {
        return $this->hasMany(Session::className(), ['id_disipline' => 'id']);
    }
}

<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "following".
 *
 * @property int $id
 * @property int $id_client
 * @property string $peso_actual
 * @property string $peso_ideal
 * @property string $peso_perder
 * @property string $por_grasa_actual
 * @property string $por_grasa_ideal
 * @property string $por_grasa_perder
 * @property string $kl_grasa_actual
 * @property string $kl_grasa_ideal
 * @property string $kl_grasa_perder
 * @property string $estatura
 * @property int $edad
 * @property string $foto
 * @property string $observacion
 * @property string $fecha
 *
 * @property Client $client
 */
class Following extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'following';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_client', 'edad'], 'integer'],
            [['peso_actual', 'peso_ideal', 'peso_perder', 'por_grasa_actual', 'por_grasa_ideal', 'por_grasa_perder', 'kl_grasa_actual', 'kl_grasa_ideal', 'kl_grasa_perder', 'estatura'], 'number'],
            [['fecha'], 'safe'],
            [['foto'], 'string', 'max' => 250],
            [['observacion'], 'string', 'max' => 100],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['id_client' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_client' => Yii::t('app', 'Id Client'),
            'peso_actual' => Yii::t('app', 'Peso Actual'),
            'peso_ideal' => Yii::t('app', 'Peso Ideal'),
            'peso_perder' => Yii::t('app', 'Peso Perder'),
            'por_grasa_actual' => Yii::t('app', 'Por Grasa Actual'),
            'por_grasa_ideal' => Yii::t('app', 'Por Grasa Ideal'),
            'por_grasa_perder' => Yii::t('app', 'Por Grasa Perder'),
            'kl_grasa_actual' => Yii::t('app', 'Kl Grasa Actual'),
            'kl_grasa_ideal' => Yii::t('app', 'Kl Grasa Ideal'),
            'kl_grasa_perder' => Yii::t('app', 'Kl Grasa Perder'),
            'estatura' => Yii::t('app', 'Estatura'),
            'edad' => Yii::t('app', 'Edad'),
            'foto' => Yii::t('app', 'Foto'),
            'observacion' => Yii::t('app', 'Observacion'),
            'fecha' => Yii::t('app', 'Fecha'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'id_client']);
    }
}

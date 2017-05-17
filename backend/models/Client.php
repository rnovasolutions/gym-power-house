<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $nombre_completo
 * @property int $ci
 * @property int $celular
 * @property string $email
 * @property string $fecha_nacimiento
 * @property string $foto
 * @property string $registro
 * @property string $estado
 *
 * @property Following[] $followings
 * @property Inscription[] $inscriptions
 * @property Sale[] $sales
 * @property Session[] $sessions
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ci'], 'required'],
            [['ci', 'celular'], 'integer'],
            [['fecha_nacimiento', 'registro'], 'safe'],
            [['nombre_completo', 'email'], 'string', 'max' => 45],
            [['foto'], 'string', 'max' => 250],
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
            'nombre_completo' => Yii::t('app', 'Nombre Completo'),
            'ci' => Yii::t('app', 'Ci'),
            'celular' => Yii::t('app', 'Celular'),
            'email' => Yii::t('app', 'Email'),
            'fecha_nacimiento' => Yii::t('app', 'Fecha Nacimiento'),
            'foto' => Yii::t('app', 'Foto'),
            'registro' => Yii::t('app', 'Registro'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFollowings()
    {
        return $this->hasMany(Following::className(), ['id_client' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscriptions()
    {
        return $this->hasMany(Inscription::className(), ['id_client' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sale::className(), ['id_client' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSessions()
    {
        return $this->hasMany(Session::className(), ['id_client' => 'id']);
    }
}

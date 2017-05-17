<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "inscription".
 *
 * @property int $id
 * @property int $id_client
 * @property int $id_disipline
 * @property int $id_user
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $cuenta
 * @property string $saldo
 * @property string $total
 * @property string $detalle
 * @property string $registro
 * @property string $estado
 *
 * @property Assistance[] $assistances
 * @property Client $client
 * @property Disipline $disipline
 * @property User $user
 */
class Inscription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inscription';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_client', 'id_disipline', 'id_user'], 'integer'],
            [['fecha_inicio', 'fecha_fin', 'registro'], 'safe'],
            [['cuenta', 'saldo', 'total'], 'number'],
            [['detalle'], 'string', 'max' => 100],
            [['estado'], 'string', 'max' => 2],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['id_client' => 'id']],
            [['id_disipline'], 'exist', 'skipOnError' => true, 'targetClass' => Disipline::className(), 'targetAttribute' => ['id_disipline' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
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
            'id_disipline' => Yii::t('app', 'Id Disipline'),
            'id_user' => Yii::t('app', 'Id User'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
            'cuenta' => Yii::t('app', 'Cuenta'),
            'saldo' => Yii::t('app', 'Saldo'),
            'total' => Yii::t('app', 'Total'),
            'detalle' => Yii::t('app', 'Detalle'),
            'registro' => Yii::t('app', 'Registro'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssistances()
    {
        return $this->hasMany(Assistance::className(), ['id_inscription' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'id_client']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisipline()
    {
        return $this->hasOne(Disipline::className(), ['id' => 'id_disipline']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}

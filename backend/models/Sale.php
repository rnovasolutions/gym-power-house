<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sale".
 *
 * @property int $id
 * @property int $id_client
 * @property int $id_user
 * @property string $total
 * @property string $cuenta
 * @property string $saldo
 * @property string $observacion
 * @property string $fecha
 * @property string $hora
 * @property string $estado
 *
 * @property Client $client
 * @property User $user
 * @property SaleDetail[] $saleDetails
 */
class Sale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sale';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_client', 'id_user', 'total', 'cuenta', 'saldo', 'fecha', 'hora'], 'required'],
            [['id_client', 'id_user'], 'integer'],
            [['fecha', 'hora'], 'safe'],
            [['total', 'cuenta', 'saldo'], 'string', 'max' => 45],
            [['observacion'], 'string', 'max' => 250],
            [['estado'], 'string', 'max' => 2],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['id_client' => 'id']],
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
            'id_user' => Yii::t('app', 'Id User'),
            'total' => Yii::t('app', 'Total'),
            'cuenta' => Yii::t('app', 'Cuenta'),
            'saldo' => Yii::t('app', 'Saldo'),
            'observacion' => Yii::t('app', 'Observacion'),
            'fecha' => Yii::t('app', 'Fecha'),
            'hora' => Yii::t('app', 'Hora'),
            'estado' => Yii::t('app', 'Estado'),
        ];
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleDetails()
    {
        return $this->hasMany(SaleDetail::className(), ['id_sale' => 'id']);
    }
}

<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "buy".
 *
 * @property int $id
 * @property int $id_provider
 * @property string $total
 * @property string $cuenta
 * @property string $saldo
 * @property string $fecha
 * @property string $hora
 * @property string $estado
 *
 * @property Provider $provider
 * @property BuyDetail[] $buyDetails
 */
class Buy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_provider'], 'integer'],
            [['total', 'cuenta', 'saldo'], 'number'],
            [['fecha', 'hora'], 'safe'],
            [['estado'], 'string', 'max' => 2],
            [['id_provider'], 'exist', 'skipOnError' => true, 'targetClass' => Provider::className(), 'targetAttribute' => ['id_provider' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_provider' => Yii::t('app', 'Id Provider'),
            'total' => Yii::t('app', 'Total'),
            'cuenta' => Yii::t('app', 'Cuenta'),
            'saldo' => Yii::t('app', 'Saldo'),
            'fecha' => Yii::t('app', 'Fecha'),
            'hora' => Yii::t('app', 'Hora'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvider()
    {
        return $this->hasOne(Provider::className(), ['id' => 'id_provider']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuyDetails()
    {
        return $this->hasMany(BuyDetail::className(), ['id_buy' => 'id']);
    }
}

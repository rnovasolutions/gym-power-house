<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "session".
 *
 * @property int $id
 * @property int $id_client
 * @property int $id_disipline
 * @property int $id_user
 * @property string $fecha
 * @property string $cuenta
 * @property string $estado
 *
 * @property Client $client
 * @property Disipline $disipline
 * @property User $user
 */
class Session extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'session';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_client', 'id_disipline', 'id_user'], 'integer'],
            [['fecha'], 'safe'],
            [['cuenta'], 'number'],
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
            'fecha' => Yii::t('app', 'Fecha'),
            'cuenta' => Yii::t('app', 'Cuenta'),
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

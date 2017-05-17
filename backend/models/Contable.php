<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contable".
 *
 * @property int $id
 * @property int $id_user
 * @property string $fecha
 * @property string $hora
 * @property string $descripcion
 * @property string $debe
 * @property string $haber
 * @property string $saldo
 * @property string $registro
 * @property string $estado
 *
 * @property User $user
 */
class Contable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contable';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user'], 'integer'],
            [['fecha', 'hora', 'debe', 'haber', 'saldo'], 'required'],
            [['fecha', 'hora', 'registro'], 'safe'],
            [['debe', 'haber', 'saldo'], 'number'],
            [['descripcion'], 'string', 'max' => 100],
            [['estado'], 'string', 'max' => 45],
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
            'id_user' => Yii::t('app', 'Id User'),
            'fecha' => Yii::t('app', 'Fecha'),
            'hora' => Yii::t('app', 'Hora'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'debe' => Yii::t('app', 'Debe'),
            'haber' => Yii::t('app', 'Haber'),
            'saldo' => Yii::t('app', 'Saldo'),
            'registro' => Yii::t('app', 'Registro'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}

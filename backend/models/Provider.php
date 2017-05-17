<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "provider".
 *
 * @property int $id
 * @property string $nombre
 * @property int $telefono
 * @property string $direccion
 * @property string $email
 * @property string $registro
 * @property string $estado
 *
 * @property Buy[] $buys
 */
class Provider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['telefono'], 'integer'],
            [['registro'], 'safe'],
            [['nombre', 'direccion', 'email'], 'string', 'max' => 45],
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
            'telefono' => Yii::t('app', 'Telefono'),
            'direccion' => Yii::t('app', 'Direccion'),
            'email' => Yii::t('app', 'Email'),
            'registro' => Yii::t('app', 'Registro'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuys()
    {
        return $this->hasMany(Buy::className(), ['id_provider' => 'id']);
    }
}

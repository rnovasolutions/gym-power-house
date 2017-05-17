<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "assistance".
 *
 * @property int $id
 * @property int $id_inscription
 * @property string $hora
 * @property string $fecha
 *
 * @property Inscription $inscription
 */
class Assistance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'assistance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_inscription'], 'integer'],
            [['hora', 'fecha'], 'safe'],
            [['id_inscription'], 'exist', 'skipOnError' => true, 'targetClass' => Inscription::className(), 'targetAttribute' => ['id_inscription' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_inscription' => Yii::t('app', 'Id Inscription'),
            'hora' => Yii::t('app', 'Hora'),
            'fecha' => Yii::t('app', 'Fecha'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscription()
    {
        return $this->hasOne(Inscription::className(), ['id' => 'id_inscription']);
    }
}

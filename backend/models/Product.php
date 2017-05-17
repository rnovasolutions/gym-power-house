<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property int $stok
 * @property int $stok_minimo
 * @property string $costo
 * @property string $precio_unitario
 * @property string $registro
 * @property string $estado
 *
 * @property BuyDetail[] $buyDetails
 * @property SaleDetail[] $saleDetails
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stok', 'stok_minimo'], 'integer'],
            [['costo', 'precio_unitario'], 'number'],
            [['registro'], 'safe'],
            [['nombre'], 'string', 'max' => 45],
            [['descripcion'], 'string', 'max' => 100],
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
            'descripcion' => Yii::t('app', 'Descripcion'),
            'stok' => Yii::t('app', 'Stok'),
            'stok_minimo' => Yii::t('app', 'Stok Minimo'),
            'costo' => Yii::t('app', 'Costo'),
            'precio_unitario' => Yii::t('app', 'Precio Unitario'),
            'registro' => Yii::t('app', 'Registro'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuyDetails()
    {
        return $this->hasMany(BuyDetail::className(), ['id_product' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaleDetails()
    {
        return $this->hasMany(SaleDetail::className(), ['id_product' => 'id']);
    }
}

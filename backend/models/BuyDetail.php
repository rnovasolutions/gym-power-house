<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "buy_detail".
 *
 * @property int $id
 * @property int $id_buy
 * @property int $id_product
 * @property int $cantidad
 * @property string $total
 * @property string $cuenta
 * @property string $saldo
 *
 * @property Buy $buy
 * @property Product $product
 */
class BuyDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buy_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_buy', 'id_product', 'cantidad'], 'integer'],
            [['total', 'cuenta', 'saldo'], 'number'],
            [['id_buy'], 'exist', 'skipOnError' => true, 'targetClass' => Buy::className(), 'targetAttribute' => ['id_buy' => 'id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_buy' => Yii::t('app', 'Id Buy'),
            'id_product' => Yii::t('app', 'Id Product'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'total' => Yii::t('app', 'Total'),
            'cuenta' => Yii::t('app', 'Cuenta'),
            'saldo' => Yii::t('app', 'Saldo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuy()
    {
        return $this->hasOne(Buy::className(), ['id' => 'id_buy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'id_product']);
    }
}

<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sale_detail".
 *
 * @property int $id
 * @property int $id_sale
 * @property int $id_product
 * @property int $cantidad
 * @property string $total
 *
 * @property Product $product
 * @property Sale $sale
 */
class SaleDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sale_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sale', 'id_product', 'cantidad'], 'integer'],
            [['total'], 'number'],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'id']],
            [['id_sale'], 'exist', 'skipOnError' => true, 'targetClass' => Sale::className(), 'targetAttribute' => ['id_sale' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_sale' => Yii::t('app', 'Id Sale'),
            'id_product' => Yii::t('app', 'Id Product'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'total' => Yii::t('app', 'Total'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'id_product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSale()
    {
        return $this->hasOne(Sale::className(), ['id' => 'id_sale']);
    }
}

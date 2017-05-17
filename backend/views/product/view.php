<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
?>
<div class="product-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'descripcion',
            'stok',
            'stok_minimo',
            'costo',
            'precio_unitario',
            'registro',
            'estado',
        ],
    ]) ?>

</div>

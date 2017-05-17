<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Disipline */
?>
<div class="disipline-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'detalle',
            'ilimitado',
            'sabado',
            'precio',
            'registro',
            'estado',
        ],
    ]) ?>

</div>

<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Provider */
?>
<div class="provider-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'telefono',
            'direccion',
            'email:email',
            'registro',
            'estado',
        ],
    ]) ?>

</div>

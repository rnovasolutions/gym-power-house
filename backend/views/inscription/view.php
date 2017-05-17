<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Inscription */
?>
<div class="inscription-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_client',
            'id_disipline',
            'id_user',
            'fecha_inicio',
            'fecha_fin',
            'cuenta',
            'saldo',
            'total',
            'detalle',
            'registro',
            'estado',
        ],
    ]) ?>

</div>

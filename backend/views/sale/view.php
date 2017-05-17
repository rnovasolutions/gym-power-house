<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Sale */
?>
<div class="sale-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_client',
            'id_user',
            'total',
            'cuenta',
            'saldo',
            'observacion',
            'fecha',
            'hora',
            'estado',
        ],
    ]) ?>

</div>

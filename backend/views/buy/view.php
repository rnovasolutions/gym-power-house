<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Buy */
?>
<div class="buy-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_provider',
            'total',
            'cuenta',
            'saldo',
            'fecha',
            'hora',
            'estado',
        ],
    ]) ?>

</div>

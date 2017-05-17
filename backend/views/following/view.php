<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Following */
?>
<div class="following-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_client',
            'peso_actual',
            'peso_ideal',
            'peso_perder',
            'por_grasa_actual',
            'por_grasa_ideal',
            'por_grasa_perder',
            'kl_grasa_actual',
            'kl_grasa_ideal',
            'kl_grasa_perder',
            'estatura',
            'edad',
            'foto',
            'observacion',
            'fecha',
        ],
    ]) ?>

</div>

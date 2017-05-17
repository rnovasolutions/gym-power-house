<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Client */
?>
<div class="client-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre_completo',
            'ci',
            'celular',
            'email:email',
            'fecha_nacimiento',
            'foto',
            'registro',
            'estado',
        ],
    ]) ?>

</div>

<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Assistance */
?>
<div class="assistance-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_inscription',
            'hora',
            'fecha',
        ],
    ]) ?>

</div>

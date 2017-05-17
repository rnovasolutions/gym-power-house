<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\News */
?>
<div class="news-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_user',
            'descripcion',
            'foto',
            'registro',
        ],
    ]) ?>

</div>

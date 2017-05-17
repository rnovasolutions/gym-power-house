<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Following */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="following-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_client')->textInput() ?>

    <?= $form->field($model, 'peso_actual')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'peso_ideal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'peso_perder')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'por_grasa_actual')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'por_grasa_ideal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'por_grasa_perder')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kl_grasa_actual')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kl_grasa_ideal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kl_grasa_perder')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estatura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edad')->textInput() ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Encuesta */
/* @var $modelPreg app\models\Pregunta */
/* @var $model2 app\models\RespuestaTipo */
/* @var $form yii\widgets\ActiveForm */


?>

<div class='encuesta-form'>
	<?php $form=ActiveForm::begin([
            	    'method'=>'post',
            	    'action'=>['encuesta/crear'],
            	])?>
            	
	<?= $form->field($model, 'encTitulo')->textInput(['maxlength'=>true])->label('Titulo de la encuesta:')?>
	<?= $form->field($model, 'encDescripcion')->textInput(['maxlength'=>true])->label('Descripcion de la encuesta:')?>
	
	<div class='form-group'>
		<?= Html::button('Agregar Pregunta',['class'=>'btn btn-primary', 'id'=>'btn-agregar']); ?>
	</div>
	<div class='container' id='pregunta'>
		<?= $form->field($model2, 'respTipoDescripcion')->dropDownList($model2->respTipoDescripcion)?>
	
	</div>
	
	
	
	<div class='form-group'>
		<?= Html::submitButton('crear', ['class'=>'btn btn-primary'])?>
	</div>
	<?php ActiveForm::end()?>
</div>
<?php 
$this->registerJs("
$(document).ready(function(){
    $('#btn-agregar').on('click', function(){
        alert('entra');
        
    });
});
", View::POS_READY);

?>
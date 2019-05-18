<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\ArrayHelper;
use app\models\RespuestaTipo;

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
	                'options'=>['class'=>'form form-horizontal'],
            	])?>
            	
	<?= $form->field($model, 'encTitulo')->textInput(['maxlength'=>true])->label('Titulo de la encuesta:')?>
	<?= $form->field($model, 'encDescripcion')->textInput(['maxlength'=>true])->label('Descripcion de la encuesta:')?>
	
	<div class='form-group'>
		<?= Html::button('Agregar Pregunta',['class'=>'btn btn-primary', 'id'=>'btn-agregar']); ?>
	</div>
	<div class='container-fluent' id='preguntas'>
    	<?php $items = ArrayHelper::map(RespuestaTipo::find()->all(), 'idRespTipo', 'respTipoDescripcion');?>
    	<div class='form-group'>
    		<?= Html::dropDownList('idRespTipo', '', $items, [
    		                      'class'=>'form-control', 
    		                      'prompt'=>'Selecciona tipo de respuesta',
    		                      'style'=>[
    		                          'max-width'=>'30%',
    		                          'margin-left'=>'auto',
    		                       ]
    		      ]);
    		?>
    	</div>
	</div>
	<div id='prueba'></div>
	
	
	<div class='form-group'>
		<?= Html::submitButton('Guardar', ['class'=>'btn btn-primary'])?>
	</div>
	<?php ActiveForm::end()?>
</div>
<?php 
$this->registerJs("
$(document).ready(function(){
    $('#btn-agregar').on('click', function(){
        
        var x=new XMLHttpRequest();
    	x.onreadystatechange = function(){
    		if( this.readyState == 4 && this.status == 200){
    	        resp=JSON.parse(this.responseText);
    			$('#prueba').html(resp);
    		}
    	};
    	x.open('POST', '/encuesta/views/Encuesta/pregunta.php', true);
    	x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    	x.send();
        
    });
});
", View::POS_READY);

?>
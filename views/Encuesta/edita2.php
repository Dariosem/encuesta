<?php


/* En esta vista se genera la edicion de la encuesta. inicialmente presenta la opcion de ingreso del titulo y una descripcion
 * y luego se pueden agregar las preguntas y el tipo de respuesta que tendra esa pregunta
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\ArrayHelper;
use app\assets\AppAsset;
use app\controllers\RespuestaTipoController;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Encuesta */
/* @var $model2 app\models\Pregunta */
/* @var $form yii\widgets\ActiveForm */

$opciones=ArrayHelper::map(RespuestaTipoController::listaTipos(), 'idRespTipo', 'respTipoDescripcion');

?>

<div class='encuesta-form' id='form'>
	<?php $form=ActiveForm::begin([
            	    'method'=>'post',
            	    'action'=>['encuesta/crear'],
	                'options'=>['class'=>'form form-horizontal'],
            	])?>
      	
  
	<?= $form->field($model, 'encTitulo')->textInput(['maxlength'=>true])->label('Titulo de la encuesta:')?>
	<?= $form->field($model, 'encDescripcion')->textInput(['maxlength'=>true])->label('Descripcion de la encuesta:')?>
	
	
	<span id='preg' hidden=true>0</span>

	<div id='input1' class='clonedInput inline '>
		<div class='row' id='row1'>
    		<div class='col-sm-8' id='col1'>
    			
    			<?= $form->field($model2, 'pregDescripcion')->textInput(['maxlength'=>true])->label('Pregunta:')?>
    		</div>
    		<div class='col-sm-3 col-sm-offset-1' id='col2'>

    			<?= $form->field($model2, 'idRespTipo')->dropDownList($opciones)->label('Tipo de respuesta: ');
    			?>
    		</div>
		</div>
	</div>
	<div class='button-group'>
    	<div class='col-sm-2'>
    		<?= Html::button('Agregar Pregunta',['class'=>'btn btn-primary', 'id'=>'btnAdd']);//cambie nombre ?>
    	</div>
    	<div class='col-sm-offset-4 col-sm-2'>
    		<?= Html::submitButton('Guardar', ['class'=>'btn btn-primary']) //este boton guarda todos los datos de la encuesta?>
    	</div>
    	<div class=' col-sm-2'>
    		<?= Html::resetButton('Borrar', ['class'=>'btn btn-secondary']) //este boton guarda todos los datos de la encuesta?>
    	</div>
    	<div class=' col-sm-2'>
    		<?= Html::a('Cancelar', Url::toRoute('site/index') ,['class'=>'btn btn-info']) //este boton guarda todos los datos de la encuesta?>
    	</div>
	</div>
	<?php ActiveForm::end()?>
</div>
<?php 
AppAsset::register($this); //agrega el script JS que se quiere usar. Antes lo especifique en la clase AppAsset

?>
<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $model app\models\Encuesta */
/* @var $model2 app\models\Encuesta*/
/* @var $uno app\models\Encuesta*/

?>
<h1>Encuesta cargada</h1>
<h2>Titulo: <?= Html::encode($model->encTitulo) ?></h2>
<h3>Comentario: <?= Html::encode($model->encDescripcion)?></h3>
<h3><?= Html::encode($model2->pregDescripcion)?></h3>
<hr>
<h3>Modal:</h3>
<p><?php print_r($model);?></p>
<hr>
<h3>Modal2:</h3>
<p><?php print_r($model2);?></p>
<hr>
<h3>Uno:</h3>
<p><?php print_r($uno);?></p>
<hr>
<div class=' col-sm-2 col-sm-offset-5'>
    		<?= Html::a('Volver', Url::toRoute('encuesta/crear') ,['class'=>'btn btn-lg btn-info']) //este boton guarda todos los datos de la encuesta?>
    	</div>
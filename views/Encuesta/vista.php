<?php

use yii\helpers\Html;


/* @var $model app\models\Encuesta */
/* @var $model2 app\models\Encuesta*/

?>
<h1>Encuesta cargada</h1>
<h2>Titulo: <?= Html::encode($model->encTitulo) ?></h2>
<h3>Comentario: <?= Html::encode($model->encDescripcion)?></h3>
<h3><?= Html::encode($model2->pregDescripcion)?></h3>

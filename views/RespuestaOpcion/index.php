<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RespuestaOpcionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Respuesta Opcions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="respuesta-opcion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Respuesta Opcion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idRespuestaOpcion',
            'opRespvalor',
            'idPregunta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

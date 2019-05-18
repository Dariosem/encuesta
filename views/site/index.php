<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
          <?= Html::a('Entrar',Url::toRoute('encuesta/crear'), ['class'=>'btn btn-lg btn-primary'])?>
    </div>

    <div class="body-content">

      

    </div>
</div>

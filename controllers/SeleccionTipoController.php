<?php

namespace app\controllers;

use yii;
use yii\web\Controller;
use app\models\RespuestaTipoSearch;


class SeleccionTipoController extends Controller{
    
    public function actionGeneraOpcion($idRespTipo) {
        $objTipo=new RespuestaTipoSearch();
        $tipo=$objTipo->findOne($idRespTipo);
        echo json_encode($tipo);
    }
}
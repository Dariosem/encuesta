<?php
use app\controllers\RespuestaTipoController;

$resp=null;

if(isset($_REQUEST['idRespTipo'])){
    $idRespTipo=$_REQUEST['idRespTipo'];
}

$tipos=new RespuestaTipoController($idRespTipo, null);
$tipo=$tipos->listaTipos($idRespTipo);
//$tipo=$tipos->find()->where('idRespTipo ='.$idRespTipo)->one();

//$tipo=RespuestaTipoController::listaTipos($idRespTipo);

echo json_encode($tipo);

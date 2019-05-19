<?php
//use app\controllers\RespuestaTipoController;
//use yii\helpers\ArrayHelper;

$resp="";

if(isset($_REQUEST['idRespTipo'])){
    $idRespTipo=$_REQUEST['idRespTipo'];
}
//$tipo=RespuestaTipoController::listaTipos($idRespTipo);
//$tipo=ArrayHelper::map(RespuestaTipoController::listaTipos($idRespTipo), 'idRespTipo', 'respTipoDescripcion');
$tipo=[1=>'Texto', 2=>'Dropdown', 3=>'Checkbox', 4=>'Radio'];

if($idRespTipo==1){
    $resp="Texto";
}elseif ($idRespTipo==2){
    
}
//print_r($tipo);
echo json_encode($tipo);
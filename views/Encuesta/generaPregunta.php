<?php

use app\controllers\RespuestaTipoController;


(isset($_REQUEST['idPreguna']))?$idPregunta=$_REQUEST['idPregunta']:$idPregunta=0;
$idPregunta++;

//$opciones=RespuestaTipoController::listaTipos();
$opciones=[1=>'text', 2=>'dropdrown', 3=>'checkbox'];
$pregunta="";
$pregunta.="<div class='form-group'>";
$pregunta.="<label for='pregunta $idPregunta'>Pregunta: </label>";
$pregunta.="<input type='text' id='pregunta $idPregunta' name='pregunta $idPregunta' placeholder='Ingresa la pregunta' autofocus>";
$pregunta.="</div>";
$pregunta.="<div class='form-group'>";
$pregunta.="<label for='pregunta $idPregunta'>Tipo de Respuesta: </label>";
$pregunta.="<select id='idRespTipo' name='idRespTipo'><option>Seleccionar...</option>";
foreach ($opciones as $clave=>$valor){
    $pregunta.="<option value=$clave >$valor</option>";
}
$pregunta.="</select>";
$pregunta.="</div>";

$respuesta=[$pregunta, $idPregunta];

echo json_encode($respuesta);

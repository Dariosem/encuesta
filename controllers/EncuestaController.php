<?php

namespace app\controllers;

use app\models\Encuesta;
use app\models\Pregunta;
use app\models\RespuestaTipo;
use yii;

class EncuestaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionCrear()
    {
        $model=new Encuesta();
        $modelPreg=new Pregunta();
        $respTipo=new RespuestaTipo();
        $model2=$respTipo->find()->orderby('respTipoDescripcion')->all();
        
        if ($model->load(Yii::$app->request->post()) && $model->save() && $modelPreg->load(yii::$app->request->post()) && $modelPreg->save()) {

            return $this->render('vista', ['model'=>$model, 'modelPreg'=>$modelPreg]);
        }
        
        return $this->render('edita', ['model'=>$model, 'model2'=>$model2]);
    }

}

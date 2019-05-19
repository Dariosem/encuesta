<?php

namespace app\controllers;

use yii;
use app\models\Encuesta;
use app\models\Pregunta;


class EncuestaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    

    public function actionCrear()
    {
        $model=new Encuesta();
        $model2=new Pregunta();
        
               
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $model2->idEncuesta=$model->idEncuesta;
                if($model2->load(Yii::$app->request->post()) && $model2->save()){
                    return $this->render('vista', ['model'=>$model, 'model2'=>$model2]);
                }
        }
        
        return $this->render('edita', ['model'=>$model, 'model2'=>$model2]);
    }

}

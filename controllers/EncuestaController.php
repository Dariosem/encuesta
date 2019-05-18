<?php

namespace app\controllers;

use app\models\Encuesta;
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
               
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->render('vista', ['model'=>$model]);
        }
        
    
        return $this->render('edita', ['model'=>$model]);
    }

}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "respuesta".
 *
 * @property int $idRespuesta
 * @property string $respValor
 * @property int $idPregunta
 *
 * @property Pregunta $pregunta
 */
class Respuesta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'respuesta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['respValor', 'idPregunta'], 'required'],
            [['idPregunta'], 'integer'],
            [['respValor'], 'string', 'max' => 250],
            [['idPregunta'], 'exist', 'skipOnError' => true, 'targetClass' => Pregunta::className(), 'targetAttribute' => ['idPregunta' => 'idPregunta']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idRespuesta' => 'Id Respuesta',
            'respValor' => 'Resp Valor',
            'idPregunta' => 'Id Pregunta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPregunta()
    {
        return $this->hasOne(Pregunta::className(), ['idPregunta' => 'idPregunta']);
    }
}

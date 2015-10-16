<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asistencia".
 *
 * @property integer $id_asistencia
 * @property string $fecha
 * @property string $rut_parvulo
 *
 * @property Parvulo $rutParvulo
 */
class Asistencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asistencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_asistencia', 'rut_parvulo'], 'required'],
            [['id_asistencia'], 'integer'],
            [['fecha'], 'safe'],
            [['rut_parvulo'], 'string', 'max' => 8]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_asistencia' => 'Id Asistencia',
            'fecha' => 'Fecha',
            'rut_parvulo' => 'Rut Parvulo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutParvulo()
    {
        return $this->hasOne(Parvulo::className(), ['rut_parvulo' => 'rut_parvulo']);
    }
}

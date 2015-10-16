<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hito".
 *
 * @property integer $id_hito
 * @property string $descripcion
 * @property string $fecha
 * @property string $rut_parvulo
 */
class Hito extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hito';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'rut_parvulo'], 'required'],
            [['fecha'], 'safe'],
            [['descripcion'], 'string', 'max' => 500],
            [['rut_parvulo'], 'string', 'max' => 8]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_hito' => 'Id Hito',
            'descripcion' => 'Descripcion',
            'fecha' => 'Fecha',
            'rut_parvulo' => 'Rut Parvulo',
        ];
    }
}

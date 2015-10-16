<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imprevisto".
 *
 * @property integer $id_imprevisto
 * @property string $descripcion
 * @property string $fecha
 * @property string $rut_parvulo
 *
 * @property Parvulo $rutParvulo
 */
class Imprevisto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'imprevisto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_imprevisto', 'rut_parvulo'], 'required'],
            [['id_imprevisto'], 'integer'],
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
            'id_imprevisto' => 'Id Imprevisto',
            'descripcion' => 'Descripcion',
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

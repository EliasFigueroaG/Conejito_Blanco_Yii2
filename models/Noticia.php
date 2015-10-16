<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "noticia".
 *
 * @property integer $id_noticia
 * @property string $titulo
 * @property string $descripcion
 * @property integer $importante
 * @property string $fecha
 */
class Noticia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noticia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'descripcion', 'importante'], 'required'],
            [['importante'], 'integer'],
            [['fecha'], 'safe'],
            [['titulo'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_noticia' => 'Id Noticia',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'importante' => 'Importante',
            'fecha' => 'Fecha',
        ];
    }
}

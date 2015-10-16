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
<<<<<<< HEAD
 *
 * @property Parvulo $rutParvulo
=======
>>>>>>> refs/remotes/EliasFigueroaG/master
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
<<<<<<< HEAD
            [['id_hito', 'rut_parvulo'], 'required'],
            [['id_hito'], 'integer'],
=======
            [['descripcion', 'rut_parvulo'], 'required'],
>>>>>>> refs/remotes/EliasFigueroaG/master
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
<<<<<<< HEAD

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutParvulo()
    {
        return $this->hasOne(Parvulo::className(), ['rut_parvulo' => 'rut_parvulo']);
    }
=======
>>>>>>> refs/remotes/EliasFigueroaG/master
}

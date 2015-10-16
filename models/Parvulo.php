<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Parvulo extends ActiveRecord
{
    public static function getDb() {  //método estatico para incluir la base de datos jardin
        
        return Yii::$app->db;
    }
    
    public static function tableName() {
        
        return 'parvulo';
    }
    
    
    
    
}


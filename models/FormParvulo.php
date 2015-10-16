<?php

namespace app\models;
use Yii;
use yii\base\model;

class FormParvulo extends model{

public $rut_parvulo;
public $password;
public $email;
public $fecha_nacimiento;
public $talla;
public $peso;

public function rules()
 {
  return [
 
   ['rut_parvulo', 'required', 'message' => 'Campo requerido'],
   ['rut_parvulo', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan números y letras'],
   ['password', 'required', 'message' => 'Campo requerido'],
   ['password', 'match', 'pattern' => '/^.{5,45}$/', 'message' => 'Mínimo 5 máximo 45 caracteres'],
   ['email','required','message' =>'Campo requerido'],  
   ['email','match', 'pattern' => "/^.{5,80}$/",'message'=> 'Mínimo 5 y máximo 80 caracteres'],
   ['email','email','message' =>'Formato no válido '],
   ['fecha_nacimiento', 'integer', 'message' => 'Sólo números enteros'],
   ['talla', 'integer', 'message' => 'Sólo números enteros'],
   ['peso', 'integer', 'message' => 'Campo requerido'],
   
  ];
 }
 
}


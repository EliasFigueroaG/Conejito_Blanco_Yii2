<?php

//la vista del update
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<a href="<?= Url::toRoute("site/view") ?>">Ir a la lista de Parvulos</a>

<h1>Editar Parvulo con rut <?= Html::encode($_GET["rut_parvulo"]) ?></h1>

<h3><?= $msg ?></h3>


<?php $form = ActiveForm::begin([   //formulario activo
    "method" => "post",
    'enableClientValidation' => true,
]);
?>

<?= $form->field($model, "rut_parvulo")->input("hidden")->label(false) ?>

<div class="form-group">
 <?= $form->field($model, "password")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "email")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "fecha_nacimiento")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "talla")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "peso")->input("text") ?>   
</div>

<?= Html::submitButton("Actualizar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>

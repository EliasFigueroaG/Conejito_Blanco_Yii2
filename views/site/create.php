<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>

<a href="<?= Url::toRoute("site/view")?> ">Ir a la lista de Parvulos</a>



<h1>Crear Parvulo</h1>
<h3><?= $msg ?></h3>
<?php $form = ActiveForm::begin([
    "method" => "post",
    'enableClientValidation' => true,
]);
?>
<div class="form-group">
 <?= $form->field($model, "rut_parvulo")->input("text") ?>   
</div>

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

<?= Html::submitButton("Crear", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>


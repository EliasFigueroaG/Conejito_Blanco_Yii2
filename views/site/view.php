<?php
use yii\helpers\Url;
use yii\helpers\Html; //construir contenido htlm
use yii\widgets\ActiveForm; //activar un formulario activo
?>

<a href="<?= Url::toRoute("site/create") ?>">Crear un nuevo Parvulo<a>

<?php $f = ActiveForm::begin([
        "method" => "get",
        "action" => Url::toRoute("site/view"),
        "enableClientValidation" => true,    
]);
?>

<div class ="form-group">
    <?= $f ->field($form,"q")->input("search")?>
</div>

<?= Html::submitButton("Buscar", ["class"=> "btn btn-primary"]) ?>
        
<?php $f->end() ?>

<h3><?= $search ?></h3>        
        
        
<h3>Lista de Parvulos</h3>
<table class="table table-boardered">
    <tr>    
        <th>rut_parvulo</th>
        <th>pasword</th>
        <th>email</th>
        <th>fecha_nacimiento</th>
        <th>talla</th>
        <th>peso</th>
    </tr>       
    
    <?php foreach($model as $row):?>
    <tr>
        <td><?= $row->rut_parvulo ?></td>
        <td><?= $row->password ?></td>
        <td><?= $row->email ?></td>
        <td><?= $row->fecha_nacimiento ?></td>
        <td><?= $row->talla ?></td>
        <td><?= $row->peso ?></td>
        <td><a href="<?= Url::toRoute(["site/update", "rut_parvulo" => $row->rut_parvulo])?>">Editar</a></td>
        
        <td>
            
            <a href="#" data-toggle="modal" data-target="#rut_parvulo_<?= $row->rut_parvulo ?>">Eliminar</a>
            <div class="modal fade" role="dialog" aria-hidden="true" id="rut_parvulo_<?= $row->rut_parvulo ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Eliminar Parvulo</h4>
                            </div>
                            <div class="modal-body">
                                <p>¿Realmente deseas eliminar al Parvulo con rut <?= $row->rut_parvulo ?>?</p>
                            </div>
                            <div class="modal-footer">
                            <?= Html::beginForm(Url::toRoute("site/delete"), "POST") ?>
                            <input type="hidden" name="rut_parvulo" value="<?= $row->rut_parvulo ?>">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Eliminar</button>
                            <?= Html::endForm() ?>
                            </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </td>
    </tr>
    <?php endforeach ?>
</table>

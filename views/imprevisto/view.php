<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Imprevisto */

$this->title = $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Imprevistos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imprevisto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_imprevisto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_imprevisto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_imprevisto',
            'descripcion',
            'fecha',
            'rut_parvulo',
        ],
    ]) ?>

</div>

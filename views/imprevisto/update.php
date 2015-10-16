<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Imprevisto */

$this->title = 'Update Imprevisto: ' . ' ' . $model->id_imprevisto;
$this->params['breadcrumbs'][] = ['label' => 'Imprevistos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_imprevisto, 'url' => ['view', 'id' => $model->id_imprevisto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="imprevisto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

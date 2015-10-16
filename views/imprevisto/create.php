<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Imprevisto */

$this->title = 'Create Imprevisto';
$this->params['breadcrumbs'][] = ['label' => 'Imprevistos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imprevisto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

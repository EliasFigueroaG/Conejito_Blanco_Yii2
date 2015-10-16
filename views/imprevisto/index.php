<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ImprevistoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Imprevistos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imprevisto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Imprevisto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_imprevisto',
            'descripcion',
            'fecha',
            'rut_parvulo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

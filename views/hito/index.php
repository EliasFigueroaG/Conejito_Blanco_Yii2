<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HitoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hitos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hito-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hito', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_hito',
            'descripcion',
            'fecha',
            'rut_parvulo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

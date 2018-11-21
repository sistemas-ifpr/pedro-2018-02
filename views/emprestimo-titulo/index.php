<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmprestimoTituloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emprestimo Titulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emprestimo-titulo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Emprestimo Titulo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'emprestimo_id',
            'titulo_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

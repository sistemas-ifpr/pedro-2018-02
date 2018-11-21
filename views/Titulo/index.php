<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TituloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Titulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titulo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Titulo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'titulo',
            [   
                'attribute' => 'artista_id',
                'value' => 'artista.nome'
            ],
            'descricao',
            'ano_lancamento',
            'quantidade',
            'quantidade_disponivel',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

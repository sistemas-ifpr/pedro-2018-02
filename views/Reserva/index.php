<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReservaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reservas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserva-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nova reserva', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'id',
            [   
                'attribute' => 'cliente_id',
                'value' => 'cliente.nome'
            ],
            [   
                'attribute' => 'funcionario_id',
                'value' => 'funcionario.nome'
            ],
            [   
                'attribute' => 'titulo_id',
                'value' => 'titulo.titulo'
            ],
            'data_reserva',
            'data_baixa',
            'situacao',
            
            

            ['class' => 'yii\grid\ActionColumn'],
            
        ],
    ]); ?>
</div>

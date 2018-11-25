<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Reserva */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserva-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>
        <?php
        if ($model->situacao == 'ativa'){
           ?>
            <?=
                Html::a('Encerrar reserva', ['cancelar', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Tem certeza que deseja cancelar?',
                    'method' => 'post',
                ],
                ]);
            ?>
        <?php } ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'Cliente',
                'value' => function ($model) {
                    return $model->cliente->nome;
                }
            ],
            [
                'attribute' => 'Funcionario',
                'value' => function ($model) {
                    return $model->funcionario->nome;
                }
            ],
            [
                'attribute' => 'Cliente',
                'value' => function ($model) {
                    return $model->titulo->titulo;
                }
            ],
            
            'data_reserva',
            'data_baixa',
            'situacao',
            
        ],
    ]) ?>

</div>

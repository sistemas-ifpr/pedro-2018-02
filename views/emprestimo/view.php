<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Emprestimo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Emprestimos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emprestimo-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>
        
        <?= Yii::$app->session->getFlash('msg') ?>
        
        <?php
        if ($model->situacao == '1'){
           ?>
            <?=
                Html::a('Devolver', ['devolver', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Tem certeza que deseja devolver?',
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
                'attribute' => 'Funcionário',
                'value' => function ($model) {
                    return $model->funcionario->nome;
                }
            ],
            'data_emprestimo',
            'data_devolucao',
            'valor',
                    
            [
                'attribute' => 'Situação',
                'value' => function($model){
                         if($model->situacao == '1'){
                            return 'Emprestado';
                         } else {
                             return 'Devolvido';
                         }
                       }
            ],
                    
            [   
                'attribute' => 'TITULO ID',
                'value' => function ($model)
            {
                return implode(', ', $model->getTitulos()->select('titulo')->column());
            }
            ]
            //'emprestimoTitulos.titulo'     
        ],
    ]) ?>
    
    
    
</div>

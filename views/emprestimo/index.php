<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmprestimoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empréstimos';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="emprestimo-index">
    
    <?= Yii::$app->session->getFlash('msg') ?>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Novo Empréstimo', ['create'], ['class' => 'btn btn-success']) ?>
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
            'data_emprestimo',
            'data_devolucao',
            'valor',
            [
                'attribute' => 'situacao',
                'value' => function($model){
                         if($model->situacao == '1'){
                            return 'Emprestado';
                         } else {
                             return 'Devolvido';
                         }
                       }
            ],
            
            [
                'attribute' => 'Titulos',
                'value' => function($model) 
                {
                    return implode(', ', $model->getTitulos()->select('titulo')->column());
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
                    
    ]); ?>
</div>

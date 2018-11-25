<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'cpf',
            'telefone',
            'celular',
            'endereco',
            'data_nascimento',
            'bonus',
        ],
    ]) ?>

    
    <h2><br>Seus Empréstimos:<br><br></h2>
    
    <?php Pjax::begin(); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            
            [
                'attribute' => 'funcionario_id',
                'value' => 'funcionario.nome'
            ],
            'data_emprestimo',
            'data_devolucao',
            'valor',
            'situacao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
                    
    ]); ?>
    
    <?php Pjax::end(); ?>
</div>
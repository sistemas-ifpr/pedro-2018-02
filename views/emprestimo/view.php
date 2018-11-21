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
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'situacao',
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

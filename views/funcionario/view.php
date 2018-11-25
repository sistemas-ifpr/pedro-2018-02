<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Funcionario */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Funcionários', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'data_admissao',
            'data_demissao',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EmprestimoTitulo */

$this->title = 'Create Emprestimo Titulo';
$this->params['breadcrumbs'][] = ['label' => 'Emprestimo Titulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emprestimo-titulo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

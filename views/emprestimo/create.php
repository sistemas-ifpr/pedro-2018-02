<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Emprestimo */

$this->title = 'Create Emprestimo';
$this->params['breadcrumbs'][] = ['label' => 'Emprestimos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emprestimo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

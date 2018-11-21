<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TituloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="titulo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'artista_id') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'ano_lancamento') ?>

    <?php // echo $form->field($model, 'quantidade') ?>

    <?php // echo $form->field($model, 'quantidade_disponivel') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

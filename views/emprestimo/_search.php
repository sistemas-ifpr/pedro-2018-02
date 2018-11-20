<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmprestimoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emprestimo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cliente_id') ?>

    <?= $form->field($model, 'funcionario_id') ?>

    <?= $form->field($model, 'data_emprestimo') ?>

    <?= $form->field($model, 'data_devolucao') ?>

    <?php // echo $form->field($model, 'valor') ?>

    <?php // echo $form->field($model, 'situacao') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

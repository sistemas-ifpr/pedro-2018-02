<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReservaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserva-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cliente_id') ?>

    <?= $form->field($model, 'funcionario_id') ?>

    <?= $form->field($model, 'titulo_id') ?>

    <?= $form->field($model, 'data_reserva') ?>

    <?php // echo $form->field($model, 'data_baixa') ?>

    <?php // echo $form->field($model, 'situação') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

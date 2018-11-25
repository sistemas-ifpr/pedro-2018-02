<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Cliente;
use app\models\Funcionario;
use app\models\Titulo;

/* @var $this yii\web\View */
/* @var $model app\models\Reserva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reserva-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'cliente_id')
        ->dropDownList(
            ArrayHelper::map(Cliente::find()->all(), 'id', 'nome'),           // Flat array ('id'=>'label')
            ['prompt'=>'Selecione...']    // options
        )

    //<?= $form->field($model, 'cliente_id')->textInput() ?>
    
    <?= $form->field($model, 'funcionario_id')
        ->dropDownList(
            ArrayHelper::map(Funcionario::find()->all(), 'id', 'nome'),           // Flat array ('id'=>'label')
            ['prompt'=>'Selecione...']    // options
        )

    //<?= $form->field($model, 'funcionario_id')->textInput() ?>

    <?= $form->field($model, 'titulo_id')
        ->dropDownList(
            ArrayHelper::map(Titulo::find()->all(), 'id', 'titulo'),           // Flat array ('id'=>'label')
            ['prompt'=>'Selecione...']    // options
        )

    //<?= $form->field($model, 'titulo_id')->textInput() ?>

    <?= $form->field($model, 'data_reserva')->textInput() ?>

    <?= $form->field($model, 'data_baixa')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('OK', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

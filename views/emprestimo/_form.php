<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Cliente;
use app\models\Funcionario;


/* @var $this yii\web\View */
/* @var $model app\models\Emprestimo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emprestimo-form">

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

    <?= $form->field($model, 'data_emprestimo')->textInput() ?>

    <?= $form->field($model, 'data_devolucao')->textInput() ?>

    <?= $form->field($model, 'valor')->textInput() ?>

    <?= $form->field($model, 'situacao')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

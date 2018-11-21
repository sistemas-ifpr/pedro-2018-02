<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmprestimoTitulo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emprestimo-titulo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'emprestimo_id')->textInput() ?>

    <?= $form->field($model, 'titulo_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

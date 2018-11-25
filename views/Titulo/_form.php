<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Artista;

/* @var $this yii\web\View */
/* @var $model app\models\Titulo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="titulo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'artista_id')
        ->dropDownList(
            ArrayHelper::map(Artista::find()->all(), 'id', 'nome'),           // Flat array ('id'=>'label')
            ['prompt'=>'Selecione...']    // options
        )

    //<?= $form->field($model, 'artista_id')->textInput() ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ano_lancamento')->textInput() ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <?= $form->field($model, 'quantidade_disponivel')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

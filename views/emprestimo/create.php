<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Cliente;
use app\models\Funcionario;


/* @var $this yii\web\View */
/* @var $model app\models\Emprestimo */

$this->title = 'Create Emprestimo';
$this->params['breadcrumbs'][] = ['label' => 'Emprestimos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emprestimo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <h2>Selecione os livros para o empréstimo</h2>
    
    <?php $form = ActiveForm::begin([
        'id' => 'emprestimo-form',
        'enableAjaxValidation' => false,
        ]); ?>
        
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

        <?= $form->field($model, 'titulo_ids')
            ->listBox($titulos, ['multiple' => true])
            /* or, you may use a checkbox list instead */
            /* ->checkboxList($categories) */
            ->hint('Selecione um ou mais livros para empréstimo.');
    ?>

    <div class="form-group">
        <?= Html::submitButton('Create', [
            'class' => 'btn btn-primary'
        ]) ?>
</div>

<?php ActiveForm::end(); ?>

</div>

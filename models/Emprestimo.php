<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emprestimo".
 *
 * @property int $id
 * @property int $cliente_id
 * @property int $funcionario_id
 * @property string $data_emprestimo
 * @property string $data_devolucao
 * @property double $valor
 * @property int $situacao
 *
 * @property Cliente $cliente
 * @property Funcionario $funcionario
 * @property EmprestimoTitulo[] $emprestimoTitulos
 */
class Emprestimo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emprestimo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
            'situacao', 'default',
            'value' => '1',
            //'on' => 'insert', // instantiate model with this scenario
            ],
            [['cliente_id', 'funcionario_id', 'data_emprestimo'], 'required'],
            [['situacao'], 'integer'],
            [['data_emprestimo', 'data_devolucao', 'cliente_id', 'funcionario_id'], 'safe'],
            [['valor'], 'number'],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cliente_id' => 'id'], 'message'=> Yii::t('app', 'Este cliente não existe')],
            [['funcionario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['funcionario_id' => 'id'], 'message'=> Yii::t('app', 'Este funcionário não existe')],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cliente_id' => 'Cliente',
            'funcionario_id' => 'Funcionário',
            'data_emprestimo' => 'Data do empréstimo',
            'data_devolucao' => 'Data da devolução',
            'valor' => 'Valor',
            'situacao' => 'Situação',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'cliente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasOne(Funcionario::className(), ['id' => 'funcionario_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmprestimoTitulos()
    {
        return $this->hasMany(EmprestimoTitulo::className(), ['emprestimo_id' => 'id']);
    }
    
    public function getTitulos()
    {
        return $this->hasMany(Titulo::className(), ['id' => 'titulo_id'])
            ->viaTable('emprestimo_titulo', ['emprestimo_id' => 'id']);
    }
    

    public function emprestar()
    {
        $emprestar = Titulo::findOne(1);
        $emprestar->quantidade = quantidade - 1;
    }
    
    public function devolver()
    {
        Emprestimo::updateAll([$this->id], 'situacao = 2');
    }
}

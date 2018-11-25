<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property int $id
 * @property int $cliente_id
 * @property int $funcionario_id
 * @property int $titulo_id
 * @property string $data_reserva
 * @property string $data_baixa
 * @property string $situacao
 *
 * @property Cliente $cliente
 * @property Funcionario $funcionario
 * @property Titulo $titulo
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva';
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
            [['cliente_id', 'funcionario_id', 'titulo_id', 'data_reserva'], 'required'],
            [['cliente_id', 'funcionario_id', 'titulo_id'], 'integer'],
            [['data_reserva', 'data_baixa'], 'safe'],
            [['situacao'], 'string'],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cliente_id' => 'id']],
            [['funcionario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['funcionario_id' => 'id']],
            [['titulo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Titulo::className(), 'targetAttribute' => ['titulo_id' => 'id']],
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
            'titulo_id' => 'Título',
            'data_reserva' => 'Data da reserva',
            'data_baixa' => 'Data da baixa',
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
    public function getTitulo()
    {
        return $this->hasOne(Titulo::className(), ['id' => 'titulo_id']);
    }
    
   
}

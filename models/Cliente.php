<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string $telefone
 * @property string $celular
 * @property string $endereco
 * @property string $data_nascimento
 * @property int $bonus
 *
 * @property Emprestimo[] $emprestimos
 * @property Reserva[] $reservas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cpf', 'celular'], 'required'],
            [['data_nascimento'], 'safe'],
            [['bonus'], 'integer'],
            [['nome', 'endereco'], 'string', 'max' => 50],
            [['cpf'], 'string', 'max' => 14],
            [['telefone', 'celular'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'telefone' => 'Telefone',
            'celular' => 'Celular',
            'endereco' => 'Endereco',
            'data_nascimento' => 'Data Nascimento',
            'bonus' => 'Bonus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmprestimos()
    {
        return $this->hasMany(Emprestimo::className(), ['cliente_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::className(), ['cliente_id' => 'id']);
    }
}

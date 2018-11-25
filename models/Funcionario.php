<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funcionario".
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string $telefone
 * @property string $celular
 * @property string $endereco
 * @property string $data_admissao
 * @property string $data_demissao
 */
class Funcionario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cpf', 'telefone', 'celular', 'endereco', 'data_admissao', 'data_demissao'], 'required'],
            [['data_admissao', 'data_demissao'], 'safe'],
            [['nome', 'endereco'], 'string', 'max' => 50],
            [['cpf'], 'string', 'max' => 11],
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
            'endereco' => 'Endereço',
            'data_admissao' => 'Data de Admissão',
            'data_demissao' => 'Data de Demissão',
        ];
    }
}

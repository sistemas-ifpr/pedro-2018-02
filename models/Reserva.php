<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property int $id
 * @property int $cliente_id
 * @property int $funcionario_id
 * @property string $data_reserva
 * @property string $data_baixa
 *
 * @property Cliente $cliente
 * @property Funcionario $funcionario
 * @property ReservaTitulo[] $reservaTitulos
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
            [['cliente_id', 'funcionario_id', 'data_reserva'], 'required'],
            [['cliente_id', 'funcionario_id'], 'integer'],
            [['data_reserva', 'data_baixa'], 'safe'],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cliente_id' => 'id']],
            [['funcionario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['funcionario_id' => 'id']],
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
            'funcionario_id' => 'Funcionario',
            'data_reserva' => 'Data da Reserva',
            'data_baixa' => 'Data da Baixa',
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
    public function getReservaTitulos()
    {
        return $this->hasMany(ReservaTitulo::className(), ['reserva_id' => 'id']);
    }
}

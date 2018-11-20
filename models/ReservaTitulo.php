<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserva_titulo".
 *
 * @property int $id
 * @property int $reserva_id
 * @property int $titulo_id
 *
 * @property Reserva $reserva
 * @property Titulo $titulo
 */
class ReservaTitulo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva_titulo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reserva_id', 'titulo_id'], 'required'],
            [['reserva_id', 'titulo_id'], 'integer'],
            [['reserva_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reserva::className(), 'targetAttribute' => ['reserva_id' => 'id']],
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
            'reserva_id' => 'Reserva ID',
            'titulo_id' => 'Titulo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReserva()
    {
        return $this->hasOne(Reserva::className(), ['id' => 'reserva_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitulo()
    {
        return $this->hasOne(Titulo::className(), ['id' => 'titulo_id']);
    }
}

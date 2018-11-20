<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "titulo".
 *
 * @property int $id
 * @property string $titulo
 * @property int $artista_id
 * @property string $descricao
 * @property string $ano_lancamento
 * @property int $quantidade
 * @property int $quantidade_disponivel
 *
 * @property EmprestimoTitulo[] $emprestimoTitulos
 * @property ReservaTitulo[] $reservaTitulos
 * @property Artista $artista
 */
class Titulo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'titulo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'artista_id', 'descricao', 'ano_lancamento', 'quantidade', 'quantidade_disponivel'], 'required'],
            [['artista_id', 'quantidade', 'quantidade_disponivel'], 'integer'],
            [['ano_lancamento'], 'safe'],
            [['titulo', 'descricao'], 'string', 'max' => 50],
            [['artista_id'], 'exist', 'skipOnError' => true, 'targetClass' => Artista::className(), 'targetAttribute' => ['artista_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'artista_id' => 'Artista ID',
            'descricao' => 'Descricao',
            'ano_lancamento' => 'Ano Lancamento',
            'quantidade' => 'Quantidade',
            'quantidade_disponivel' => 'Quantidade Disponivel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmprestimoTitulos()
    {
        return $this->hasMany(EmprestimoTitulo::className(), ['titulo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservaTitulos()
    {
        return $this->hasMany(ReservaTitulo::className(), ['titulo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtista()
    {
        return $this->hasOne(Artista::className(), ['id' => 'artista_id']);
    }
}

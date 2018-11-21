<?php

namespace app\models;
use yii\helpers\ArrayHelper;
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
            'titulo' => 'Título',
            'artista_id' => 'Artista',
            'descricao' => 'Descrição',
            'ano_lancamento' => 'Ano de Lançamento',
            'quantidade' => 'Quantidade total',
            'quantidade_disponivel' => 'Quantidade Disponível',
        ];
    }
    
    public static function getAvailableTitulos()
    {
        //ORDERBY eU Que mudei_++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        $titulos = self::find()->orderBy('titulo')->asArray()->all();
        $items = ArrayHelper::map($titulos, 'id', 'titulo');
        return $items;
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

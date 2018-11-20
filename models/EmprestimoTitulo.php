<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emprestimo_titulo".
 *
 * @property int $id
 * @property int $emprestimo_id
 * @property int $titulo_id
 *
 * @property Emprestimo $emprestimo
 * @property Titulo $titulo
 */
class EmprestimoTitulo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emprestimo_titulo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emprestimo_id', 'titulo_id'], 'required'],
            [['emprestimo_id', 'titulo_id'], 'integer'],
            [['emprestimo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Emprestimo::className(), 'targetAttribute' => ['emprestimo_id' => 'id']],
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
            'emprestimo_id' => 'Emprestimo ID',
            'titulo_id' => 'Titulo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmprestimo()
    {
        return $this->hasOne(Emprestimo::className(), ['id' => 'emprestimo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTitulo()
    {
        return $this->hasOne(Titulo::className(), ['id' => 'titulo_id']);
    }
}

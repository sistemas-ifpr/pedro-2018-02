<?php

namespace app\models;
use yii\helpers\ArrayHelper;

class EmprestimoComTitulos extends \app\models\Emprestimo

    
    {
    /**
     * @var array IDs of the categories
     */
    var $titulo_ids = [];
    
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            // each category_id must exist in category table (*1)
            ['titulo_ids', 'each', 'rule' => [
                    'exist', 'targetClass' => Titulo::className(), 'targetAttribute' => 'id'
                ]
            ],
        ]);
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'titulo_ids' => 'Titulo',
        ]);
    }
    
    /**
     * load the post's categories (*2)
     */
    public function loadTitulos()
    {
        $this->titulo_ids = [];
        if (!empty($this->id)) {
            $rows = \app\models\EmprestimoTitulo::find()
                ->select(['titulo_id'])
                ->where(['emprestimo_id' => $this->id])
                ->asArray()
                ->all();
            foreach($rows as $row) {
               $this->titulo_ids[] = $row['titulo_id'];
            }
        }
    }

    /**
     * save the post's categories (*3)
     */
    public function saveTitulos()
    {
        /* clear the categories of the post before saving */
        \app\models\EmprestimoTitulo::deleteAll(['emprestimo_id' => $this->id]);
        if (is_array($this->titulo_ids)) {
            foreach($this->titulo_ids as $titulo_id) {
                $pc = new EmprestimoTitulo();
                $pc->emprestimo_id = $this->id;
                $pc->titulo_id = $titulo_id;
                $pc->save();
                
                //diminui um titulo do estoque
                $tit = Titulo::findOne($titulo_id);
                --$tit->quantidade_disponivel;
                $tit->save();
            }
        }
        /* Be careful, $this->category_ids can be empty */
    }
    
}
<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Emprestimo;

/**
 * EmprestimoSearch represents the model behind the search form of `app\models\Emprestimo`.
 */
class EmprestimoSearch extends Emprestimo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'situacao'], 'integer'],
            [['data_emprestimo', 'data_devolucao', 'cliente_id', 'funcionario_id'], 'safe'],
            [['valor'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Emprestimo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'cliente_id' => $this->cliente_id,
            'funcionario_id' => $this->funcionario_id,
            'data_emprestimo' => $this->data_emprestimo,
            'data_devolucao' => $this->data_devolucao,
            'valor' => $this->valor,
            'situacao' => $this->situacao,
        ]);

        return $dataProvider;
    }
}

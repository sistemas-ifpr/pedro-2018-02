<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Titulo;

/**
 * TituloSearch represents the model behind the search form of `app\models\Titulo`.
 */
class TituloSearch extends Titulo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'artista_id', 'quantidade', 'quantidade_disponivel'], 'integer'],
            [['titulo', 'descricao', 'ano_lancamento'], 'safe'],
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
        $query = Titulo::find();

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
            'artista_id' => $this->artista_id,
            'ano_lancamento' => $this->ano_lancamento,
            'quantidade' => $this->quantidade,
            'quantidade_disponivel' => $this->quantidade_disponivel,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}

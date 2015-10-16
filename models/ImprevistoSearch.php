<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Imprevisto;

/**
 * ImprevistoSearch represents the model behind the search form about `app\models\Imprevisto`.
 */
class ImprevistoSearch extends Imprevisto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_imprevisto'], 'integer'],
            [['descripcion', 'fecha', 'rut_parvulo'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Imprevisto::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_imprevisto' => $this->id_imprevisto,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'rut_parvulo', $this->rut_parvulo]);

        return $dataProvider;
    }
}

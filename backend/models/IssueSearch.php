<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Issueofbooks;

/**
 * IssueSearch represents the model behind the search form of `app\models\Issueofbooks`.
 */
class IssueSearch extends Issueofbooks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['record', 'ticket_number', 'IDb'], 'integer'],
            [['date_of_issue', 'return_date'], 'safe'],
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
        $query = Issueofbooks::find();

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
            'record' => $this->record,
            'ticket_number' => $this->ticket_number,
            'IDb' => $this->IDb,
            'date_of_issue' => $this->date_of_issue,
            'return_date' => $this->return_date,
        ]);

        return $dataProvider;
    }
}

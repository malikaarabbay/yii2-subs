<?php

namespace app\modules\subs\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\subs\models\Subscribers;

/**
 * SubscribersSearch represents the model behind the search form of `app\modules\subs\models\Subscribers`.
 */
class SubscribersSearch extends Subscribers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'event_id', 'is_blocked', 'created_at', 'updated_at'], 'integer'],
            [['email'], 'email', 'message' => 'Неправильный формат электронной почты'],
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
        $query = Subscribers::find();

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
            'event_id' => $this->event_id,
            'is_blocked' => $this->is_blocked,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}

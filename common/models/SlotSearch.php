<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Slot;

/**
 * SlotSearch represents the model behind the search form of `common\models\Slot`.
 */
class SlotSearch extends Slot
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'period_id', 'quota', 'creator', 'updater', 'status'], 'integer'],
            [['name', 'desp', 'note', 'extra', 'slot_date', 'time_start', 'time_end', 'created_at', 'updated_at'], 'safe'],
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
        $query = Slot::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'slot_date' => SORT_ASC,
                    'period_id' => SORT_ASC,
                    'time_start' => SORT_ASC,
                ],
            ],
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
            'period_id' => $this->period_id,
            'slot_date' => $this->slot_date,
            'time_start' => $this->time_start,
            'time_end' => $this->time_end,
            'quota' => $this->quota,
            'creator' => $this->creator,
            'created_at' => $this->created_at,
            'updater' => $this->updater,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'desp', $this->desp])
            ->andFilterWhere(['ilike', 'note', $this->note])
            ->andFilterWhere(['ilike', 'extra', $this->extra]);

        return $dataProvider;
    }
}

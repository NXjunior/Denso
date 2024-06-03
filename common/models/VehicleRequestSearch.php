<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VehicleRequest;

/**
 * VehicleRequestSearch represents the model behind the search form of `common\models\VehicleRequest`.
 */
class VehicleRequestSearch extends VehicleRequest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'vehicle_id', 'requested_id', 'requested_role', 'approver', 'status', 'creator', 'updater'], 'integer'],
            [['approved_at', 'created_at', 'updated_at'], 'safe'],
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
        $query = VehicleRequest::find();

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
            'vehicle_id' => $this->vehicle_id,
            'requested_id' => $this->requested_id,
            'requested_role' => $this->requested_role,
            'approver' => $this->approver,
            'approved_at' => $this->approved_at,
            'status' => $this->status,
            'creator' => $this->creator,
            'created_at' => $this->created_at,
            'updater' => $this->updater,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}

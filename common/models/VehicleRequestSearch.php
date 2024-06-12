<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VehicleRequest;
use common\models\Vehicle;


/**
 * VehicleRequestSearch represents the model behind the search form of `common\models\VehicleRequest`.
 */
class VehicleRequestSearch extends VehicleRequest
{
    /**
     * {@inheritdoc}
     */

     public $employeeName;
     public $vehiclePlate;
     public $vehicleType;
     public $requested_role;
     public $status;
     public $creatorUser;

    public function rules()
    {
        return [
            [['id', 'vehicle_id', 'requested_id', 'requested_role', 'approver', 'status', 'creator', 'updater'], 'integer'],
            [
                ['approved_at', 'created_at', 'updated_at','employeeName','vehiclePlate','vehicleType','creatorUser','requested_role','status']
                , 'safe'
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getVehicleTypeList(){
        return Vehicle::getTypeList();
    }

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

        $dataProvider->sort->attributes['employeeName'] = [
            'asc' => ['employee.firstname' => SORT_ASC, 'employee.lastname' => SORT_ASC],
            'desc' => ['employee.firstname' => SORT_DESC, 'employee.lastname' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['vehiclePlate'] = [
            'asc' => ['vehicle.plate' => SORT_ASC],
            'desc' => ['vehicle.plate' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['vehicleType'] = [
            'asc' => ['vehicle.type' => SORT_ASC],
            'desc' => ['vehicle.type' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['creatorUser'] = [
            'asc' => ['user.username' => SORT_ASC],
            'desc' => ['user.username' => SORT_DESC],
        ];

        $query->innerJoinWith('employeeInfo');
        $query->innerJoinWith('vehicle');
        $query->innerJoinWith('creatorInfo');

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
            'vehicle_request.status' => $this->status,
            'creator' => $this->creator,
            'created_at' => $this->created_at,
            'updater' => $this->updater,
            'updated_at' => $this->updated_at,
        ]);

        if($this->employeeName){
            $query->andFilterWhere([
                'or',
                ['like','employee.firstname',$this->employeeName],
                ['like','employee.lastname',$this->employeeName],
            ]);
        }
        if($this->vehiclePlate){
            $query->andFilterWhere([
                'like',
                'vehicle.plate',
                $this->vehiclePlate
            ]);
        }
        if($this->vehicleType){
            $query->andFilterWhere(['vehicle.type' => $this->vehicleType]);
        }
        if($this->requested_role){
            $query->andFilterWhere([
                'requested_role' => $this->requested_role
            ]);
        }
        if($this->creatorUser){
            $query->andFilterWhere([
                'like','user.username',$this->creatorUser
            ]);
        }

        return $dataProvider;
    }
}

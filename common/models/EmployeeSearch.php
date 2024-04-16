<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form of `common\models\Employee`.
 */
class EmployeeSearch extends Employee
{
    public $fullname;
    public $fullnameEn;
    public $company_code;
    public $plant;
    public $booked;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'creator', 'updater', 'status'], 'integer'],
            [['code', 'title', 'firstname', 'lastname', 'title_en', 'firstname_en', 'lastname_en', 'created_at', 'updated_at', 'fullname', 'fullnameEn', 'company_code', 'plant', 'booked'], 'safe'],
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
        $query = Employee::find();

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
            'employee.id' => $this->id,
            'employee.company_id' => $this->company_id,
            'employee.creator' => $this->creator,
            'employee.created_at' => $this->created_at,
            'employee.updater' => $this->updater,
            'employee.updated_at' => $this->updated_at,
            'employee.status' => $this->status,
        ]);


        if ($this->fullname) {
            $query->andFilterWhere([
                'or',
                ['like', 'firstname', $this->fullname],
                ['like', 'lastname', $this->fullname],
            ]);
        }

        if ($this->fullnameEn) {
            $query->andFilterWhere([
                'or',
                ['like', 'firstname_en', $this->fullnameEn],
                ['like', 'lastname_en', $this->fullnameEn],
            ]);
        }

        if ($this->company_code) {
            $query->innerJoinWith('employeeMetas AS employee_meta_company');
            $query->andFilterWhere([
                'employee_meta_company.meta_key' => 'company_code',
                'employee_meta_company.meta_value' => $this->company_code,
            ]);
        }

        if ($this->plant) {
            $query->innerJoinWith('employeeMetas AS employee_meta_plant');
            $query->andFilterWhere([
                'employee_meta_plant.meta_key' => 'plant',
                'employee_meta_plant.meta_value' => $this->plant,
            ]);
        }

        if ($this->booked) {
            $query->joinWith('booking');

            if ($this->booked == 'yes') {
                $query->andWhere(['not', ['booking.source_id' => null]]);
            } else {
                $query->andWhere(['booking.source_id' => null]);
            }
        }



        $query->andFilterWhere(['ilike', 'code', $this->code])
            ->andFilterWhere(['ilike', 'title', $this->title])
            ->andFilterWhere(['ilike', 'firstname', $this->firstname])
            ->andFilterWhere(['ilike', 'lastname', $this->lastname])
            ->andFilterWhere(['ilike', 'title_en', $this->title_en])
            ->andFilterWhere(['ilike', 'firstname_en', $this->firstname_en])
            ->andFilterWhere(['ilike', 'lastname_en', $this->lastname_en]);

        return $dataProvider;
    }
}

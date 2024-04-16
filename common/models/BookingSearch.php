<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Booking;

/**
 * BookingSearch represents the model behind the search form of `common\models\Booking`.
 */
class BookingSearch extends Booking
{

    public $bookingName;
    public $slotTime;
    public $slotDate;
    public $vaccinated;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'period_id', 'target_id', 'status', 'creator', 'updater'], 'integer'],
            [['source_id', 'created_at', 'updated_at', 'last_login', 'bookingName', 'slotTime', 'slotDate', 'vaccinated'], 'safe'],
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
        $query = Booking::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    // 'slot_date' => SORT_ASC,
                    // 'period_id' => SORT_ASC,
                    // 'time_start' => SORT_ASC,
                ]
            ],
        ]);

        $dataProvider->sort->attributes['bookingName'] = [
            'asc' => ['employee.firstname' => SORT_ASC],
            'desc' => ['employee.firstname' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['slotDate'] = [
            'asc' => ['slot_date.slot_date' => SORT_ASC],
            'desc' => ['slot_date.slot_date' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['slotTime'] = [
            'asc' => ['slot_time.time_start' => SORT_ASC],
            'desc' => ['slot_time.time_start' => SORT_DESC],
        ];

        $query->innerJoinWith('employee');
        $query->innerJoinWith('target AS slot_date');
        $query->innerJoinWith('target AS slot_time');

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        if ($this->bookingName) {
            $query->andFilterWhere([
                'or',
                ['like', 'employee.firstname', $this->bookingName],
                ['like', 'employee.lastname', $this->bookingName],
            ]);
        }

        if ($this->slotDate) {
            // $query->innerJoinWith('target AS slot_date');
            $query->andFilterWhere([
                'slot_date.slot_date' => $this->slotDate,
            ]);
        }

        if ($this->slotTime) {
            // $query->innerJoinWith('target AS slot_time');
            $query->andFilterWhere([
                'slot_time.time_start' => $this->slotTime,
            ]);
        }

        if ($this->vaccinated) {
            $query->joinWith('vaccinated');

            if ($this->vaccinated == 'yes') {
                $query->andWhere(['not', ['activity.booking_id' => null]]);
            } else {
                $query->andWhere(['activity.booking_id' => null]);
            }
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'booking.company_id' => $this->company_id,
            'booking.period_id' => $this->period_id,
            'target_id' => $this->target_id,
            'booking.status' => $this->status,
            'booking.creator' => $this->creator,
            'booking.created_at' => $this->created_at,
            'booking.updater' => $this->updater,
            'booking.updated_at' => $this->updated_at,
            'last_login' => $this->last_login,
        ]);

        $query->andFilterWhere(['ilike', 'source_id', $this->source_id]);

        return $dataProvider;
    }
}

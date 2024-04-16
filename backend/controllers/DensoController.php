<?php

namespace backend\controllers;

use common\models\Activity;
use yii\web\NotFoundHttpException;
use common\models\Period;
use common\models\Slot;
use common\models\Booking;
use yii\data\ArrayDataProvider;

class DensoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $companyId = 1;

        $sql = "SELECT p.id, p.name,
                    CASE WHEN SUM(s.quota) is not null THEN SUM(s.quota) ELSE 0 END AS quota,
                    CASE WHEN SUM(booked.amount) > 0 THEN SUM(booked.amount) ELSE 0 END AS booked,
                    CASE WHEN SUM(s.quota) is not null THEN (CASE WHEN SUM(booked.amount) > 0 THEN SUM(booked.amount) ELSE 0 END)/SUM(s.quota) ELSE 0 END AS percent
                FROM period p
                INNER JOIN company c ON p.company_id = :companyId
                LEFT JOIN slot s ON s.period_id = p.id
                LEFT JOIN (
                    SELECT target_id, CASE WHEN COUNT(target_id) > 0 THEN COUNT(target_id) ELSE 0 END AS amount
                    FROM booking b
                    WHERE company_id = :companyId AND status = :bookingStatus AND deleted_at IS NULL
                    GROUP BY target_id
                ) AS booked ON s.id = booked.target_id
                WHERE p.status = :periodStatus AND s.status = :slotStatus
                GROUP BY p.id
                ORDER BY p.name";

        $activePeriodByCompany = db()->createCommand($sql, [
            ':companyId' => $companyId,
            ':periodStatus' => Period::STATUS_ACTIVE,
            ':slotStatus' => Slot::STATUS_ACTIVE,
            ':bookingStatus' => Booking::STATUS_ACTIVE,
        ])->queryAll();

        return $this->render('index', [
            'activePeriodByCompany' => $activePeriodByCompany
        ]);
    }

    public function actionPeriod($id)
    {
        $model = $this->findPeriod($id);

        $sql = "SELECT s.slot_date, s.slot_date AS name, SUM(quota) AS quota, 0 AS booked, string_agg(s.note, '') AS note
                FROM slot s
                WHERE s.status = :status AND s.period_id = :periodId
                GROUP BY s.slot_date
                ORDER BY s.slot_date";

        $allSlotDate = db()->createCommand($sql, [
            ':periodId' => $id,
            ':status' => Slot::STATUS_ACTIVE,
        ])->queryAll();

        $sql = "SELECT s.id, s.slot_date, s.time_start, s.time_end, s.quota, s.note,
                    CASE WHEN booked.amount > 0 THEN booked.amount ELSE 0 END AS booked,
                    CASE WHEN booked.vaccinated > 0 THEN booked.vaccinated ELSE 0 END AS visited
                FROM slot s
                LEFT JOIN (

                    SELECT
                        b.target_id,
                        CASE WHEN COUNT(b.target_id) > 0 THEN COUNT(b.target_id) ELSE 0 END AS amount,
                        CASE WHEN COUNT(a.id) > 0 THEN COUNT(a.id) ELSE 0 END AS vaccinated
                    FROM booking b
                    LEFT JOIN activity a ON a.booking_id = b.id
                    WHERE b.period_id = :periodId AND b.status = :bookingStatus AND b.deleted_at IS NULL
                    AND a.kind = :vaccinated
                    GROUP BY b.target_id

                ) AS booked ON s.id = booked.target_id

                WHERE s.status = :status AND s.period_id = :periodId
                ORDER BY s.slot_date, s.time_start";

        $allSlot = db()->createCommand($sql, [
            ':periodId' => $id,
            ':status' => Slot::STATUS_ACTIVE,
            ':bookingStatus' => Booking::STATUS_ACTIVE,
            ':vaccinated' => Activity::KIND_VACCINATED
        ])->queryAll();

        $slotDateCurrent = null;
        foreach ($allSlot as $slotData) {

            if ($slotDateCurrent !== $slotData['slot_date']) {
                $slot['date'] = $slotData['slot_date'];
                $slotDateCurrent = $slot['date'];

                $slot['note'] = !empty($slotData['note']) ? $slotData['note'] : null;
            }

            $slot['date'] = $slotData['slot_date'];
            $slot['slots'][$slotData['time_start']]['time_start'] = substr($slotData['time_start'], 0, 5);
            $slot['slots'][$slotData['time_start']]['time_end'] = substr($slotData['time_end'], 0, 5);
            $slot['slots'][$slotData['time_start']]['quota'] = $slotData['quota'];
            $slot['slots'][$slotData['time_start']]['booked'] = $slotData['booked'];
            $slot['slots'][$slotData['time_start']]['visited'] = $slotData['visited'];
            $slot['slots'][$slotData['time_start']]['id'] = $slotData['id'];

            $slots[$slotDateCurrent] = $slot;
        }


        return $this->render('period', [
            'model' => $model,
            'allSlotDate' => $allSlotDate,
            'slots' => $slots
        ]);
    }

    public function actionSlot($id)
    {

        $model = $this->findSlot($id);

        return $this->render('slot', [
            'model' => $model,
        ]);
    }

    protected function findPeriod($id)
    {
        if (($model = Period::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findSlot($id)
    {
        if (($model = Slot::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "slot".
 *
 * @property int $id
 * @property int $period_id
 * @property string $name
 * @property string|null $desp
 * @property string|null $note
 * @property string|null $extra
 * @property string|null $slot_date
 * @property string|null $time_start
 * @property string|null $time_end
 * @property int $quota
 * @property int $creator
 * @property string|null $created_at
 * @property int $updater
 * @property string|null $updated_at
 * @property int $status
 *
 * @property User $creator0
 * @property Period $period
 * @property User $updater0
 */
class Slot extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 10;
    const STATUS_DELETE = 0;
    const BREAK_TIME_START = '13:00:00';

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['period_id', 'name', 'quota'], 'required'],
            [['period_id', 'quota', 'creator', 'updater', 'status'], 'default', 'value' => null],
            [['period_id', 'quota', 'creator', 'updater', 'status'], 'integer'],
            [['note'], 'string'],
            [['extra', 'slot_date', 'time_start', 'time_end', 'created_at', 'updated_at'], 'safe'],
            [['name', 'desp'], 'string', 'max' => 255],
            [['period_id'], 'exist', 'skipOnError' => true, 'targetClass' => Period::class, 'targetAttribute' => ['period_id' => 'id']],
            [['creator'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['creator' => 'id']],
            [['updater'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updater' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'period_id' => 'Period ID',
            'name' => 'Name',
            'desp' => 'Desp',
            'note' => 'Note',
            'extra' => 'Extra',
            'slot_date' => 'Slot Date',
            'time_start' => 'Time Start',
            'time_end' => 'Time End',
            'quota' => 'Quota',
            'creator' => 'Creator',
            'created_at' => 'Created At',
            'updater' => 'Updater',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Creator0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatorInfo()
    {
        return $this->hasOne(User::class, ['id' => 'creator']);
    }

    /**
     * Gets query for [[Period]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeriod()
    {
        return $this->hasOne(Period::class, ['id' => 'period_id']);
    }

    /**
     * Gets query for [[Updater0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdaterInfo()
    {
        return $this->hasOne(User::class, ['id' => 'updater']);
    }

    public function beforeSave($insert)
    {

        if ($insert) {
            if (!isset(Yii::$app->user))
                $this->creator = 1;
            else if (!Yii::$app->user->isGuest) {
                $this->creator = userId();
            }
        } else {
            if (!Yii::$app->user->isGuest) {
                $this->updater = userId();
            }
        }

        return parent::beforeSave($insert);
    }

    public function getFullname()
    {
        return Yii::$app->date->date('วันlที่ j F Y', strtotime($this->slot_date)) . ' เวลา ' . str_replace(':', '.', substr($this->time_start, 0, 5)) . ' - ' . str_replace(':', '.', substr($this->time_end, 0, 5));
    }



    public function getAvailable()
    {

        $sql = "SELECT CASE WHEN bookedSlot.booked IS NULL THEN s.quota ELSE s.quota - bookedSlot.booked END AS available
                FROM slot s
                LEFT JOIN (
                SELECT target_id, COUNT(id) AS booked
                    FROM booking
                    WHERE status = :bookingStatus AND deleted_at IS NULL AND target_id IS NOT NULL
                    GROUP BY target_id
                ) AS bookedSlot ON bookedSlot.target_id = s.id
                WHERE s.id = :slotId";

        return db()->createCommand($sql, [
            ':slotId' => $this->id,
            ':bookingStatus' => Booking::STATUS_ACTIVE,
        ])->queryScalar();
    }

    public static function getAllSlotTimeStart()
    {
        $sql = "SELECT distinct s.time_start
                FROM slot s
                WHERE s.status = :status
                ORDER BY s.time_start";

        return db()->createCommand($sql, [
            ':status' => Slot::STATUS_ACTIVE,
        ])->queryAll();
    }

    public static function getAllSlotTimeEnd()
    {
        $sql = "SELECT distinct s.time_end
                FROM slot s
                WHERE s.status = :status
                ORDER BY s.time_end";

        return db()->createCommand($sql, [
            ':status' => Slot::STATUS_ACTIVE,
        ])->queryAll();
    }


    public static function getAllPeriod()
    {
        $sql = "SELECT distinct p.name, p.id
                FROM slot s
                INNER JOIN period p ON p.id = s.period_id
                WHERE p.status = :status AND s.status = :slotStatus
                ORDER BY p.name";

        return db()->createCommand($sql, [
            ':status' => Period::STATUS_ACTIVE,
            ':slotStatus' => Slot::STATUS_ACTIVE,
        ])->queryAll();
    }
}

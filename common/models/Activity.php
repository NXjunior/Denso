<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property int $booking_id
 * @property string $kind
 * @property string|null $remark
 * @property int $creator
 * @property string|null $created_at
 * @property int|null $updater
 * @property string|null $updated_at
 *
 * @property Booking $booking
 */
class Activity extends \yii\db\ActiveRecord
{
    const KIND_VISITED = 10;
    const KIND_VACCINATED = 20;

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
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['booking_id', 'kind', 'creator'], 'required'],
            [['booking_id', 'creator', 'updater'], 'default', 'value' => null],
            [['booking_id', 'creator', 'updater'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['kind'], 'string', 'max' => 50],
            [['remark'], 'string', 'max' => 255],
            [['booking_id'], 'exist', 'skipOnError' => true, 'targetClass' => Booking::class, 'targetAttribute' => ['booking_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'booking_id' => 'Booking ID',
            'kind' => 'Kind',
            'remark' => 'Remark',
            'creator' => 'Creator',
            'created_at' => 'Created At',
            'updater' => 'Updater',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Booking]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooking()
    {
        return $this->hasOne(Booking::class, ['id' => 'booking_id']);
    }

    public function beforeSave($insert)
    {

        if (isset(Yii::$app->params['location']) && Yii::$app->params['location'] == 'backend') {
            if ($insert) {
                if (!Yii::$app->user->isGuest) {
                    $this->creator = userId();
                }
            } else {
                if (!Yii::$app->user->isGuest) {
                    $this->updater = userId();
                }
            }
        }

        return parent::beforeSave($insert);
    }
}

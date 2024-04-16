<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "booking_meta".
 *
 * @property int $id
 * @property int $booking_id
 * @property string|null $meta_key
 * @property string|null $meta_value
 *
 * @property Booking $booking
 */
class BookingMeta extends \yii\db\ActiveRecord
{

    public $allergic_egg;
    public $fever;
    public $guillain_barre_syndrome;
    public $had_vaccine_before;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking_meta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['booking_id'], 'required'],
            [['booking_id'], 'default', 'value' => null],
            [['booking_id'], 'integer'],
            [['meta_value'], 'string'],
            [['meta_key'], 'string', 'max' => 255],
            [['booking_id', 'meta_key'], 'unique', 'targetAttribute' => ['booking_id', 'meta_key']],
            [['booking_id'], 'exist', 'skipOnError' => true, 'targetClass' => Booking::class, 'targetAttribute' => ['booking_id' => 'id']],
            [['allergic_egg', 'fever', 'guillain_barre_syndrome', 'had_vaccine_before'], 'required', 'message' => 'กรุณาตอบคำถามตามความเป็นจริงเพื่อเจ้าหน้าที่จะได้พิจารณาว่าท่านสามารถฉีดวัคซีนได้ หรือไม่', 'on' => 'denso'],

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
            'meta_key' => 'Meta Key',
            'meta_value' => 'Meta Value',
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
}

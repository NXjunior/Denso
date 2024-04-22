<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "booking".
 *
 * @property int $id
 * @property string $source_id
 * @property int $company_id
 * @property int $period_id
 * @property int $target_id
 * @property int $status
 * @property int $creator
 * @property string|null $created_at
 * @property int|null $updater
 * @property string|null $updated_at
 * @property string|null $last_login
 *
 * @property BookingMeta[] $bookingMetas
 * @property Company $company
 * @property Period $period
 * @property Slot $target
 */
class Booking extends \yii\db\ActiveRecord implements IdentityInterface
{

    const CONFIG_SPLIT_QR_CHAR = 'X';
    const STATUS_ACTIVE = 10;
    const STATUS_DELETE = 0;
    const CONFIG_GAPDATE = 0; // can not selectable date before 3 day from book target date
    const CONFIG_CHANGEABLE_DATE = 0; // can not change date at lease 1 day from book target date

    const METHOD_ONLINE = 10;
    const METHOD_WALKIN = 20;

    const DATES_DISABLED = [
        '2024-04-28',
        '2024-05-01',
        '2024-05-04',
        '2024-05-05',
        '2024-05-06',
        '2024-05-12',
        '2024-05-18',
        '2024-05-19',
        '2024-05-22',
        '2024-05-26'
    ];

    public $confirm;
    public $slot_date;
    public $meta;
    public $time_start;

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
        return 'booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['source_id', 'company_id', 'period_id', 'creator'], 'required'],
            [['company_id', 'period_id', 'target_id', 'status', 'creator', 'updater', 'deleter', 'previous_target'], 'default', 'value' => null],
            [['method'], 'default', 'value' => self::METHOD_ONLINE],
            [['company_id', 'period_id', 'target_id', 'status', 'creator', 'updater', 'previous_target', 'method'], 'integer'],
            [['created_at', 'updated_at', 'last_login', 'deleted_at', 'completed_at'], 'safe'],
            [['source_id'], 'string', 'max' => 20],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
            [['period_id'], 'exist', 'skipOnError' => true, 'targetClass' => Period::class, 'targetAttribute' => ['period_id' => 'id']],
            [['target_id'], 'exist', 'skipOnError' => true, 'targetClass' => Slot::class, 'targetAttribute' => ['target_id' => 'id']],
            [['deleter'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updater' => 'id']],

            ['confirm', 'compare', 'compareValue' => 1, 'message' => 'กรุณาตรวจสอบและยืนยันความถูกต้องของข้อมูล', 'on' => 'denso'],
            // [['title', 'confirm'], 'required', 'on' => 'admission'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'source_id' => 'Source ID',
            'company_id' => 'Company ID',
            'period_id' => 'Period ID',
            'target_id' => 'Target ID',
            'status' => 'Status',
            'creator' => 'Creator',
            'created_at' => 'Created At',
            'updater' => 'Updater',
            'updated_at' => 'Updated At',
            'last_login' => 'Last Login',
            'deleter' => 'Deleter',
            'deleted_at' => 'Deleted At',
            'confirm' => 'Confirm',
            'completed_at' => 'Completed At',
            'slot_date' => 'Slot Date',
            'previous_target' => 'Previous Target ID',
            'method' => 'Method',
        ];
    }

    public function getEmployee()
    {
        return $this->hasOne(Employee::class, ['code' => 'source_id', 'company_id' => 'company_id']);
    }

    /**
     * Gets query for [[BookingMetas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookingMetas()
    {
        return $this->hasMany(BookingMeta::class, ['booking_id' => 'id']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'company_id']);
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

    public function getActivities()
    {
        return $this->hasMany(Activity::class, ['booking_id' => 'id']);
    }

    public function getVaccinated()
    {
        return $this->hasOne(Activity::class, ['booking_id' => 'id'])
            ->andOnCondition(['kind' => Activity::KIND_VACCINATED]);
    }

    /**
     * Gets query for [[Target]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTarget()
    {
        return $this->hasOne(Slot::class, ['id' => 'target_id']);
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

    public function afterFind()
    {

        foreach ($this->bookingMetas as $bookingMeta) {
            switch ($bookingMeta['meta_key']) {
                case 'allergic_egg':
                    $allergic_egg = $bookingMeta['meta_value'];
                    break;
                case 'fever':
                    $fever = $bookingMeta['meta_value'];
                    break;
                case 'had_vaccine_before':
                    $had_vaccine_before = $bookingMeta['meta_value'];
                    break;
                case 'guillain_barre_syndrome':
                    $guillain_barre_syndrome = $bookingMeta['meta_value'];
                    break;
                default:
                    break;
            }
        }

        $this->meta = [
            'allergic_egg' => $allergic_egg ?? null,
            'fever' => $fever ?? null,
            'had_vaccine_before' => $had_vaccine_before ?? null,
            'guillain_barre_syndrome' => $guillain_barre_syndrome ?? null,
        ];

        return parent::afterFind();
    }

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public function changeableBooking()
    {
        if (!isset($this->target->slot_date))
            return false;

        $toDay = date_create(date('Y-m-d'));
        $bookedDate = date_create($this->target->slot_date);
        $interval = date_diff($toDay, $bookedDate);

        // $interval->format("%H:%I:%S (Full days: %a)"), "\n";
        // 24:30:00 (Full days: 0)

        $dateDiff = $interval->format('%a');

        return $dateDiff >= self::CONFIG_CHANGEABLE_DATE;
    }

    public static function lastSlotDateInThisPeriod($periodId)
    {
        $sql = "SELECT MAX(slot_date) FROM slot WHERE period_id = :periodId";

        return db()->createCommand($sql, [
            ':periodId' => $periodId,
        ])->queryScalar();
    }

    public static function getAllSlotTime()
    {
        $sql = "SELECT distinct s.time_start
                FROM booking b
                INNER JOIN slot s ON s.id = b.target_id
                WHERE s.status = :status AND b.status = :bookingStatus
                ORDER BY s.time_start";

        return db()->createCommand($sql, [
            ':status' => Slot::STATUS_ACTIVE,
            ':bookingStatus' => Booking::STATUS_ACTIVE,
        ])->queryAll();
    }

    public static function getAllPeriod()
    {
        $sql = "SELECT distinct p.name, p.id
                FROM booking b
                INNER JOIN period p ON p.id = b.period_id
                WHERE p.status = :status AND b.status = :bookingStatus
                ORDER BY p.name";

        return db()->createCommand($sql, [
            ':status' => Period::STATUS_ACTIVE,
            ':bookingStatus' => Booking::STATUS_ACTIVE,
        ])->queryAll();
    }
}

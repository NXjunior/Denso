<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "period".
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string|null $desp
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int $creator
 * @property string|null $created_at
 * @property int $updater
 * @property string|null $updated_at
 * @property int $status
 *
 * @property Company $company
 * @property User $creator0
 * @property Slot[] $slots
 * @property User $updater0
 */
class Period extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 10;
    const STATUS_DELETE = 0;
    const STATUS_INACTIVE = 2;

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
        return 'period';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'name'], 'required'],
            [['company_id', 'creator', 'updater', 'status', 'deleter'], 'default', 'value' => null],
            [['company_id', 'creator', 'updater', 'status', 'deleter'], 'integer'],
            [['start_date', 'end_date', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name', 'desp'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
            [['creator'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['creator' => 'id']],
            [['updater'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updater' => 'id']],
            [['deleter'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updater' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company ID',
            'name' => 'Name',
            'desp' => 'Desp',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'creator' => 'Creator',
            'created_at' => 'Created At',
            'updater' => 'Updater',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery|CompanyQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'company_id']);
    }

    /**
     * Gets query for [[Creator0]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getCreatorInfo()
    {
        return $this->hasOne(User::class, ['id' => 'creator']);
    }

    /**
     * Gets query for [[Slots]].
     *
     * @return \yii\db\ActiveQuery|SlotQuery
     */
    public function getSlots()
    {
        return $this->hasMany(Slot::class, ['period_id' => 'id']);
    }

    /**
     * Gets query for [[Updater0]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUpdaterInfo()
    {
        return $this->hasOne(User::class, ['id' => 'updater']);
    }

    public function beforeSave($insert)
    {

        if ($insert) {
            if (!Yii::$app->user->isGuest) {
                $this->creator = userId();
            }
        } else {
            if (!Yii::$app->user->isGuest) {
                $this->updater = userId();
            }
        }

        return parent::beforeSave($insert);
    }
}

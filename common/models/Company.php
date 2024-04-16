<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property string $abs
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $logo
 * @property int $status
 * @property string|null $domain
 *
 * @property Period[] $periods
 */
class Company extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 10;
    const STATUS_DELETE = 0;

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
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'abs'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'default', 'value' => null],
            [['status'], 'integer'],
            [['name', 'logo', 'domain'], 'string', 'max' => 255],
            [['abs'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'abs' => 'Abs',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'logo' => 'Logo',
            'status' => 'Status',
            'domain' => 'Domain',
        ];
    }

    /**
     * Gets query for [[Periods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeriods()
    {
        return $this->hasMany(Period::class, ['company_id' => 'id']);
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

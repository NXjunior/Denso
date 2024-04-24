<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property int $company_id
 * @property string $code
 * @property string|null $title
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $title_en
 * @property string|null $firstname_en
 * @property string|null $lastname_en
 * @property int $creator
 * @property string|null $created_at
 * @property int|null $updater
 * @property string|null $updated_at
 * @property int $status
 *
 * @property EmployeeMeta[] $employeeMetas
 */
class Employee extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_ACTIVE = 10;
    const STATUS_DELETE = 0;

    public $meta;
    public $company_code;

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
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'code', 'creator', 'title', 'firstname', 'lastname', 'company_code'], 'required'],
            [['company_id', 'creator', 'updater', 'status'], 'default', 'value' => null],
            [['company_id', 'creator', 'updater', 'status'], 'integer'],
            [['created_at', 'updated_at', 'meta'], 'safe'],
            [['code'], 'string', 'max' => 20],
            [['title', 'title_en'], 'string', 'max' => 50],
            [['company_id', 'code'], 'unique', 'targetAttribute' => ['company_id', 'code']],
            [['firstname', 'lastname', 'firstname_en', 'lastname_en'], 'string', 'max' => 255],
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
            'code' => 'Code',
            'title' => 'Title',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'title_en' => 'Title En',
            'firstname_en' => 'Firstname En',
            'lastname_en' => 'Lastname En',
            'creator' => 'Creator',
            'created_at' => 'Created At',
            'updater' => 'Updater',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'fullname' => 'Fullname',
            'fullnameEn' => 'Fullname Eng',
            'meta' => 'Meta',
        ];
    }

    /**
     * Gets query for [[EmployeeMetas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeMetas()
    {
        return $this->hasMany(EmployeeMeta::class, ['employee_id' => 'id']);
    }

    public function beforeSave($insert)
    {

        if ($insert) {
            if (!isset(Yii::$app->user))
                $this->creator = 0;
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
    public function afterFind()
    {

        foreach ($this->employeeMetas as $employeeMeta) {
            switch ($employeeMeta['meta_key']) {
                case 'no':
                    $no = $employeeMeta['meta_value'];
                    break;
                case 'company_code':
                    $company_code = $employeeMeta['meta_value'];
                    break;
                case 'plant':
                    $plant = $employeeMeta['meta_value'];
                    break;
                case 'div':
                    $div = $employeeMeta['meta_value'];
                    break;
                case 'location':
                    $location = $employeeMeta['meta_value'];
                    break;
                case 'section':
                    $section = $employeeMeta['meta_value'];
                    break;
                case 'department':
                    $department = $employeeMeta['meta_value'];
                    break;
                default:
                    $no = $employeeMeta['meta_value'];
                    break;
            }
        }

        $this->meta = [
            'no' => $no ?? 'N/A',
            'company_code' => $company_code ?? 'N/A',
            'plant' => $plant ?? 'N/A',
            'div' => $div ?? 'N/A',
            'location' => $location ?? 'N/A',
            'section' => $section ?? 'N/A',
            'department' => $department ?? 'N/A',
        ];

        return parent::afterFind();
    }

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    public function getBooking()
    {
        return $this->hasOne(Booking::className(), ['source_id' => 'code']);
    }

    public function getFullname()
    {
        return $this->title . ' ' . $this->firstname . ' ' . $this->lastname;
    }

    public function getFullnameEn()
    {
        return $this->title_en . ' ' . $this->firstname_en . ' ' . $this->lastname_en;
    }
    public function getAllCompanyCode($id)
    {
        $sql = "SELECT DISTINCT meta_value
                FROM employee e
                INNER JOIN employee_meta em ON e.id = em.employee_id
                WHERE em.meta_key = :key AND e.company_id = :companyId";

        return Yii::$app->db->createCommand($sql, [
            ':companyId' => $id,
            ':key' => 'company_code',
        ])->queryAll();
    }

    public function getAllPlant($id)
    {
        $sql = "SELECT DISTINCT meta_value
                FROM employee e
                INNER JOIN employee_meta em ON e.id = em.employee_id
                WHERE em.meta_key = :key AND e.company_id = :companyId";

        return Yii::$app->db->createCommand($sql, [
            ':companyId' => $id,
            ':key' => 'plant',
        ])->queryAll();
    }

    public function getAllWorkLocation($id)
    {
        $sql = "SELECT DISTINCT meta_value
                FROM employee e
                INNER JOIN employee_meta em ON e.id = em.employee_id
                WHERE em.meta_key = :key AND e.company_id = :companyId";

        return Yii::$app->db->createCommand($sql, [
            ':companyId' => $id,
            ':key' => 'location',
        ])->queryAll();
    }

    public static function findIdentity($id)
    {
        return static::find()->cache(30)->where(['id' => $id])->one();
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return false;
    }
}

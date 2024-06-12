<?php

namespace common\models;

use Yii;
use common\models\Employee;
use common\traits\softDeleteTrait;
/**
 * This is the model class for table "vehicle_request".
 *
 * @property int $id
 * @property int $vehicle_id
 * @property int $requested_id
 * @property int $requested_role
 * @property int|null $approver
 * @property string|null $approved_at
 * @property int $status
 * @property int $creator
 * @property string|null $created_at
 * @property int|null $updater
 * @property string|null $updated_at
 *
 * @property User $approver0
 * @property Vehicle $vehicle
 */
class VehicleRequest extends \yii\db\ActiveRecord
{
    use softDeleteTrait;
    const ROLE_STUDENT = 10;
    const ROLE_TEACHER = 20;
    const USER_ID = 1;
    const STATUS_APPROVED = 20;
    const STATUS_REQUEST = 10;
    const STATUS_REJECT = -1;
    const STATUS_REVOKE = -2;
    const STATUS_DELETE = -3;
    
    
    public function getRoleList(){
        return [
            self::ROLE_STUDENT=> 'นักเรียน',
            self::ROLE_TEACHER=> 'ครู',
        ];
    }

    public function getRoleName(){
        $roles = self::getRoleList();
        return isset($roles[$this->requested_role]) ? $roles[$this->requested_role] : 'unknown';
    }

    public function getStatusList(){
        return [
            self::STATUS_APPROVED => 'อนุมัติ',
            self::STATUS_REQUEST => 'รอตอบรับ',
            self::STATUS_REJECT => 'ไม่ผ่าน',
            self::STATUS_REVOKE => 'เปลี่ยนเจ้าของ',
        ];
    }

    public function getStatusName(){
        $status = self::getStatusList();
        switch($this->status){
            case 20:
                $output = badge('success',$status[$this->status]);
                break;
            case 10:
                $output = badge('info',$status[$this->status]);
                break;
            case -1:
                $output = badge('danger',$status[$this->status]);
                break;
            case -2:
                $output = badge('warning',$status[$this->status]);
                break;
        }
        return isset($status[$this->status]) ? $output : 'unknown';
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle_request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vehicle_id', 'requested_id', 'requested_role', 'creator'], 'required'],
            [['vehicle_id', 'requested_id', 'requested_role', 'approver', 'status', 'creator', 'updater'], 'default', 'value' => null],
            [['vehicle_id', 'requested_id', 'requested_role', 'approver', 'status', 'creator', 'updater'], 'integer'],
            [['approved_at', 'created_at', 'updated_at'], 'safe'],
            [['approver'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['approver' => 'id']],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vehicle::class, 'targetAttribute' => ['vehicle_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vehicle_id' => 'Vehicle ID',
            'requested_id' => 'Requested ID',
            'requested_role' => 'สถานะผู้ยื่นคำร้อง',
            'approver' => 'Approver',
            'approved_at' => 'Approved At',
            'status' => 'สถานะใบคำร้อง',
            'creator' => 'Creator',
            'created_at' => 'Created At',
            'updater' => 'Updater',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Approver0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApproverInfo()
    {
        return $this->hasOne(User::class, ['id' => 'approver']);
    }

    public function getCreatorInfo()
    {
        return $this->hasOne(User::class, ['id' => 'creator']);
    }

    public function getUpdaterInfo()
    {
        return $this->hasOne(User::class, ['id' => 'updater']);
    }

    public function getEmployeeInfo(){
        return $this->hasOne(Employee::class,['id' => 'requested_id']);
    }

    /**
     * Gets query for [[Vehicle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(Vehicle::class, ['id' => 'vehicle_id']);
    }
}
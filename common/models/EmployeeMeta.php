<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee_meta".
 *
 * @property int $id
 * @property int $employee_id
 * @property string|null $meta_key
 * @property string|null $meta_value
 *
 * @property Employee $employee
 */
class EmployeeMeta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee_meta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id'], 'required'],
            [['employee_id'], 'default', 'value' => null],
            [['employee_id'], 'integer'],
            [['meta_value'], 'string'],
            [['meta_key'], 'string', 'max' => 255],
            [['employee_id', 'meta_key'], 'unique', 'targetAttribute' => ['employee_id', 'meta_key']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => 'Employee ID',
            'meta_key' => 'Meta Key',
            'meta_value' => 'Meta Value',
        ];
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::class, ['id' => 'employee_id']);
    }
}

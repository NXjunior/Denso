<?php

namespace common\models;

use Yii;
use common\models\Province;
/**
 * This is the model class for table "vehicle".
 *
 * @property int $id
 * @property string $plate
 * @property string $province
 * @property int $type
 * @property string $brand
 * @property string $model
 * @property string $color
 * @property string|null $image
 * @property string|null $plate_image
 *
 * @property VehicleRequest[] $vehicleRequests
 */
class Vehicle extends \yii\db\ActiveRecord
{

    const TYPE_BIKE = 10;
    const TYPE_CAR = 20;

    public static function getTypeList(){
        return [
            self::TYPE_BIKE => 'จักรยานยนต์',
            self::TYPE_CAR => 'รถยนต์',
        ];
    }

    public function getTypeName(){
        $types = self::getTypeList();
        return isset($types[$this->type])?$types[$this->type] : 'unknown';
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plate', 'province', 'type', 'brand', 'model', 'color'], 'required'],
            [['type'], 'default', 'value' => null],
            [['type'], 'integer'],
            [['plate', 'province', 'brand', 'model', 'color', 'image', 'plate_image'], 'string', 'max' => 255],
            [['plate', 'province'], 'unique', 'targetAttribute' => ['plate', 'province']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plate' => 'Plate',
            'province' => 'Province',
            'type' => 'Type',
            'brand' => 'Brand',
            'model' => 'Model',
            'color' => 'Color',
            'image' => 'Image',
            'plate_image' => 'Plate Image',
        ];
    }

    /**
     * Gets query for [[VehicleRequests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleRequests()
    {
        return $this->hasMany(VehicleRequest::class, ['vehicle_id' => 'id']);
    }
    public function getProvinceInfo(){
        return $this->hasOne(
            Province::class,['id' => 'province']
        );
    }
}

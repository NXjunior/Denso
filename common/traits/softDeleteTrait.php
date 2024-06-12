<?php 

namespace common\traits;

trait softDeleteTrait
{
    public static function find()
    {
        return parent::find()->andWhere(['<>',static::tableName().'.status',self::STATUS_DELETE]);
    }
}
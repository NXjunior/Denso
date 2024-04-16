<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "logs".
 *
 * @property int $id
 * @property string|null $type
 * @property string|null $logs
 */
class Logs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['logs'], 'safe'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'logs' => 'Logs',
        ];
    }
}

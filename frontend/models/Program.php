<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "program".
 *
 * @property int $id
 * @property string $name
 * @property string $location
 * @property string $timestamp
 * @property string $date
 * @property string $start_time
 * @property string $end_time
 * @property string $discription
 * @property int $init_weight
 * @property string $priority
 */
class Program extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'program';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['timestamp', 'date', 'start_time', 'end_time'], 'safe'],
            [['discription'], 'string'],
            [['init_weight'], 'integer'],
            [['name', 'location', 'priority'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'location' => 'Location',
            'timestamp' => 'Timestamp',
            'date' => 'Date',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'discription' => 'Discription',
            'init_weight' => 'Init Weight',
            'priority' => 'Priority',
        ];
    }
}

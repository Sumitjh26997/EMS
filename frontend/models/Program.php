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
 * @property string $description
 * @property int $init_weight
 * @property string $priority
 * @property string $type
 * @property int $program_weight
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
            [['description'], 'string'],
            [['init_weight', 'program_weight'], 'integer'],
            [['name', 'location', 'priority'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 20],
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
            'description' => 'Description',
            'init_weight' => 'Init Weight',
            'priority' => 'Priority',
            'type' => 'Type',
            'program_weight' => 'Program Weight',
        ];
    }
}

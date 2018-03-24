<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "engaged".
 *
 * @property int $id
 * @property int $minister_id
 * @property int $program_id
 * @property int $attending
 * @property string $reason
 */
class Engaged extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'engaged';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['minister_id', 'program_id'], 'required'],
            [['minister_id', 'program_id', 'attending'], 'integer'],
            [['reason'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'minister_id' => 'Minister ID',
            'program_id' => 'Program ID',
            'attending' => 'Attending',
            'reason' => 'Reason',
        ];
    }
}

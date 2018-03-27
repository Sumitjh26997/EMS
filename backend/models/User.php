<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $Name
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $ministry
 * @property string $designation
 * @property string $image
 * @property string $dob
 * @property string $sex
 * @property string $location
 * @property string $party
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Name', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['dob'], 'safe'],
            [['Name', 'password_hash', 'password_reset_token', 'email', 'ministry', 'designation', 'image', 'location', 'party'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['sex'], 'string', 'max' => 1],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Name' => 'Name',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'ministry' => 'Ministry',
            'designation' => 'Designation',
            'image' => 'Image',
            'dob' => 'Dob',
            'sex' => 'Sex',
            'location' => 'Location',
            'party' => 'Party',
        ];
    }
}

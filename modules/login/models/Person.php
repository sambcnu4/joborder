<?php

namespace app\modules\login\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $id
 * @property int $login_id
 * @property string $firstname ชื่อ
 * @property string $lastname สกุล
 *
 * @property Login $login
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login_id', 'firstname', 'lastname'], 'required'],
            [['login_id'], 'integer'],
            [['firstname', 'lastname','username', 'password'], 'string', 'max' => 45],
            [['login_id'], 'exist', 'skipOnError' => true, 'targetClass' => Login::className(), 'targetAttribute' => ['login_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login_id' => 'Login ID',
            'firstname' => 'ชื่อ',
            'lastname' => 'สกุล',
            'username' => 'username',
            'password' => 'password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogin()
    {
        return $this->hasOne(Login::className(), ['id' => 'login_id']);
    }
}

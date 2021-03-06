<?php

namespace app\modules\login\models;

use Yii;

/**
 * This is the model class for table "logins".
 *
 * @property int $id
 * @property string $username username
 * @property string $password password
 *
 * @property Person[] $people
 */
class Logins extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logins';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'username',
            'password' => 'password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['login_id' => 'id']);
    }
}

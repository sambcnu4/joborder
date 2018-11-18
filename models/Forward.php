<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forward".
 *
 * @property int $id
 * @property string $forward_name ประเภทการดำเนินการ
 * @property string $color สี
 *
 * @property Actions[] $actions
 */
class Forward extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forward';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['forward_name'], 'required'],
            [['forward_name'], 'string', 'max' => 150],
            [['color'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'forward_name' => 'ประเภทการดำเนินการ',
            'color' => 'สี',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActions()
    {
        return $this->hasMany(Actions::className(), ['forward_id' => 'id']);
    }
}

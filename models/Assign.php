<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "assign".
 *
 * @property int $id
 * @property string $assign_name แผนกที่รับมอบหมาย
 * @property string $color สี
 * @property string $line_token รหัสกลุ่ม Line
 * @property string $email อีเมมล์กลาง
 * @property string $tel เบอร์โทร
 *
 * @property Orders[] $orders
 */
class Assign extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'assign';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['assign_name'], 'required'],
                [['assign_name', 'color', 'line_token', 'email', 'tel'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'assign_name' => 'แผนกที่รับมอบหมาย',
            'color' => 'สี',
            'line_token' => 'รหัสกลุ่ม Line',
            'email' => 'อีเมมล์กลาง',
            'tel' => 'เบอร์โทร',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders() {
        return $this->hasMany(Orders::className(), ['assign_id' => 'id']);
    }

}

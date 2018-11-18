<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "approved".
 *
 * @property int $id
 * @property int $orders_id งานที่รับการอนุมัติ
 * @property string $date_ap วันที่อนุมัติ
 * @property string $approve_name ชื่อผู้อนุมัติ
 * @property string $comment ความคิดเห็น
 *
 * @property Orders $orders
 */
class Approved extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'approved';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orders_id'], 'required'],
            [['orders_id'], 'integer'],
            [['comment','status'], 'string'],
            [['date_ap'], 'string', 'max' => 45],
            [['approve_name'], 'string', 'max' => 150],
            [['orders_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['orders_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orders_id' => 'งานที่รับการอนุมัติ',
            'date_ap' => 'วันที่อนุมัติ',
            'approve_name' => 'ชื่อผู้อนุมัติ',
            'comment' => 'ความคิดเห็น',
            'status' => 'สถานะ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasOne(Orders::className(), ['id' => 'orders_id']);
    }
}

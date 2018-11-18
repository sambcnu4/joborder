<?php

namespace app\models;
use Yii;

use yii\web\UploadedFile;
use yii\helpers\Html;
use app\models\Assign;
/**
 * This is the model class for table "actions".
 *
 * @property int $id
 * @property int $orders_id งานที่ดำเนินการ
 * @property string $operator_name ผู้ดำเนินการ
 * @property int $forward_id ประเภทการดำเนินการ
 * @property string $forward_no เลขที่การส่งต่อ
 * @property string $cause สาเหตุ
 * @property string $process วิธีการแก้ไข
 * @property string $date_start วันเริ่มดำเนินการ
 * @property string $date_end วันดำเนินการเสร็จ
 * @property string $sparepart อะไหล่
 * @property string $pr_no เลขที่ใบขอซื้อ
 * @property int $cost ค่าใช้จ่าย
 * @property int $wage ค่าแรง
 * @property string $remask หมายเหตุ
 * @property string $photo รูป
 * @property string $file ไฟล์
 *
 * @property Forward $forward
 * @property Orders $orders
 */
class Actions extends \yii\db\ActiveRecord {

    public $upload_foler = 'uploads/action/img';
    public $upload_foler_file = 'uploads/action/file';

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'actions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['orders_id'], 'required'],
                [['orders_id', 'forward_id', 'cost', 'wage'], 'integer'],
                [['process', 'sparepart', 'remask'], 'string'],
                [['operator_name', 'cause'], 'string', 'max' => 150],
                [['forward_no', 'date_start', 'date_end', 'pr_no'], 'string', 'max' => 45],
                [['forward_id'], 'exist', 'skipOnError' => true, 'targetClass' => Forward::className(), 'targetAttribute' => ['forward_id' => 'id']],
                [['orders_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['orders_id' => 'id']],
                [['photo'], 'file',
                'skipOnEmpty' => true,
                'extensions' => 'png,jpg'
            ],
                [['file'], 'file',
                'skipOnEmpty' => true,
                'extensions' => 'pdf'
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'orders_id' => 'งานที่ดำเนินการ',
            'operator_name' => 'ผู้ดำเนินการ',
            'forward_id' => 'ประเภทการดำเนินการ',
            'forward_no' => 'เลขที่การส่งต่อ',
            'cause' => 'สาเหตุ',
            'process' => 'วิธีการแก้ไข',
            'date_start' => 'วันเริ่มดำเนินการ',
            'date_end' => 'วันดำเนินการเสร็จ',
            'sparepart' => 'อะไหล่',
            'pr_no' => 'เลขที่ใบขอซื้อ',
            'cost' => 'ค่าใช้จ่าย',
            'wage' => 'ค่าแรง',
            'remask' => 'หมายเหตุ',
            'photo' => 'รูป',
            'file' => 'ไฟล์',
            //orders
            'date_at' => 'วันที่แจ้ง',
            'order_no' => 'เลขที่ใบแจ้งงาน',
            'assign_id' => 'แจ้งไปยังหน่วยงาน',
            'user_request' => 'ชื่อผู้แจ้งงาน',
            'departments_id' => 'หน่วยงานผู้แจ้งงาน',
            'location' => 'สถานที่',
            'asset_no' => 'รหัสทรัพย์สิน',
            'equipment' => 'ชนิดเครื่องจักร-อุปกรณ์',
            'title' => 'หัวข้อ',
            'details' => 'รายละเอียด',
            'hc_job' => 'เลขที่งาน(JOB)',
            'status_id' => 'สถานะ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForward() {
        return $this->hasOne(Forward::className(), ['id' => 'forward_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders() {
        return $this->hasOne(Orders::className(), ['id' => 'orders_id']);
    }

    /**
     * Uploads photo
     */
    public function upload($model, $attribute) {
        $photo = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadPath();
        if ($this->validate() && $photo !== null) {

            $fileName = md5($photo->baseName . time()) . '.' . $photo->extension;
            if ($photo->saveAs($path . $fileName)) {
                return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getUploadPath() {
        return Yii::getAlias('@webroot') . '/' . $this->upload_foler . '/';
    }

    public function getUploadUrl() {
        return Yii::getAlias('@web') . '/' . $this->upload_foler . '/';
    }

    public function getPhotoViewer() {
        return empty($this->photo) ? Yii::getAlias('@web') . '/uploads/img/nopicture.jpg' : $this->getUploadUrl() . $this->photo;
    }

    /**
     * Uploads files
     */
    public function uploadFiles($model, $attribute) {
        $file = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadFilePath();
        if ($this->validate() && $file !== null) {

            $filesName = md5($file->baseName . time()) . '.' . $file->extension;
            if ($file->saveAs($path . $filesName)) {
                return $filesName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getUploadFilePath() {
        return Yii::getAlias('@webroot') . '/' . $this->upload_foler_file . '/';
    }

    public function getUploadFileUrl() {
        return Yii::getAlias('@web') . '/' . $this->upload_foler_file . '/';
    }

    public function getFileViewer() {
        //return empty($this->file) ;
        return empty($this->file) ? Yii::getAlias('@web') . '/uploads/img/nofile.png' : $this->getUploadFileUrl() . $this->file;
    }

}

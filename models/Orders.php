<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\Html;
use app\models\Assign;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $date_at วันที่แจ้ง
 * @property string $order_no เลขที่ใบแจ้งงาน
 * @property int $assign_id แจ้งไปยังหน่วยงาน
 * @property string $user_request ชื่อผู้แจ้งงาน
 * @property int $departments_id หน่วยงานผู้แจ้งงาน
 * @property string $location สถานที่
 * @property string $asset_no รหัสทรัพย์สิน
 * @property string $equipment ชนิดเครื่องจักร-อุปกรณ์
 * @property string $title หัวข้อ
 * @property string $details รายละเอียด
 * @property string $hc_job เลขที่งาน(JOB)
 * @property string $photo รูป
 * @property string $file ไฟล์
 * @property int $status_id สถานะ
 *
 * @property Actions[] $actions
 * @property Approved[] $approveds
 * @property Assign $assign
 * @property Departments $departments
 * @property Status $status
 */
class Orders extends \yii\db\ActiveRecord {

    //-------------->
    public $upload_foler = 'uploads/order/img';
    public $upload_foler_file = 'uploads/order/file';

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['assign_id', 'user_request', 'departments_id', 'title'], 'required'],
                [['assign_id', 'departments_id', 'status_id'], 'integer'],
                [['details'], 'string'],
                [['date_at', 'order_no', 'asset_no', 'hc_job'], 'string', 'max' => 45],
                [['user_request'], 'string', 'max' => 100],
                [['location', 'equipment', 'title'], 'string', 'max' => 200],
                [['assign_id'], 'exist', 'skipOnError' => true, 'targetClass' => Assign::className(), 'targetAttribute' => ['assign_id' => 'id']],
                [['departments_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['departments_id' => 'id']],
                [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
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
            'photo' => 'รูป',
            'file' => 'ไฟล์',
            'status_id' => 'สถานะ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActions() {
        return $this->hasMany(Actions::className(), ['orders_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApproveds() {
        return $this->hasMany(Approved::className(), ['orders_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssign() {
        return $this->hasOne(Assign::className(), ['id' => 'assign_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments() {
        return $this->hasOne(Departments::className(), ['id' => 'departments_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus() {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
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
        return empty($this->file) ? Yii::getAlias('@web') . '/uploads/img/nofile.png' : $this->getUploadFileUrl() . $this->file;
    }

    /*
     * Line 
     */

    public function notifyLine() {

        // ดึง Token มาจากตาราง assign
        $lineapi = $this->assign->line_token;

        //Server link
        //$srvlink = "http://172.16.20.34";
        $srvlink = "http://113.53.233.86";
        //ดึงข้อคว่าม
        $msg0 = "\r\nสถานะงาน " . $this->status->status_name; //สถานะ
        $msg1 = "\r\nผู้แจ้งงาน: " . $this->user_request;  //ผู้แจ้งงาน
        $msg2 = "\r\nหน่วยงาน: " . $this->departments->department_name;  //หน่วยงาน
        $msg3 = "\r\nหัวข้อ: " . $this->title;  //หัวข้อ
        $msg4 = "\r\nเลขที่: " . $this->order_no; //เลขที่
        $msg5 = "\r\nวันเวลาที่แจ้ง: " . $this->date_at;  //วันเวลาที่แจ้ง
        $msg6 = "\r\nชนิดอุปกรณ์: " . $this->equipment;  //ชนิดอุปกรณ์
        $msg7 = "\r\nรหัสทรัพย์สิน: " . $this->asset_no;  //รหัสทรัพย์สิน
        $msg8 = "\r\nลิ้งค์: " . $srvlink . Yii::getAlias('@web') . '/orders/' . $this->id;  //รหัสทรัพย์สิน
        $msg9 = $srvlink . $this->photoViewer;  //
        $imageFile = curl_file_create($msg9);
        //ข้อคว่าม
        $massage = $msg0 . $msg1 . $msg2 . $msg3 . $msg4 . $msg5 . $msg6 . $msg7 . $msg8;
        $mms = trim($massage);
        //Line sticker
        $stickerPkg = 2; //stickerPackageId
        $stickerId = 150; //stickerId
        //
        $imageThumbnail = $this->photoViewer; //รูป Thumbnail,
        $imageFullsize = $this->photoViewer; //รูป Fullsize
        // ข้อความที่จะส่ง
        $data_massage = [
            'message' => $mms,
            'stickerPackageId' => $stickerPkg,
            'stickerId' => $stickerId,
            'imageFile' => $imageFile,
                //'imageThumbnail' => $imageThumbnail,
                //'imageFullsize' => $imageFullsize  
        ];
        //การทำงานของระบบ
        date_default_timezone_set("Asia/Bangkok");
        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        //curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=$mms&imageThumbnail=$imageThumbnail&imageFullsize=$imageFullsize");
        curl_setopt($chOne, CURLOPT_POSTFIELDS, http_build_query($data_massage)); //โพสท์ข้อความ
        curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $lineapi . '',);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);
        if (curl_error($chOne)) {
            echo 'error:' . curl_error($chOne);
        } else {
            $result_ = json_decode($result, true);
            echo "status : " . $result_['status'];
            echo "message : " . $result_['message'];
        }
        curl_close($chOne);
    }

}

<?php

namespace app\controllers;

use Yii;
use app\models\Orders;
use app\models\OrdersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Url;
use app\models\Status;
use app\models\Assign;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'events' => $events
        ]);
    }

    public function actionCalendar() {
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $events = [];
        $lists = Orders::find()->all();
        foreach ($lists as $list) {
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $list->id;
            $event->url = Url::to(['orders/view', 'id' => $list->id]);  // ทำ link view
            //$event->title = $list->title.'-'.$list->booking_name.'-'.$list->carBookingStatus->car_booking_status;
            $event->title = $list->assign->assign_name . '->' . $list->user_request . '->' . $list->title . '->' . $list->location;  // ชื่อบน Lable
            $event->color = $list->status->color; // สีพื้นหลังตามสถานะ
            $event->start = $list->date_at; // วันเริ่ม
            //$event->end = $list->date_time_end; // วันสิ้นสุด
            //$event->startEditable = FALSE;
            //$event->constraint = $list->id;
            $events[] = $event;
        }
        return $this->render('calendar', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'events' => $events
        ]);
    }

    public function actionChart() {
        return $this->render('chart', [
                    'line' => $line,
                    'dataProvider' => $dataProvider,
                    'events' => $events
        ]);
    }

    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Orders();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->photo = $model->upload($model, 'photo');
            $model->file = $model->uploadFiles($model, 'file'); //
            $model->save();
            //$model->notifyLine($id); // ส่งไลน์ตามกลุ่มต่างๆ
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->photo = $model->upload($model, 'photo');
            $model->file = $model->uploadFiles($model, 'file'); //
            $model->save();
           // $model->notifyLine($id); // ส่งไลน์ตามกลุ่มต่างๆ
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

<?php

namespace app\controllers;

use Yii;
use app\models\Actions;
use app\models\ActionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Url;
//
use app\models\Status;
use app\models\Assign;
//
use app\models\Orders;

/**
 * ActionsController implements the CRUD actions for Actions model.
 */
class ActionsController extends Controller {

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
     * Lists all Actions models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ActionsSearch();
        //$searchModelOrders = new ActionsSearch();
        
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$dataProviderOrders = $searchModelOrders->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    //'searchModelOrders' => $searchModelOrders,
                    'dataProvider' => $dataProvider,
                    //'dataProviderOrders' => $dataProviderOrders,
        ]);
    }

    /**
     * Displays a single Actions model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    //'orders' => $this->findModelOrders($id), //************
        ]);
    }

    /**
     * Creates a new Actions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * 
     * 
     */
    public function actionCreate() {
        $model = new Actions();

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

    /*
      public function actionCreate() {
      $model = new Actions();
      $orders = new Orders();

      if ($model->load(Yii::$app->request->post()) && $model->validate()) {
      $model->photo = $model->upload($model, 'photo');
      $model->file = $model->uploadFiles($model, 'file'); //
      $model->save();
      //$model->notifyLine($id); // ส่งไลน์ตามกลุ่มต่างๆ
      return $this->redirect(['view', 'id' => $model->id]);
      }

      return $this->render('create', [
      'model' => $model,
      'orders' => $orders,
      ]);
      }
     */

    /**
     * Updates an existing Actions model.
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
     * Deletes an existing Actions model.
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
     * Finds the Actions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Actions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Actions::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    protected function findModelOrders($id) {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

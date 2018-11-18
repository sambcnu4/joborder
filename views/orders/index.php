<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\helpers\ArrayHelper;
//
use app\models\Assign;
use app\models\Status;
//
use kartik\widgets\DateTimePicker;
use yii\web\UploadedFile;
use kartik\widgets\FileInput;
use kartik\grid\GridView; //composer require kartik-v/yii2-grid "dev-master"
use yii2fullcalendar\yii2fullcalendar;
//use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แจ้งงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>
    <p>
        <?= Html::a('เพิ่มการ' . $this->title, ['create'], ['class' => 'btn btn-danger']) ?>
    </p>

    <div class="actions-form">
        <div class="box box-success box-solid">
            <div class="box-header">
                <div class="box-title"><?= $this->title ?></div>
            </div>
            <div class="box-body"> 

                
                <?=
                GridView::widget([
                    'id'=>'id',
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                        //'id',
                        'date_at',
                        'order_no',
                        //'assign_id',
                        [
                            'attribute' => 'assign_id',
                            'format' => 'html',
                            'value' => function ($model) {
                                return '<div class="lable" style="color:' . $model->assign->color . ';">' . $model->assign->assign_name . '</div>';
                                //return $model->assign->assign_name;
                            },
                            'filter' => Html::activeDropDownList($searchModel, 'assign_id', ArrayHelper::map(Assign::find()->all(), 'id', 'assign_name'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
                        ],
                        'user_request',
                        //'departments_id',
                        //'location',
                        //'asset_no',
                        //'equipment',
                        'title',
                        //'details:ntext',
                        //'hc_job',
                        //'photo',
                        //'file',
                        //'status_id',
                        [
                            'attribute' => 'status_id',
                            'format' => 'html',
                            'value' => function ($model) {
                                return '<span class="badge" style="background-color:' . $model->status->color . ';"><b>' . $model->status->status_name . '</b></span>';
                                //return '<p class="lable" style="color:' . $model->status->color  . ';">' . $model->status->status_name . '</p>';
                            },
                            'filter' => Html::activeDropDownList($searchModel, 'status_id', ArrayHelper::map(Status::find()->all(), 'id', 'status_name'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
                        ],
                        //['class' => 'yii\grid\ActionColumn'],
                        [
                            'class' => 'kartik\grid\ActionColumn',
                            'options' => ['style' => 'width:120px;'],
                            'buttonOptions' => ['class' => 'btn btn-default'],
                            'template' => '<div class="btn-group btn-group-xs text-center" role="group"> {view} {update} {delete}</div>'
                        ],
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>

</div>
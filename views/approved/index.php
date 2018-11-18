<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView; //composer require kartik-v/yii2-grid "dev-master"
use yii\helpers\ArrayHelper;
use app\models\Status;
use app\models\Orders;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ApprovedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Approveds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approved-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
    <div class="actions-form">
        <div class="box box-success box-solid">
            <div class="box-header">
                <div class="box-title"><?= $this->title ?></div>
            </div>
            <div class="box-body"> 
                <p>
                    <?= Html::a('Create Approved', ['create'], ['class' => 'btn btn-danger']) ?>
                </p>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                        //'id',
                        'orders_id',
                            [
                            'attribute' => 'orders_id',
                            'format' => 'html',
                            'value' => function ($model) {
                                return '<div class="lable" style="color:' . $model->orders->status->color . ';">' . $model->orders->order_no . '</div>';
                                //return $model->assign->assign_name;
                            },
                            'filter' => Html::activeDropDownList($searchModel, 'orders_id', ArrayHelper::map(Orders::find()->all(), 'id', 'order_no'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
                        ],
                            [
                            'attribute' => 'status',
                            'format' => 'html',
                            'value' => function ($model) {
                                return '<div class="lable" style="color:' . $model->orders->status->color . ';">' . $model->orders->status->status_name . '</div>';
                                //return $model->assign->assign_name;
                            },
                            //'filter' => Html::activeDropDownList($searchModel, 'status_name', ArrayHelper::map(Status::find()->all(), 'id', 'status_name'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
                        ],
                        'date_ap',
                        'approve_name',
                        'comment:ntext',
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


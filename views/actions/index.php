<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Orders;
use app\models\Forward;
use app\models\Assign;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actions-index">
    <div class="actions-view">
        <div class="actions-form">
            <div class="box box-success box-solid">
                <div class="box-header">
                    <div class="box-title"><?= $this->title ?></div>
                </div>
                <div class="box-body">
                    <p>
                        <?= Html::a('เพิ่มการ' . $this->title, ['create'], ['class' => 'btn btn-danger']) ?>
                    </p>

                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                            //'id',
                            //'orders_id',
                            [
                                'attribute' => 'orders_id',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->orders->order_no;
                                    //return $model->assign->assign_name;
                                },
                            //'filter' => Html::activeDropDownList($searchModel, 'assign_id', ArrayHelper::map(Assign::find()->all(), 'id', 'assign_name'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
                            ],
                                [
                                'attribute' => 'user_request',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->orders->user_request;
                                    //return $model->assign->assign_name;
                                },
                                'filter' => $searchModel
                                //'filter' => Html::activeDropDownList($searchModel, 'id', ArrayHelper::map(Orders::find()->all(), 'id', 'user_request'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
                            ],
                            'operator_name',
                            //'forward_id',
                            [
                                'attribute' => 'forward_id',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->forward->forward_name;
                                    //return $model->assign->assign_name;
                                },
                            //'filter' => Html::activeDropDownList($searchModel, 'assign_id', ArrayHelper::map(Assign::find()->all(), 'id', 'assign_name'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
                            ],
                            //'forward_no',
                            'cause',
                            //'process:ntext',
                            'date_start',
                            'date_end',
                            //'sparepart:ntext',
                            //'pr_no',
                            //'cost',
                            //'wage',
                            //'remask:ntext',
                            //'photo',
                            //'file',
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);
                    ?>
                </div>

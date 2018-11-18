<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Orders;
use app\models\Assign;
use app\models\Status;
use app\models\Actions;
use slavkovrn\prettyphoto\PrettyPhotoWidget; //รูป

/* @var $this yii\web\View */
/* @var $model app\models\Actions */

$this->title = 'งานของ:' . $model->orders->user_request . ' | เลขที่งาน:' . $model->orders->order_no . ' | ผู้ดำเนินการ:' . $model->operator_name;
$this->params['breadcrumbs'][] = ['label' => 'จัดการงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->orders->order_no;
?>
<div class="col-md-4">
    <div class="actions-view">
        <div class="actions-form">
            <div class="box box-success box-solid">
                <div class="box-header">
                    <div class="box-title">รายละเอียดงาน: <?= $model->orders->order_no ?></div>
                </div>
                <div class="box-body">
                    <div class="img-thumbnail"> 
                        <?php
                        echo PrettyPhotoWidget::widget([
                            'id' => $model->orders->photo, // id of plugin should be unique at page
                            'class' => 'galary', // class of plugin to define a style
                            'width' => '300px',
                            'images' => [
                                1 => [
                                    'src' => $model->orders->photoViewer,
                                    'title' => 'กดขยาย',
                                ],
                            ]
                        ]);
                        ?>
                    </div>
                    <hr>
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                                [
                                'attribute' => 'status_id',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return '<span class="badge" style="background-color:' . $model->orders->status->color . ';">' . $model->orders->status->status_name . '</span>';
                                },
                            ],
                                [
                                'attribute' => 'assign_id',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return '<div class="text" style="color:' . $model->orders->assign->color . ';">' . $model->orders->assign->assign_name . '</div>';
                                },
                            ],
                                [
                                'attribute' => 'date_at',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->orders->date_at;
                                },
                            ],
                                [
                                'attribute' => 'order_no',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->orders->order_no;
                                },
                            ],
                                [
                                'attribute' => 'user_request',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->orders->user_request;
                                },
                            ],
                                [
                                'attribute' => 'departments_id',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->orders->departments->department_name;
                                },
                            ],
                                [
                                'attribute' => 'asset_no',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->orders->asset_no;
                                },
                            ],
                                [
                                'attribute' => 'equipment',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->orders->equipment;
                                },
                            ],
                                [
                                'attribute' => 'title',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->orders->title;
                                },
                            ],
                                [
                                'attribute' => 'details',
                                'format' => 'ntext',
                                'value' => function ($model) {
                                    return $model->orders->details;
                                },
                            ],
                                [
                                'attribute' => 'hc_job',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->orders->hc_job;
                                },
                            ],
                                [
                                'attribute' => 'location',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->orders->location;
                                },
                            ],
                                ['attribute' => 'file',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return Html::a('Download ไฟล์แนบ', $model->orders->fileViewer, [
                                                'class' => 'btn btn-primary btn-sm',
                                                'target' => '_blank',
                                    ]);
                                }
                            ],
                        ],
                    ])
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="actions-form">
        <div class="box box-success box-solid">
            <div class="box-header">
                <div class="box-title"><?= $this->title ?></div>
            </div>
            <div class="box-body">
                <p>
                    <?= Html::a('แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?=
                    Html::a('ลบ', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ])
                    ?>
                </p>
                <div class="box-body">
                    <div class="img-thumbnail"> 
                        <?php
                        echo PrettyPhotoWidget::widget([
                            'id' => $model->photo, // id of plugin should be unique at page
                            'class' => 'galary', // class of plugin to define a style
                            'width' => '300px',
                            'images' => [
                                1 => [
                                    'src' => $model->photoViewer,
                                    'title' => 'กดขยาย',
                                ],
                            ]
                        ]);
                        ?>
                    </div>
                    <hr>
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            //'id',
                            //'orders_id',
                                [
                                'attribute' => 'orders_id',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->orders->order_no;
                                },
                            ],
                            'operator_name',
                            //'forward_id',
                            [
                                'attribute' => 'forward_id',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return $model->forward->forward_name;
                                },
                            ],
                            'forward_no',
                            'cause',
                            'process:ntext',
                            'date_start',
                            'date_end',
                            'sparepart:ntext',
                            'pr_no',
                            'cost',
                            'wage',
                            'remask:ntext',
                            //'photo',
                            //'file',
                            ['attribute' => 'file',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return Html::a('Download ไฟล์แนบ', $model->fileViewer, [
                                                'class' => 'btn btn-primary btn-sm',
                                                'target' => '_blank',
                                    ]);
                                }
                            ],
                        ],
                    ])
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//
use app\models\Assign;
use app\models\Status;
use slavkovrn\prettyphoto\PrettyPhotoWidget; //รูป

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = $model->user_request . ' | ' . $model->title . ' | ' . $model->order_no;
$this->params['breadcrumbs'][] = ['label' => 'ตารางแจ้งงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->user_request;
?>
<div class="orders-view">
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
                <div class="img-thumbnail"> 
                    <?php
                    echo PrettyPhotoWidget::widget([
                        'id' => $model->photo, // id of plugin should be unique at page
                        'class' => 'galary', // class of plugin to define a style
                        'width' => '300px', // width of image visible in widget (omit - initial width)
                        //'height' => '180px',
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
                            [
                            'attribute' => 'status_id',
                            'format' => 'html',
                            'value' => function ($model) {
                                return '<span class="badge" style="background-color:' . $model->status->color . ';">' . $model->status->status_name . '</span>';
                                //return '<p class="lable" style="color:' . $model->status->color  . ';">' . $model->status->status_name . '</p>';
                            },
                        ],
                            [
                            'attribute' => 'assign_id',
                            'format' => 'html',
                            'value' => function ($model) {
                                return '<div class="text" style="color:' . $model->assign->color . ';">' . $model->assign->assign_name . '</div>';
                                //return $model->assign->assign_name;
                            },
                        ],
                        'date_at',
                        'order_no',
                        //'assign_id',
                        'user_request',
                        //'departments_id',
                        [
                            'attribute' => 'departments_id',
                            'format' => 'html',
                            'value' => function ($model) {
                                return '<div class="text" style="color:' . $model->departments->color . ';">' . $model->departments->department_name . '</div>';
                                //return $model->assign->assign_name;
                            },
                        ],
                        'asset_no',
                        'equipment',
                        'title',
                        'details:ntext',
                        'hc_job',
                        'location',
                        //'photo',
                        /*
                          ['attribute' => 'photo',
                          'format' => 'html',
                          'value' => function ($model) {
                          return PrettyPhotoWidget::widget([
                          'id' => $model->photo, // id of plugin should be unique at page
                          'class' => 'galary', // class of plugin to define a style
                          'width' => '50%', // width of image visible in widget (omit - initial width)
                          'height' => '150px',
                          'images' => [
                          1 => [
                          'src' => $model->photoViewer,
                          'title' => 'กดขยาย',
                          ],
                          ]
                          ]);
                          }
                          ],
                         */
                        //'file',
                        ['attribute' => 'file',
                            'format' => 'html',
                            'value' => function ($model) {
                                return Html::a('ดูไฟล์แนบ Click!! ', $model->fileViewer, [
                                            'class' => 'btn btn-primary btn-sm',
                                            'target' => '_blank',
                                ]);
                            }
                        ],
                    //'status_id',
                    ],
                ])
                ?>

            </div>
        </div>
    </div>
</div>


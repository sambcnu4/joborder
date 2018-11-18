<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView; //composer require kartik-v/yii2-grid "dev-master"
use yii\helpers\ArrayHelper;
use app\models\Assign;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AssignSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แผนกที่รับมอบหมาย';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assign-index">

    <div class="actions-form">
        <div class="box box-success box-solid">
            <div class="box-header">
                <div class="box-title"><?= $this->title ?></div>
            </div>
            <div class="box-body"> 
                <?php  // echo $this->render('_search', ['model' => $searchModel]);  ?>

                <p>
                    <?= Html::a('เพิ่มแผนกที่รับมอบหมาย', ['create'], ['class' => 'btn btn-danger']) ?>
                </p>

                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                        //'id',
                        //'assign_name',
                        [
                            'attribute' => 'assign_name',
                            'format' => 'html',
                            'value' => function ($model) {
                                return '<span class="badge" style="background-color:' . $model->color . ';"><b>' . $model->assign_name . '</b></span>';
                                //return '<p class="lable" style="color:' . $model->status->color  . ';">' . $model->status->status_name . '</p>';
                            },
                            'filter' => $searchModel,
                        ],
                        //'color',
                        'line_token',
                        'email:email',
                        'tel',
                        /*
                          [
                          'attribute' => 'color',
                          'format' => 'html',
                          'value' => function ($model) {
                          return '<span class="badge" style="background-color:' . $model->color . ';"><b>' . $model->color . '</b></span>';
                          //return '<p class="lable" style="color:' . $model->status->color  . ';">' . $model->status->status_name . '</p>';
                          },
                          'filter' => Html::activeDropDownList($searchModel, 'id', ArrayHelper::map(Assign::find()->all(), 'id', 'color'), ['class' => 'form-control', 'prompt' => 'ทั้งหมด...'])
                          ],
                         * 
                         */
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

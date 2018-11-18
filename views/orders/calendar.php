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

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ปฏิทินการแจ้งงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
    <p>
        <?= Html::a('เพิ่มการแจ้งงาน', ['create'], ['class' => 'btn btn-danger']) ?>
    </p>


    <div class="box box-success box-solid">

        <div class="box-header">
            <div class="box-title"> ปฏิทินการจอง</div>
        </div>

        <div class="box-body">  
            <!-- 
            <p>
            <?= Html::a('เพิ่มการแจ้งงาน', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            -->
            <?=
            yii2fullcalendar::widget([
                'options' => [
                    'lang' => 'th',
                ],
                'events' => $events,
                'id' => 'calendar',
            ]);
            ?>

        </div>
    </div>
</div>
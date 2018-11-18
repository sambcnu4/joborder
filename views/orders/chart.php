<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\helpers\ArrayHelper;
//
use app\models\Assign;
use app\models\Status;
//
use app\models\Orders;
use yii2learning\chartbuilder\ChartBuilder;


/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'กราฟแสดงจำนวนงาน แยกตามหน่วยงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>
    <div class="actions-form">
        <div class="box box-success box-solid">
            <div class="box-header">
                <div class="box-title"><?= $this->title ?></div>
            </div>
            <div class="box-body"> 

                <?=
                ChartBuilder::widget([
                    'chartId' => 'e1d8d443-8acd-4fe8-81a7-a7958d974539',
                ]);
                ?> 

            </div>
        </div>
    </div>

</div>
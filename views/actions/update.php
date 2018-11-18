<?php

use yii\helpers\Html;
use app\models\Orders;

/* @var $this yii\web\View */
/* @var $model app\models\Actions */

$this->title = 'งานของ:' . $model->orders->user_request . ' | เลขที่งาน:' . $model->orders->order_no . ' | ผู้ดำเนินการ:' . $model->operator_name;
$this->params['breadcrumbs'][] = ['label' => 'จัดการงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->orders->order_no, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="actions-update">

    <?=
    $this->render('_form', [
        'model' => $model,
        'modelorders' => $modelorders
    ])
    ?>

</div>

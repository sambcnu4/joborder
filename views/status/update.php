<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Status */

$this->title = 'สถานะงาน: ' . $model->status_name;
$this->params['breadcrumbs'][] = ['label' => 'สถานะงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->status_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="status-update">
    <div class="forward-view">
        <div class="actions-form">
            <div class="box box-success box-solid">
                <div class="box-header">
                    <div class="box-title"><?= $this->title ?></div>
                </div>
                <div class="box-body">
                    <?=
                    $this->render('_form', [
                        'model' => $model,
                    ])
                    ?>

                </div>
            </div>
        </div>
    </div>

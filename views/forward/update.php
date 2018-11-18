<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Forward */

$this->title = 'แก้ไข: ' . $model->forward_name;
$this->params['breadcrumbs'][] = ['label' => 'ประเภทการดำเนินการ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->forward_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="forward-update">
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

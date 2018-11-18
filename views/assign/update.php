<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Assign */

$this->title = 'แก้ไข: ' . $model->assign_name;
$this->params['breadcrumbs'][] = ['label' => 'แผนกที่รับมอบหมาย', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->assign_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="assign-update">
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


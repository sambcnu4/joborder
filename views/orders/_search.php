<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrdersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date_at') ?>

    <?= $form->field($model, 'order_no') ?>

    <?= $form->field($model, 'assign_id') ?>

    <?= $form->field($model, 'user_request') ?>

    <?php // echo $form->field($model, 'departments_id') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'asset_no') ?>

    <?php // echo $form->field($model, 'equipment') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'details') ?>

    <?php // echo $form->field($model, 'hc_job') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

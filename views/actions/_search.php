<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActionsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'orders_id') ?>

    <?= $form->field($model, 'operator_name') ?>

    <?= $form->field($model, 'forward_id') ?>

    <?= $form->field($model, 'forward_no') ?>

    <?php // echo $form->field($model, 'cause') ?>

    <?php // echo $form->field($model, 'process') ?>

    <?php // echo $form->field($model, 'date_start') ?>

    <?php // echo $form->field($model, 'date_end') ?>

    <?php // echo $form->field($model, 'sparepart') ?>

    <?php // echo $form->field($model, 'pr_no') ?>

    <?php // echo $form->field($model, 'cost') ?>

    <?php // echo $form->field($model, 'wage') ?>

    <?php // echo $form->field($model, 'remask') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'file') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

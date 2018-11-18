<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\color\ColorInput; //cmd-> composer require kartik-v/yii2-widgets "dev-master"
/* @var $this yii\web\View */
/* @var $model app\models\Approved */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="approved-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orders_id')->textInput() ?>

    <?= $form->field($model, 'date_ap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approve_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

   <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

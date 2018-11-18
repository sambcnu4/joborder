<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//
use kartik\color\ColorInput; //cmd-> composer require kartik-v/yii2-widgets "dev-master"

/* @var $this yii\web\View */
/* @var $model app\models\Assign */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assign-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'assign_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'line_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->widget(ColorInput::classname(), ['options' => ['placeholder' => 'เลือกสี'],]); ?>  

    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

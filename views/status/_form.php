<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\color\ColorInput; //cmd-> composer require kartik-v/yii2-widgets "dev-master"
/* @var $this yii\web\View */
/* @var $model app\models\Status */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="status-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status_name')->textInput(['maxlength' => true]) ?>
   
    <?= $form->field($model, 'color')->widget(ColorInput::classname(), ['options' => ['placeholder' => 'เลือกสี'],]);?>  

    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

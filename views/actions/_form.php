<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//
use app\models\Orders;
use app\models\Forward;
use app\models\Status;
//
use kartik\widgets\DateTimePicker;
use yii\web\UploadedFile;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Actions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actions-form">
    <div class="box box-primary box-solid">
        <div class="box-header">
            <div class="box-title"><?= $this->title ?></div>
        </div>
        <div class="box-body">  
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <div class="col-md-3">
                <div class="form-group">
                    <?=
                    $form->field($model, 'orders_id')->dropDownList(ArrayHelper::map(Orders::find()->all(), 'id', 'order_no'), [
                        'prompt' => 'กรุณาเลือก ...',])
                    ?>
                </div>
            </div>
            <div class="col-md-3"> 
                <div class="form-group">
                    <?= $form->field($model, 'operator_name')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="col-md-3"> 
                <div class="form-group">
                    <?=
                    $form->field($model, 'forward_id')->dropDownList(ArrayHelper::map(Forward::find()->all(), 'id', 'forward_name'), [
                            //'prompt' => 'กรุณาเลือก ...',
                    ])
                    ?>
                </div>
            </div>
            <div class="col-md-3"> 
                <div class="form-group">
                    <?= $form->field($model, 'forward_no')->textInput(['maxlength' => true, 'placeholder' => 'เช่น เลขที่ใบเคลม']) ?>
                </div>
            </div>
            <div class="col-md-12"> 
                <div class="form-group">
                    <?= $form->field($model, 'cause')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="col-md-12"> 
                <div class="form-group">
                    <?= $form->field($model, 'process')->textarea(['rows' => 4]) ?>
                </div>
            </div>
            <div class="col-md-6"> 
                <div class="form-group">
                    <?=
                    $form->field($model, 'date_start')->widget(DateTimePicker::className(), [
                        'name' => 'date_start',
                        'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                        //'value' => '23-Feb-1982 10:10',
                        'pluginOptions' => [
                            'todayHighlight' => true,
                            'autoclose' => true,
                            'format' => 'yyyy-m-d hh:ii'
                        ]
                    ]);
                    ?>
                </div>
            </div>
            <div class="col-md-6"> 
                <div class="form-group">
                    <?=
                    $form->field($model, 'date_end')->widget(DateTimePicker::className(), [
                        'name' => 'date_end',
                        'type' => DateTimePicker::TYPE_COMPONENT_PREPEND,
                        //'value' => '23-Feb-1982 10:10',
                        'pluginOptions' => [
                            'todayHighlight' => true,
                            'autoclose' => true,
                            'format' => 'yyyy-m-d hh:ii'
                        ]
                    ]);
                    ?>
                </div>
            </div>
            <div class="col-md-12"> 
                <div class="form-group">
                    <?= $form->field($model, 'sparepart')->textarea(['rows' => 4]) ?>
                </div>
            </div>
            <div class="col-md-4"> 
                <div class="form-group">
                    <?= $form->field($model, 'pr_no')->textInput(['maxlength' => true, 'placeholder' => 'เช่น 62BK/001']) ?>
                </div>
            </div>
            <div class="col-md-4"> 
                <div class="form-group">
                    <?= $form->field($model, 'cost')->textInput(['placeholder' => 'ใส่เป็นตัวเลข']) ?>
                </div>
            </div>
            <div class="col-md-4"> 
                <div class="form-group">
                    <?= $form->field($model, 'wage')->textInput(['placeholder' => 'ใส่เป็นตัวเลข']) ?>
                </div>
            </div>
            <div class="col-md-6"> 
                <div class="form-group">

                    <?=
                    $form->field($model, 'photo')->widget(FileInput::classname(), [
                        'options' => [
                            'accept' => 'image/*',
                        //'multiple' => true
                        ],
                        'pluginOptions' => [
                            'initialPreview' => [],
                            'language' => 'th',
                            'allowedFileExtensions' => ['jpg', 'png', 'gif', 'pdf'],
                            'showPreview' => true,
                            'showRemove' => true,
                            'showUpload' => false
                        ]
                    ]);
                    ?>
                </div>
            </div>
            <div class="col-md-6"> 
                <div class="form-group">
                    <?=
                    $form->field($model, 'file')->widget(FileInput::classname(), [
                        'options' => [
                        //'accept' => 'application/pdf',
                        //'multiple' => true
                        ],
                        'pluginOptions' => [
                            'initialPreview' => [],
                            'language' => 'th',
                            'allowedFileExtensions' => ['pdf'],
                            'showPreview' => true,
                            'showRemove' => true,
                            'showUpload' => false,
                        ]
                    ]);
                    ?>
                </div>
            </div>
            <div class="col-md-12"> 
                <div class="form-group">
                    <?= $form->field($model, 'remask')->textarea(['rows' => 4]) ?>

                </div>
            </div>


            <div class="col-md-12">
                <div class="box-footer with-border">
                    <div class="form-group">
                        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
                        <?php //echo Html::resetButton('ล้างข้อมูล', ['class' => 'btn btn-warning']) ?>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>

        </div>   
    </div>
</div>



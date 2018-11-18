<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//
use app\models\Status;
use app\models\Departments;
use app\models\Assign;
//
use kartik\widgets\DateTimePicker;
use yii\web\UploadedFile;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">
    <div class="actions-form">
        <div class="box box-primary box-solid">
            <div class="box-header">
                <div class="box-title"><?= $this->title ?></div>
            </div>
            <div class="box-body">  
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <div class="col-md-12">
                    <div class="form-group">
                        <?=
                        $form->field($model, 'status_id')->dropDownList(ArrayHelper::map(Status::find()->all(), 'id', 'status_name'), [
                            'prompt' => 'กรุณาเลือก ...',])
                        ?>
                    </div>
                </div>
                <div class="col-md-4"> 
                    <div class="form-group">
                        <?=
                        $form->field($model, 'date_at')->widget(DateTimePicker::className(), [
                            'name' => 'date_at',
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
                <div class="col-md-4">
                    <div class="form-group">
                        <?= $form->field($model, 'order_no')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?=
                        $form->field($model, 'assign_id')->dropDownList(ArrayHelper::map(Assign::find()->all(), 'id', 'assign_name'), [
                            'prompt' => 'กรุณาเลือก ...',])
                        ?>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <?= $form->field($model, 'user_request')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?=
                        $form->field($model, 'departments_id')->dropDownList(ArrayHelper::map(Departments::find()->all(), 'id', 'department_name'), [
                            'prompt' => 'กรุณาเลือก ...',])
                        ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <?= $form->field($model, 'equipment')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?= $form->field($model, 'asset_no')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <?= $form->field($model, 'hc_job')->textInput(['maxlength' => true, 'placeholder' => 'เช่น 61/BK/001']) ?>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?= $form->field($model, 'details')->textarea(['rows' => 8]) ?>
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

            </div>
            <div class="box-footer with-border">
                <div class="form-group">
                    <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

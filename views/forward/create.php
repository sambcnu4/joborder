<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Forward */

$this->title = 'เพิ่มประเภทการดำเนินการ';
$this->params['breadcrumbs'][] = ['label' => 'ประเภทการดำเนินการ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forward-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Actions */

$this->title = 'จัดการงานที่แจ้ง';
$this->params['breadcrumbs'][] = ['label' => 'ตารางจัดการงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actions-create">
    <?=
    $this->render('_form', [
        'model' => $model,
        'modelorders' => $modelorders
    ])
    ?>

</div>

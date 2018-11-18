<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Approved */

$this->title = 'Create Approved';
$this->params['breadcrumbs'][] = ['label' => 'Approveds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approved-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

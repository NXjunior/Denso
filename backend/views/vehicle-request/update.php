<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\VehicleRequest $model */
$this->title = "แก้ไขข้อมูล";
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Requests', 'url' => ['index']];
$name = $model->employeeInfo->title.$model->employeeInfo->firstname." ".$model->employeeInfo->lastname;
$this->params['breadcrumbs'][] = ['label' => $name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไขข้อมูล';
?>
<div class="vehicle-request-update">
    <?= $this->render('_form', [
        'model' => $model,
        'modelVehicle' => $model->vehicle,
    ]) ?>

</div>

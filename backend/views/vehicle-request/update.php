<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\VehicleRequest $model */

$this->title = $model->employeeInfo->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title , 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->disableTitleDisplay = true;
?>
<div class="vehicle-request-update">

    <?= $this->render('_form', [
        'model' => $model,
        'modelVehicle' => $model->vehicle,
    ]) ?>

</div>

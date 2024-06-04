<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\VehicleRequest $model */

$this->title = 'Create Vehicle Request XXXXX';
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->disableTitleDisplay = true;

?>
<div class="vehicle-request-create">

    <?= $this->render('_form', [
        'model' => $model,
        'modelVehicle' => $modelVehicle
    ]) ?>

</div>

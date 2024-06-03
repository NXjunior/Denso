<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\VehicleRequest $model */

<<<<<<< HEAD
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
=======
$this->title = 'Create Vehicle Request';
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-request-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
>>>>>>> 7a199de (create crud controller/models)

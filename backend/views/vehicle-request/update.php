<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\VehicleRequest $model */

$this->title = 'Update Vehicle Request: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehicle-request-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

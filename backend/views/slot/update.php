<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Slot $model */

$this->title = 'Update Slot: ' . $model->slot_date . ' (' . $model->time_start . ' - ' . $model->time_end . ')';
$this->params['breadcrumbs'][] = ['label' => 'Slots', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->slot_date, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slot-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Slot $model */

$this->title = 'Update Slot: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Slots', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slot-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
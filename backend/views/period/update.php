<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\period $model */

$this->title = 'Update Location: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="period-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
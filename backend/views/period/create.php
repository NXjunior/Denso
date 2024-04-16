<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Period $model */

$this->title = 'Create Location';
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="period-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Slot $model */

$this->title = 'Create Slot';
$this->params['breadcrumbs'][] = ['label' => 'Slots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slot-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
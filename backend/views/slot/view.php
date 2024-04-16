<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Slot $model */


$this->title = $model->slot_date . ' (' . $model->time_start . ' - ' . $model->time_end . ')';
$this->params['breadcrumbs'][] = ['label' => 'Slots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="slot-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'period_id',
            // 'name',
            // 'desp',
            // 'note:ntext',
            // 'extra',
            'slot_date',
            'time_start',
            'time_end',
            'quota',
            // 'creator',
            // 'created_at',
            // 'updater',
            // 'updated_at',
            // 'status',
        ],
    ]) ?>

</div>
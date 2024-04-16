<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Period;
use common\models\Slot;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\Period $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="period-view">



    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'company_id',
            'name',
            'desp',
            'start_date',
            'end_date',
            'creator',
            'created_at',
            'updater',
            'updated_at',
            'status',
        ],
    ]) ?>

</div>

<div class="slot-index">

    <?= GridView::widget([
        'dataProvider' => $slotDataProvider,
        'showPageSummary' => true,
        'hover' => true,
        'columns' => [
            [
                'class' => 'kartik\grid\SerialColumn',
                'pageSummary' => 'รวม',
                'pageSummaryOptions' => ['colspan' => 2],
                'hAlign' => 'right',
            ],
            [
                'attribute' => 'slot_date',
                'format' => 'date'
            ],
            [
                'attribute' => 'quota',
                'hAlign' => 'right',
                'pageSummary' => true,
            ],
        ],
    ]); ?>

    <p>
        <?= Html::a('Create Slot', ['/slot/create', 'p' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary' => true,
        'hover' => true,
        'columns' => [
            [
                'class' => 'kartik\grid\SerialColumn',
                'pageSummary' => 'รวม',
                'pageSummaryOptions' => ['colspan' => 4],
                'hAlign' => 'right',
            ],

            // 'id',
            // 'name',
            // 'desp',
            // 'note:ntext',
            //'extra',
            [
                'attribute' => 'slot_date',
                'format' => 'date'
            ],
            'time_start',
            'time_end',
            [
                'attribute' => 'quota',
                'hAlign' => 'right',
                'pageSummary' => true,
                // 'format' => ['decimal', 2],
            ],
            //'creator',
            //'created_at',
            //'updater',
            //'updated_at',
            //'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Slot $model, $key, $index, $column) {
                    return Url::toRoute(['/slot/' . $action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
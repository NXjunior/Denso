<?php

use common\models\Slot;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\grid\EditableColumn;

/** @var yii\web\View $this */
/** @var common\models\SlotSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Slots';
$this->params['breadcrumbs'][] = $this->title;

$this->disableTitleDisplay = true;
?>

<style>
    .popover-x {
        display: none;
    }
</style>

<div class="row g-4">
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <h2 class="fs-2 mb-2 me-2 mb-4"><?php echo $this->title ?></h2>
    </div>
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <?php echo Yii::$app->user->can('company_manage') ?  Html::a('Create Slot', ['create'], ['class' => 'btn btn-success btn-lg text-white']) : '' ?>
        </div>
    </div>
</div>

<div class="slot-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary' => true,
        'hover' => true,
        'columns' => [
            [
                'class' => 'kartik\grid\SerialColumn',
                'pageSummary' => 'รวม (หน้านี้)',
                'pageSummaryOptions' => ['colspan' => 5],
                'hAlign' => 'right',
            ],

            // 'id',
            // 'name',
            // 'desp',
            // 'note:ntext',
            //'extra',
            // [
            //     'attribute' => 'slot_date',
            //     'format' => 'date'
            // ],
            [
                'attribute' =>  'period_id',
                'label' => 'Location',
                'filter' => Html::activeDropDownList($searchModel, 'period_id', ArrayHelper::map($searchModel->getAllPeriod(), 'id', 'name'), ['prompt' => 'All Location', 'class' => 'form-select']),
                'value' => function ($model) {
                    return $model->period->name;
                }
            ],
            [
                'attribute' =>  'slot_date',
                'label' => 'Slot Date',
                'filterType' => GridView::FILTER_DATE,
                'filterWidgetOptions' => [
                    'pluginOptions' => [
                        'orientation' => 'bottom',
                        'format' => 'yyyy-mm-dd',
                        'autoclose' => true,
                    ]
                ],
                'value' => function ($model) {
                    return Yii::$app->date->date('j F Y (วันl)', strtotime($model->slot_date));
                }
            ],
            [
                'attribute' =>  'time_start',
                'filter' => Html::activeDropDownList($searchModel, 'time_start', ArrayHelper::map($searchModel->getAllSlotTimeStart(), 'time_start', 'time_start'), ['prompt' => 'All Time', 'class' => 'form-select']),
                'value' => function ($model) {
                    return $model->time_start;
                }
            ],
            [
                'attribute' =>  'time_end',
                'filter' => Html::activeDropDownList($searchModel, 'time_end', ArrayHelper::map($searchModel->getAllSlotTimeEnd(), 'time_end', 'time_end'), ['prompt' => 'All Time', 'class' => 'form-select']),
                'value' => function ($model) {
                    return $model->time_end;
                }
            ],
            // 'time_start',
            // 'time_end',
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'quota',
                'headerOptions' => ['style' => 'width:80px;'],
                'hAlign' => 'right',
                'pageSummary' => true,
                // 'format' => ['decimal', 2],
                'editableOptions' => [
                    'asPopover' => false,
                    'options' => [
                        'class' => 'form-control',
                    ],
                    // 'inputType' => \kartik\editable\Editable::INPUT_SPIN,
                    // 'options' => [
                    //     'pluginOptions' => ['min' => 0, 'max' => 100]
                    // ]
                ]
            ],
            //'creator',
            //'created_at',
            //'updater',
            //'updated_at',
            //'status',
            [
                'class' => kartik\grid\ActionColumn::className(),
                'headerOptions' => ['style' => 'width:80px;'],
                'template' => '{view}',
                'urlCreator' => function ($action, Slot $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
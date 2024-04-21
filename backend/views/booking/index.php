<?php

use common\models\Booking;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use kartik\export\ExportMenu;


/** @var yii\web\View $this */
/** @var common\models\BookingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$isReportController = Yii::$app->controller->id === 'report';


if ($isReportController) {
    $subTitle = ' : ' . Yii::$app->controller->action->id;
    $this->params['breadcrumbs'][] = ['label' => 'Report', 'url' => ['/report']];
    $walkinButton = '';
} else {
    $subTitle = '';
    $walkinButton = Html::a('<i class="fa-solid fa-person-walking"></i> Create Walk in', ['/booking/walkin'], ['class' => 'btn btn-success text-white btn-lg shadow mt-4 mb-4 fs-4']);
}

$this->title = 'Bookings' . $subTitle;
$this->params['breadcrumbs'][] = $this->title;
$this->disableTitleDisplay = true;


$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'attribute' =>  'period_id',
        'label' => 'Location',
        'headerOptions' => ['style' => 'width:160px;'],
        'filter' => Html::activeDropDownList($searchModel, 'period_id', ArrayHelper::map($searchModel->getAllPeriod(), 'id', 'name'), ['prompt' => 'All Location', 'class' => 'form-select']),
        'value' => function ($model) {
            return $model->period->name;
        },
        'visible' => userRole() === 'Admin' && !$isReportController
    ],
    [
        'attribute' =>  'source_id',
        'label' => 'Employee ID',
        'headerOptions' => ['style' => 'width:120px;'],
        'format' => 'raw',
        'value' => function ($model) use ($queryParams) {
            if (!isset($queryParams['BookingSearch']))
                return $model->source_id;

            $queryString = $queryParams['BookingSearch']['source_id'];
            return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->source_id);
        }
    ],
    [
        'attribute' =>  'bookingName',
        'label' => 'Employee Name',
        'format' => 'raw',
        'value' => function ($model) use ($queryParams) {
            if (!isset($queryParams['BookingSearch']))
                return $model->employee->fullname;

            $queryString = $queryParams['BookingSearch']['bookingName'];
            return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->employee->fullname);
        }
    ],
    [
        'attribute' =>  'slotDate',
        'label' => 'Slot Date',
        'headerOptions' => ['style' => 'width:210px;'],
        'filterType' => GridView::FILTER_DATE,
        'filterWidgetOptions' => [
            'pluginOptions' => [
                'orientation' => 'bottom',
                'format' => 'yyyy-mm-dd',
                'autoclose' => true,
            ]
        ],
        'format' => 'raw',
        'value' => function ($model) {
            if ($model->method === Booking::METHOD_ONLINE) {
                if (isset($model->target))
                    $slotDate = Yii::$app->date->date('j M (l)', strtotime($model->target->slot_date));
                else
                    $slotDate = badge('danger', 'N/A');
            } else
                $slotDate = Yii::$app->date->date('j M (l)', strtotime($model->walkin_date));

            return $slotDate;
        }
    ],
    [
        'attribute' =>  'slotTime',
        'label' => 'Slot Time',
        'headerOptions' => ['style' => 'width:135px;'],
        'filter' => Html::activeDropDownList($searchModel, 'slotTime', ArrayHelper::map($searchModel->getAllSlotTime(), 'time_start', 'time_start'), ['prompt' => 'All Time', 'class' => 'form-select']),
        'format' => 'raw',
        'value' => function ($model) {

            if ($model->method === Booking::METHOD_ONLINE) {
                if (isset($model->target))
                    $slotTime = $model->target->time_start;
                else
                    $slotTime = badge('danger', 'N/A');
            } else
                $slotTime = $model->walkin_time;

            return $slotTime;
        }
    ],
    [
        'attribute' => 'method',
        'headerOptions' => ['style' => 'width:100px;'],
        'filter' => Html::activeDropDownList($searchModel, 'method', [Booking::METHOD_ONLINE => 'Online', Booking::METHOD_WALKIN => 'Walk In'], ['prompt' => 'All Method', 'class' => 'form-select']),
        'label' => 'Method',
        'format' => 'raw',
        'value' => function ($model) {
            return badge($model->method === Booking::METHOD_ONLINE ? 'info' : 'secondary', $model->method === Booking::METHOD_ONLINE ? 'Online' : 'Walk In');
        }
    ],
    [
        'attribute' => 'vaccinated',
        'headerOptions' => ['style' => 'width:100px;'],
        'filter' => Html::activeDropDownList($searchModel, 'vaccinated', ['no' => 'No', 'yes' => 'Yes'], ['prompt' => 'Vaccinated?', 'class' => 'form-select']),
        'label' => 'Vaccinated',
        'format' => 'raw',
        'value' => function ($model) {
            return badge(isset($model->vaccinated->id) ? 'success' : 'secondary', isset($model->vaccinated->id) ? 'Yes' : 'No');
        }
    ],
    // 'period_id',
    // 'target_id',
    //'status',
    //'creator',
    // 'created_at',
    [
        'attribute' =>  'created_at',
        'headerOptions' => ['style' => 'width:140px;'],
        'value' => function ($model) {
            return Yii::$app->date->date('j M H:i:s', strtotime($model->created_at));
        }
    ],
    //'updater',
    //'updated_at',
    //'last_login',
    [
        'class' => kartik\grid\ActionColumn::className(),
        'headerOptions' => ['style' => 'width:80px;'],
        'template' => '{view}',
        'urlCreator' => function ($action, Booking $model, $key, $index, $column) {
            return Url::toRoute([$action, 'id' => $model->id]);
        },
        'visible' => !$isReportController,
        'visibleButtons' => [
            'view' => function ($model) {
                return isset($model->target->time_start);
            },
        ]
    ],
];

$fullExportMenu = ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $columns,
    'filename' => 'AllBooking_' . date('Ymd_His'),
    'target' => ExportMenu::TARGET_BLANK,
    'fontAwesome' => true,
    'pjaxContainerId' => 'kv-pjax-container',
    'exportConfig' => [
        ExportMenu::FORMAT_HTML => false,
        ExportMenu::FORMAT_CSV => false,
        ExportMenu::FORMAT_TEXT => false,
        ExportMenu::FORMAT_EXCEL => false,
        ExportMenu::FORMAT_PDF => false,
    ],
    'dropdownOptions' => [
        'label' => 'Export',
        'class' => 'btn btn-default',
        'itemsBefore' => [
            '<li class="dropdown-header">' . Yii::t('kvgrid', 'Export All Data') . '</li>',
        ],
    ],
]);
?>

<div class="row g-4">
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <h2 class="fs-2 mb-2 me-2"><?php echo $this->title ?></h2>
    </div>
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <?php echo $walkinButton ?>
        </div>
    </div>
</div>


<div class="booking-index mb-5 pb-5 mt-4">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive' => true,
        'hover' => true,
        'panel' => [
            'type' => GridView::TYPE_SECONDARY,
            'heading' => '<h3 class="panel-title pt-2"><i class="fa-regular fa-calendar-circle-plus"></i> ' . $this->title . '</h3>',
        ],
        'columns' => $columns,
        'toolbar' => [
            $fullExportMenu,
        ],
    ]); ?>
</div>
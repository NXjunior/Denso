<?php

use common\models\Booking;
use common\models\Employee;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use kartik\export\ExportMenu;


/** @var yii\web\View $this */
/** @var common\models\BookingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */


if (userRole() === 'Manager') {
  if (user()->username == 'denso_bpk') {
    $url = 'vaccinated-bpk';
  } else if (user()->username == 'denso_wgr') {
    $url = 'vaccinated-wgr';
  }
} else {
  $url = 'index';
}



switch (Yii::$app->controller->action->id) {
  case 'vaccinated-bpk':
    $subTitle = ' : BPK Amata';
    break;

  case 'vaccinated-wgr':
    $subTitle = ' : WGR Wellgrow';
    break;

  default:
    $subTitle = ' : All';
    break;
}



$this->title = 'Vaccinated' . $subTitle;
$this->params['breadcrumbs'][] = ['label' => 'Report', 'url' => [$url]];
$this->params['breadcrumbs'][] = $this->title;
$this->disableTitleDisplay = true;


$modelEmployee = new Employee();
$companyCodeOptions = $modelEmployee->getAllCompanyCode(user()->company_id);
$plantOptions = $modelEmployee->getAllPlant(user()->company_id);
$locationOptions = $modelEmployee->getAllWorkLocation(user()->company_id);

$columns = [
  ['class' => 'yii\grid\SerialColumn'],

  [
    'attribute' =>  'source_id',
    'label' => 'ID',
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
    'label' => 'Name',
    'format' => 'raw',
    'value' => function ($model) use ($queryParams) {
      if (!isset($queryParams['BookingSearch']))
        return $model->employee->fullname;

      $queryString = $queryParams['BookingSearch']['bookingName'];
      return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->employee->fullname);
    }
  ],
  [
    'attribute' =>  'bookingNameEn',
    'label' => 'Name En',
    'format' => 'raw',
    'value' => function ($model) use ($queryParams) {
      if (!isset($queryParams['BookingSearch']))
        return $model->employee->fullnameEn;

      $queryString = $queryParams['BookingSearch']['bookingNameEn'];
      return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->employee->fullnameEn);
    }
  ],
  [
    'attribute' => 'bookingCompanyCode',
    'label' => 'Company Code',
    'headerOptions' => ['style' => 'width:120px;'],
    'filter' => Html::activeDropDownList($searchModel, 'bookingCompanyCode', ArrayHelper::map($companyCodeOptions, 'meta_value', 'meta_value'), ['prompt' => 'All Company Code', 'class' => 'form-select']),
    'format' => 'raw',
    'value' => function ($model) use ($queryParams) {

      return $model->employee->meta['company_code'];
    }
  ],

  [
    'attribute' => 'bookingPlant',
    'label' => 'Plant',
    'headerOptions' => ['style' => 'width:120px;'],
    'filter' => Html::activeDropDownList($searchModel, 'bookingPlant', ArrayHelper::map($plantOptions, 'meta_value', 'meta_value'), ['prompt' => 'All Plant', 'class' => 'form-select']),
    'format' => 'raw',
    'value' => function ($model) use ($queryParams) {
      return $model->employee->meta['plant'];
    }
  ],

  [
    'attribute' => 'bookingWorkLocation',
    'label' => 'Work Location',
    'headerOptions' => ['style' => 'width:120px;'],
    // 'filter' => Html::activeDropDownList($searchModel, 'bookingWorkLocation', ArrayHelper::map($locationOptions, 'meta_value', 'meta_value'), ['prompt' => 'All Work Location', 'class' => 'form-select']),
    'format' => 'raw',
    'value' => function ($model) use ($queryParams) {
      return $model->employee->meta['location'];
    }
  ],

  [
    'attribute' =>  'period_id',
    'label' => 'Location',
    'headerOptions' => ['style' => 'width:160px;'],
    'filter' => Html::activeDropDownList($searchModel, 'period_id', ArrayHelper::map($searchModel->getAllPeriod(), 'id', 'name'), ['prompt' => 'All Location', 'class' => 'form-select']),
    'value' => function ($model) {
      return $model->period->name;
    },
    'visible' => userRole() === 'Admin'
  ],
  [
    'attribute' =>  'slotDate',
    'label' => 'Date',
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
    'label' => 'Time',
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
    'label' => 'Vaccinated At',
    'headerOptions' => ['style' => 'width:135px;'],
    'value' => function ($model) {
      return $model->vaccinated->created_at;
    }
  ]
  // [
  //   'class' => kartik\grid\ActionColumn::className(),
  //   'headerOptions' => ['style' => 'width:80px;'],
  //   'template' => '{view}',
  //   'urlCreator' => function ($action, Booking $model, $key, $index, $column) {
  //     return Url::toRoute([$action, 'id' => $model->id]);
  //   }
  // ],
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
    <h2 class="fs-2 mb-2 me-2 mb-4"><?php echo $this->title ?></h2>
  </div>
  <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    </div>
  </div>
</div>


<div class="booking-index mb-5 pb-5">
  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'responsive' => true,
    'hover' => true,
    'beforeHeader' => [
      [
        'columns' => [
          ['content' => 'Employee', 'options' => ['colspan' => 7, 'class' => 'text-center border-bottom  bg-light']],
          ['content' => 'Vaccinate', 'options' => ['colspan' => 4, 'class' => 'text-center border-bottom bg-dark-subtle']],
        ],
      ]
    ],
    'panel' => [
      'type' => GridView::TYPE_SECONDARY,
      'heading' => '<h3 class="panel-title pt-2"><i class="fa-regular fa-syringe"></i> ' . $this->title . '</h3>',
    ],
    'columns' => $columns,
    'toolbar' => [
      $fullExportMenu,
    ],
  ]); ?>


</div>
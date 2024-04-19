<?php

use common\models\Employee;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/** @var yii\web\View $this */
/** @var backend\models\EmployeeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$isNotbookFilter = Yii::$app->controller->action->id === 'not-book';

if ($isNotbookFilter) {
    $subTitle = ' : Haven\'t Booking';
    $this->params['breadcrumbs'][] = ['label' => 'Report', 'url' => ['/report']];
    $createButton = '';
} else {
    $subTitle = '';
    $createButton = Html::a('<i class="fa-solid fa-user"></i> Create Employee', ['/employee/create'], ['class' => 'btn btn-success text-white btn-lg shadow mt-4 mb-4 fs-4']);
}

$this->title = 'Employees' . $subTitle;
$this->params['breadcrumbs'][] = $this->title;

$this->disableTitleDisplay = true;


$columns = [
    ['class' => 'kartik\grid\SerialColumn'],
    [
        'attribute' => 'code',
        'headerOptions' => ['style' => 'width:120px;'],
        'format' => 'raw',
        'value' => function ($model) use ($queryParams) {
            if (!isset($queryParams['EmployeeSearch']))
                return $model->code;

            $queryString = $queryParams['EmployeeSearch']['code'];
            return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->code);
        }
    ],
    [
        'attribute' => 'fullname',
        'label' => 'Name',
        'format' => 'raw',
        'value' => function ($model) use ($queryParams) {
            if (!isset($queryParams['EmployeeSearch']))
                return $model->fullname;

            $queryString = $queryParams['EmployeeSearch']['fullname'];
            return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->fullname);
        }
    ],
    [
        'attribute' => 'fullnameEn',
        'label' => 'Name EN',
        'format' => 'raw',
        'value' => function ($model) use ($queryParams) {
            if (!isset($queryParams['EmployeeSearch']))
                return $model->fullnameEn;

            $queryString = $queryParams['EmployeeSearch']['fullnameEn'];
            return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->fullnameEn);
        }
    ],
    [
        'attribute' => 'company_code',
        'headerOptions' => ['style' => 'width:120px;'],
        'filter' => Html::activeDropDownList($searchModel, 'company_code', ArrayHelper::map($searchModel->getAllCompanyCode($searchModel->company_id), 'meta_value', 'meta_value'), ['prompt' => 'All Company', 'class' => 'form-select']),
        'format' => 'raw',
        'value' => function ($model) use ($queryParams) {
            if (!isset($queryParams['EmployeeSearch']))
                return $model->meta['company_code'];

            $queryString = $queryParams['EmployeeSearch']['company_code'];
            return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->meta['company_code']);
        }
    ],
    [
        'attribute' => 'plant',
        'headerOptions' => ['style' => 'width:120px;'],
        'filter' => Html::activeDropDownList($searchModel, 'plant', ArrayHelper::map($searchModel->getAllPlant($searchModel->company_id), 'meta_value', 'meta_value'), ['prompt' => 'All Plant', 'class' => 'form-select']),
        'format' => 'raw',
        'value' => function ($model) use ($queryParams) {
            if (!isset($queryParams['EmployeeSearch']))
                return $model->meta['plant'];

            $queryString = $queryParams['EmployeeSearch']['plant'];
            return str_replace($queryString, '<strong>' . $queryString . '</strong>', $model->meta['plant']);
        }
    ],
    [
        'attribute' => 'booked',
        'headerOptions' => ['style' => 'width:100px;'],
        'filter' => Html::activeDropDownList($searchModel, 'booked', ['no' => 'No', 'yes' => 'Yes'], ['prompt' => 'Booked?', 'class' => 'form-select']),
        'label' => 'Booked',
        'format' => 'raw',
        'value' => function ($model) {
            return badge(isset($model->booking->id) ? 'success' : 'secondary', isset($model->booking->id) ? 'Yes' : 'No');
        },
        'visible' => !$isNotbookFilter
    ],
    [
        'class' => kartik\grid\ActionColumn::className(),
        'headerOptions' => ['style' => 'width:80px;'],
        'template' => '{view} {update}',
        'urlCreator' => function ($action, Employee $model, $key, $index, $column) {
            return Url::toRoute([$action, 'id' => $model->id]);
        },
        'visible' => !$isNotbookFilter
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
            <?php echo Yii::$app->user->can('employee_manage') ? $createButton : '' ?>
        </div>
    </div>
</div>


<div class="employee-index mb-5 pb-5">
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
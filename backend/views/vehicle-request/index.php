<?php

use common\models\VehicleRequest;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use common\models\Vehicle;

/** @var yii\web\View $this */
/** @var common\models\VehicleRequestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Vehicle Requests';
$this->params['breadcrumbs'][] = $this->title;
$this->disableTitleDisplay = true;

?>
<div class="vehicle-request-index">

<?php 
    $columns = [
        ['class' =>'kartik\grid\SerialColumn'],
        [
            'attribute' => 'employeeName',
            'label' => 'ชื่อผู้ลงทะเบียน',
            'format' => 'raw',
            'value' => function($searchModel) use($queryParams){
                if (!isset($queryParams['VehicleRequestSearch']) || !isset($queryParams['VehicleRequestSearch'])) {
                    return $searchModel->employeeInfo->fullname;
                }
                $queryString = $queryParams['VehicleRequestSearch']['employeeName'];
                return str_replace($queryString,'<strong>' . $queryString. '</strong>' ,$searchModel->employeeInfo->fullname);
            }
        ],
        [
            'attribute' => 'vehiclePlate',
            'label' => 'เลขทะเบียน',
            'format' => 'raw',
            'value' => function($searchModel) use($queryParams){
                if (!isset($queryParams['VehicleRequestSearch'])){
                    return $searchModel->vehicle->plate;
                }
                $queryString = $queryParams['VehicleRequestSearch']['vehiclePlate'];
                return str_replace($queryString,'<strong>'.$queryString.'</strong>',$searchModel->vehicle->plate);
            }
        ],
        [
            'attribute' => 'vehicleType',
            'label' => 'ประเภทรถ',
            'format' => 'raw',
            'filter'  => Html::activeDropDownList($searchModel, 'vehicleType',Vehicle::listTypes(),['prompt' => 'ทุกประเภท', 'class' => 'form-select']),
            'value' => function($searchModel){
                return Vehicle::listTypes()[$searchModel->vehicle->type];
            }
        ],
        [
            'attribute' => 'requested_role',
            'label' => 'ประเภทผู้ร้องขอ',
            'filter' => Html::activeDropDownList($searchModel, 'requested_role',$searchModel->listRoles(),['prompt' => 'ประเภทผู้ร้องขอ', 'class' => 'form-select']),
            'value' => function($searchModel){
                return $searchModel->listRoles()[$searchModel->requested_role];
            }
        ],
        [
            'attribute' => 'status',
            'label' => 'สถานะใบสมัคร',
            'format' => 'raw',
            'filter' => Html::activeDropDownList($searchModel, 'status',$searchModel->listStatus(),['prompt' => 'สถานะใบสมัคร', 'class' => 'form-select']),
            'value' => function($searchModel){
                return badgeStatus($searchModel);
            }
        ],
        [
            'attribute' => 'creatorUser',
            'label' => 'ผู้สร้างคำขอ',
            'format' => 'raw',
            'value' => function($searchModel)use($queryParams){
                if(!isset($queryParams['VehicleRequestSearch'])){
                    return $searchModel->creatorInfo->username;
                }
                $queryString = $queryParams['VehicleRequestSearch']['creatorUser'];
                return str_replace($queryString,'<strong>'.$queryString.'</strong>',$searchModel->creatorInfo->username);
            }
        ],
        [
            'attribute' => 'approver',
            'label' => 'อนุมัติ',
            'value' => function($searchModel){
                return isset($searchModel->approver)?$searchModel->approver : "";
            }
        ],
        [
            'class' => kartik\grid\ActionColumn::className(),
            'headerOptions' => ['style' => 'width:80px;'],
            'template' => '{view} {update}',
            'urlCreator' => function ($action, VehicleRequest $searchModel, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $searchModel->id]);
            },
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
            <?=
            Html::a('<i class="fa-solid fa-user"></i> Create Vehicle Request', ['create'], ['class' => 'btn btn-success text-white btn-lg shadow mt-4 mb-4 fs-4']);
            ?>
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

</div>
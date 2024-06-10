<?php

use common\models\VehicleRequest;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/** @var yii\web\View $this */
/** @var common\models\VehicleRequestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Vehicle Requests';
$this->params['breadcrumbs'][] = $this->title;
$this->disableTitleDisplay = true;

?>
<div class="vehicle-request-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

<?php 
    $columns = [
        ['class' =>'kartik\grid\SerialColumn'],
        [
            'attribute' => 'employeeName',
            'label' => 'ชื่อผู้ลงทะเบียน',
            'value' => function($model) use($queryParams){
                if (!isset($queryParams['VehicleRequestSearch']) || !isset($queryParams['VehicleRequestSearch']['requested_id'])) {
                    return $model->employeeInfo->fullname;
                }
                $queryString = $queryParams['VehicleRequestSearch']['requested_id'];
                return $model->employeeInfo->fullname;
            }
        ],
        [
            'attribute' => 'vehiclePlate',
            'label' => 'เลขทะเบียน',
            'value' => function($model) use($queryParams){
                if (!isset($queryParams['VehicleRequestSearch'])){
                    return $model->vehicle->plate;
                }
                $queryString = $queryParams['VehicleRequestSearch']['vehiclePlate'];
                return $model->vehicle->plate;
            }
        ],
        [
            'attribute' => 'vehicleType',
            'label' => 'ประเภทรถ',
            'filter'  => Html::activeDropDownList($searchModel, 'vehicleType',$searchModel->getVehicleTypeList(),['prompt' => 'ทุกประเภท', 'class' => 'form-select']),
            'value' => function($model) use ($queryParams){
                if(!isset($queryParams['VehicleRequestSearch'])){
                    return $model->vehicle->getTypeName();
                }
                $queryString = $queryParams['VehicleRequestSearch']['vehicleType'];
                return $model->vehicle->getTypeName();
            }
        ],
        [
            'attribute' => 'requested_role',
            'label' => 'ประเภทผู้ร้องของ',
            'filter' => Html::activeDropDownList($searchModel, 'requested_role',$model->getRoleList(),['prompt' => 'ประเภทผู้ร้องของ', 'class' => 'form-select']),
            'value' => function($model) use($queryParams){
                if(!isset($queryParams['VehicleRequestSearch'])){
                    return $model->getRoleName();
                }
                $queryString =  $queryParams['VehicleRequestSearch']['requested_role'];
                return $model->getRoleName();
            }
        ],
        [
            'attribute' => 'status',
            'label' => 'สถานะใบสมัคร',
            'filter' => Html::activeDropDownList($searchModel, 'status',$model->getStatusList(),['prompt' => 'สถานะใบสมัคร', 'class' => 'form-select']),
            'value' => function($model){
                if(!isset($queryParams['VehicleRequestSearch'])){
                    return $model->getStatusName();
                }
                $queryString = $queryParams['VehicleRequestSearch']['status'];
                return $model->getStatusName();
            }
        ],
        [
            'attribute' => 'approver',
            'label' => 'ผู้อนุญาติ',
            'value' => function($model){
                return isset($model->approver)?$model->approver : "";
            }
        ],
        [
            'class' => kartik\grid\ActionColumn::className(),
            'headerOptions' => ['style' => 'width:80px;'],
            'template' => '{view} {update}',
            'urlCreator' => function ($action, VehicleRequest $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
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

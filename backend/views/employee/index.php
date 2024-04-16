<?php

use common\models\Employee;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\EmployeeSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;

$this->disableTitleDisplay = true;
?>

<div class="row g-4">
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <h2 class="fs-2 mb-2 me-2 mb-4"><?php echo $this->title ?></h2>
    </div>
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <?php echo Yii::$app->user->can('employee_manage') ? Html::a('Create Employee', ['create'], ['class' => 'btn btn-success btn-lg text-white']) : '' ?>
        </div>
    </div>
</div>

<div class="employee-index mb-5 pb-5">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'hover' => true,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'id',
            // 'company_id',
            // 'code',
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
                }
            ],

            // 'firstname',
            // 'lastname',
            //'title_en',
            //'firstname_en',
            //'lastname_en',
            //'creator',
            //'created_at',
            //'updater',
            //'updated_at',
            //'status',
            [
                'class' => kartik\grid\ActionColumn::className(),
                'headerOptions' => ['style' => 'width:80px;'],
                'template' => '{view} {update}',
                'urlCreator' => function ($action, Employee $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
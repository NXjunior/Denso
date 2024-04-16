<?php

use common\models\Booking;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;


/** @var yii\web\View $this */
/** @var common\models\BookingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Bookings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="booking-index mb-5 pb-5">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive' => true,
        'hover' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'source_id',
            // [
            //     'attribute' =>  'company_id',
            //     'label' => 'Company',
            //     'value' => function ($model) {
            //         return $model->company->name;
            //     }
            // ],
            [
                'attribute' =>  'period_id',
                'label' => 'Location',
                'headerOptions' => ['style' => 'width:160px;'],
                'filter' => Html::activeDropDownList($searchModel, 'period_id', ArrayHelper::map($searchModel->getAllPeriod(), 'id', 'name'), ['prompt' => 'All Location', 'class' => 'form-select']),
                'value' => function ($model) {
                    return $model->period->name;
                }
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
                'value' => function ($model) {
                    return Yii::$app->date->date('j M (l)', strtotime($model->target->slot_date));
                }
            ],
            [
                'attribute' =>  'slotTime',
                'label' => 'Slot Time',
                'headerOptions' => ['style' => 'width:135px;'],
                'filter' => Html::activeDropDownList($searchModel, 'slotTime', ArrayHelper::map($searchModel->getAllSlotTime(), 'time_start', 'time_start'), ['prompt' => 'All Time', 'class' => 'form-select']),
                'value' => function ($model) {
                    return $model->target->time_start;
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
                }
            ],
        ],
    ]); ?>


</div>
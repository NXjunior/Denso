<?php

use common\models\Period;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\PeriodSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Locations';
$this->params['breadcrumbs'][] = $this->title;

$this->disableTitleDisplay = true;

?>

<div class="row g-4">
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <h2 class="fs-2 mb-2 me-2 mb-4"><?php echo $this->title ?></h2>
    </div>
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <?php echo Yii::$app->user->can('period_manage') ? Html::a('Create Location', ['create'], ['class' => 'btn btn-success btn-lg text-white']) : '' ?>
        </div>
    </div>
</div>

<div class="row g-4 period-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',

            [
                'attribute' => 'company',
                'value' => function ($model) {
                    return $model->company->name;
                }
            ],
            'name',
            // 'desp',
            [
                'attribute' => 'start_date',
                'format' => 'date'
            ],
            [
                'attribute' => 'end_date',
                'format' => 'date'
            ],

            //'creator',
            //'created_at',
            //'updater',
            //'updated_at',
            // 'status',
            [
                'class' => kartik\grid\ActionColumn::className(),
                'headerOptions' => ['style' => 'width:80px;'],
                'template' => '{view} {update}',
                'urlCreator' => function ($action, period $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
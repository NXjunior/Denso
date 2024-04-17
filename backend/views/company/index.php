<?php

use common\models\Company;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\web\View;
use kartik\export\ExportMenu;

/** @var yii\web\View $this */
/** @var common\models\CompanySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;

$this->disableTitleDisplay = true;
?>


<div class="row g-4">
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <h2 class="fs-2 mb-2 me-2 mb-4"><?php echo $this->title ?></h2>
    </div>
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <?php echo Yii::$app->user->can('company_manage') ? Html::a('Create Company', ['create'], ['class' => 'btn btn-success btn-lg text-white']) : '' ?>
        </div>
    </div>
</div>


<div class="row g-4 company-index">
    <div class="col-12 col-sm-12 col-xl-12 col-xxl-12 mb-4">
        <?php $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'abs',
            'created_at',
            'updated_at',
            //'logo',
            // 'status',
            //'domain',
            [
                'class' => kartik\grid\ActionColumn::className(),
                'headerOptions' => ['style' => 'width:80px;'],
                'template' => '{view} {update}',
                'urlCreator' => function ($action, Company $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ]; ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'columns' => $gridColumns,

        ]); ?>

    </div>
</div>
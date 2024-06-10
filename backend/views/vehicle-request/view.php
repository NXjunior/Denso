<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\VehicleRequest $model */

$this->title = $model->employeeInfo->title.$model->employeeInfo->firstname." ".$model->employeeInfo->lastname;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
// dump($model);
// exit;
?>
<div class="vehicle-request-view">

    <div class="row">
        <div class="col-6 d-flex justify-content-center align-items-center">
            <div class="w-75 h-50 border border-dark rounded d-flex justify-content-center align-items-center">
                <div class="d-flex flex-column">
                    <h1><?php echo $model->vehicle->plate ?></h1>
                    <h1 class="mt-3"><?php echo $model->vehicle->provinceInfo->name;  ?></h1>
                </div>
                    
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'label' => 'ชื่อผู้ลงทะเบียน',
                        'value' => function($model){
                            return $model->employeeInfo->firstname." ".$model->employeeInfo->lastname;
                        }
                    ],
                    [
                        'label' => 'ประเภทผู้ร้องขอ',
                        'value' => function($model){
                            return $model->getRoleName();
                        }
                    ],
                    [
                        'label' => 'ประเภทยานพาหนะ',
                        'value' => function($model){
                            return $model->vehicle->gettypeName();
                        }
                    ],
                    [
                        'label' => 'หมายเลขทะเบียน',
                        'value' => function($model){
                            return $model->vehicle->plate;
                        }
                    ],
                    [
                        'label' => 'จังหวัดทะเบียน',
                        'value' => function($model){
                            return $model->vehicle->provinceInfo->name;
                        }
                    ],
                    [
                        'label' => 'ยี่ห้อยานพาหนะ',
                        'value' => function($model){
                            return $model->vehicle->brand;
                        }
                    ],
                    [
                        'label' => 'สียานพาหนะ',
                        'value' => function($model){
                            return $model->vehicle->color;
                        }
                    ],
                    [
                        'label' => 'รูปยานพาหนะ',
                        'value' => function($model){
                            return $model->vehicle->image;
                        }
                    ],
                    [
                        'label' => 'รูปป้ายทะเบียน',
                        'value' => function($model){
                            return $model->vehicle->plate_image;
                        }
                    ],
                    [
                        'label' => 'สถานะใบคำร้อง',
                        'value' => function($model) {
                            return $model->getStatusName();
                        },
                    ],
                ],
            ]) ?>
                </div>
                <div class="col-12"></div>
            </div>
            
        </div>
    </div>    
    

    
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    

</div>


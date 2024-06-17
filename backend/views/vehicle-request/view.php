<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap5\Modal;
use yii\helpers\Url;
use common\models\VehicleRequest;
use common\models\Vehicle;

/** @var yii\web\View $this */
/** @var common\models\VehicleRequest $model */

$this->title = $model->employeeInfo->fullname;
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
                    <h1 class="text-center"><?php echo $model->vehicle->plate ?></h1>
                    <h1 class="mt-3 text-center"><?php echo $model->vehicle->provinceInfo->name;  ?></h1>
                </div> 
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="text-body-secondary text-start">
                                        <div class="fs-4 fw-semibold"><i class="fa-regular fa-square-info fa-xl"></i> ข้อมูลผู้ลงทะเบียน</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <th scope="row"> <?php echo $model->employeeInfo->attributeLabels()['fullname'] ?></th>
                                                <td><?php echo $model->employeeInfo->fullname ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> <?php echo $model->attributeLabels()['requested_role'] ?></th>
                                                <td><?php echo VehicleRequest::listRoles()[$model->requested_role]; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> <?php echo $model->attributeLabels()['status'] ?></th>
                                                <td><?php echo badgeStatus($model) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="text-body-secondary text-start">
                                        <div class="fs-4 fw-semibold"><i class="fa-regular fa-square-info fa-xl"></i> ข้อมูลยานพาหนะ</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <th scope="row"> <?php echo $model->vehicle->attributeLabels()['type'] ?></th>
                                                <td><?php echo Vehicle::listTypes()[$model->vehicle->type]; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> <?php echo $model->vehicle->attributeLabels()['plate'] ?></th>
                                                <td><?php echo $model->vehicle->plate; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> <?php echo $model->vehicle->attributeLabels()['plate_province'] ?></th>
                                                <td><?php echo $model->vehicle->provinceInfo->name; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> <?php echo $model->vehicle->attributeLabels()['brand'] ?></th>
                                                <td><?php echo $model->vehicle->brand; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> <?php echo $model->vehicle->attributeLabels()['color'] ?></th>
                                                <td><?php echo $model->vehicle->color; ?></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <div class="row">
        <div class="col-6">
            <h4><?php echo $model->vehicle->attributeLabels()['image'] ?></h4>
                <?php
                    if($model->vehicle->image != ""){
                        $imageUrl = Url::to('@web/uploads/' . $model->vehicle->image);
                        echo Html::img($imageUrl, ['class' => 'img-thumbnail', 'alt' => 'Vehicle Image']);
                    }else{
                        echo "ไม่มีรูปภาพ";
                    }
                ?>        
        </div>
        <div class="col-6">
            <h4><?php echo $model->vehicle->attributeLabels()['plate_image'] ?></h4>
                <?php
                    if($model->vehicle->plate_image != ""){
                        $plateUrl = Url::to('@web/uploads/' . $model->vehicle->plate_image);
                        echo Html::img($plateUrl, ['class' => 'img-thumbnail', 'alt' => 'Vehicle Image']);
                    }else{
                        echo "ไม่มีรูปภาพ";
                    }
                ?>
        </div>
    </div>
    
    <p class="text-center mt-3">
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>

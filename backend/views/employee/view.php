<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Booking;

/** @var yii\web\View $this */
/** @var common\models\Employee $model */

$this->title = $model->fullname;
// $this->subTitle = $model->fullnameEn;
// $this->meta = $model->code;

$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$this->disableTitleDisplay = true;

$bookingModel = Booking::find()->where(['source_id' => $model->code])->one();
$bookingButton = isset($bookingModel->id) ? Html::a('Booked', ['/booking/' . $bookingModel->id], ['class' => 'btn btn-outline-success mb-2"']) : '<button class="btn btn-outline-secondary" type="button">Booking</button>';
?>

<div class="row g-4">
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <h2 class="fs-2 mb-2 me-2"><?php echo $model->fullname ?> <small class="text-body-secondary"><?php echo $model->code ?></small></h2>
        <h3 class="fs-3 mb-4 text-body-secondary"><?php echo $model->fullnameEn ?></h3>
    </div>
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <?php echo $bookingButton ?>
        </div>
    </div>
</div>


<div class="row g-4">
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <div class="text-body-secondary text-start">
                            <div class="fs-4 fw-semibold"><i class="fa-regular fa-square-info fa-xl"></i> ข้อมูลพนักงาน</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-2">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <th scope="row"> <?php echo $model->attributeLabels()['code'] ?></th>
                                    <td><?php echo $model->code ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> <?php echo $model->attributeLabels()['fullname'] ?></th>
                                    <td><?php echo $model->fullname ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> <?php echo $model->attributeLabels()['fullnameEn'] ?></th>
                                    <td><?php echo $model->fullnameEn ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-2">
                        <div class="text-body-secondary text-start">
                            <div class="fs-4 fw-semibold"><i class="fa-regular fa-industry-windows fa-xl"></i> ข้อมูลหน่วยงาน</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-2">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <th scope="row"> Company</th>
                                    <td><?php echo $model->meta['company_code'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> Plant</th>
                                    <td><?php echo $model->meta['plant'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> Div.</th>
                                    <td><?php echo $model->meta['div'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> Location</th>
                                    <td><?php echo $model->meta['location'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> Section</th>
                                    <td><?php echo $model->meta['section'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> Department</th>
                                    <td><?php echo $model->meta['department'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- - Booking Info<br />
- Questionair Info -->
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Activity;
use common\models\Booking;

/** @var yii\web\View $this */
/** @var common\models\Booking $model */

if (userRole() === 'Manager') {
    if (user()->username == 'denso_bpk')
        $url = 'bpk';
    else if (user()->username == 'denso_wgr')
        $url = 'wgr';
} else {
    $url = 'index';
}


$this->title = $model->employee->code;
if (!isset($partial))
    $this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => [$url]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$this->disableTitleDisplay = true;


$activityButton = Html::a('<i class="fa-solid fa-syringe"></i> ' . (isset($activityModel->id) ? 'ยกเลิก' : 'บันทึก'), ['/booking/vaccinated', 'id' => $model->id], ['class' => 'btn ' . (isset($activityModel->id) ? 'btn-outline-danger' : 'btn-success text-white') . ' btn-lg shadow mt-4 mb-4 fs-4']);
?>

<div class="row g-4">
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <h2 class="fs-2 mb-2 me-2"><?php echo $model->employee->fullname ?> <small class="text-body-secondary"><?php echo $model->employee->code ?></small></h2>
        <h3 class="fs-3 mb-4 text-body-secondary"><?php echo $model->employee->fullnameEn ?></h3>
    </div>
    <div class="col-12 col-sm-6 col-xl-6 col-xxl-6">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <div class="row">
                <div class="col-12 col-sm-12 col-xl-12 col-xxl-12">
                    <?php if ($model->method === Booking::METHOD_ONLINE) : ?>
                        <h2 class="fs-2 mb-2 me-2"><?php echo $model->period->name ?> <small class="text-body-secondary"><?php echo substr($model->target->time_start, 0, 5) . ' - ' . substr($model->target->time_end, 0, 5) ?></small></h2>
                        <h3 class="fs-3 text-body-secondary"><?php echo Yii::$app->date->date('วันlที่ j F', strtotime($model->target->slot_date)) ?></h3><br />
                    <?php endif ?>
                </div>
            </div>
            <?php echo $activityButton ?>
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
                                    <th scope="row"> <?php echo $model->employee->attributeLabels()['code'] ?></th>
                                    <td><?php echo $model->employee->code ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> <?php echo $model->employee->attributeLabels()['fullname'] ?></th>
                                    <td><?php echo $model->employee->fullname ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> <?php echo $model->employee->attributeLabels()['fullnameEn'] ?></th>
                                    <td><?php echo $model->employee->fullnameEn ?></td>
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
                            <div class="fs-4 fw-semibold"><i class="fa-regular fa-calendar-days fa-xl"></i> ข้อมูลการจอง <span class="badge text-bg-<?php echo $model->method === Booking::METHOD_ONLINE ? 'info' : 'secondary' ?> text-white fw-normal"><?php echo $model->method === Booking::METHOD_ONLINE ? 'Online' : 'Walk In' ?></span></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-2">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <th scope="row"> สถานที่รับบริการ</th>
                                    <td><?php echo $model->period->name ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> วันที่รับบริการ</th>
                                    <td>
                                        <?php echo $model->method === Booking::METHOD_ONLINE ? Yii::$app->date->date('วันlที่ j F Y', strtotime($model->target->slot_date)) : Yii::$app->date->date('วันlที่ j F Y', strtotime($model->walkin_date)) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"> เวลาที่รับบริการ</th>
                                    <td>
                                        <?php echo $model->method === Booking::METHOD_ONLINE ? $model->target->time_start . ' - ' . $model->target->time_end : $model->walkin_time ?>
                                    </td>
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
                                    <td><?php echo $model->employee->meta['company_code'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> Plant</th>
                                    <td><?php echo $model->employee->meta['plant'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> Div.</th>
                                    <td><?php echo $model->employee->meta['div'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> Location</th>
                                    <td><?php echo $model->employee->meta['location'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> Section</th>
                                    <td><?php echo $model->employee->meta['section'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"> Department</th>
                                    <td><?php echo $model->employee->meta['department'] ?></td>
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
                            <div class="fs-4 fw-semibold"><i class="fa-regular fa-file-check fa-xl"></i> ข้อมูล Consent</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-2">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <th scope="row"><u>ไม่มี</u> ประวัติแพ้ไข่ไก่อย่างรุนแรง </th>
                                    <td>
                                        <?php echo badgeYesNo($model->meta['allergic_egg'] == 1 ? 'success' : 'warning', $model->meta['allergic_egg']) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><u>ไม่มี</u> ไข้ หรือกำลังเจ็บป่วยเฉียบพลัน </th>
                                    <td>
                                        <?php echo badgeYesNo($model->meta['fever'] == 1 ? 'success' : 'warning', $model->meta['fever']) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><u>เคย</u> ได้รับวัคซีนป้องกันไข้หวัดใหญ่มาก่อน</th>
                                    <td>
                                        <?php echo badgeYesNo($model->meta['had_vaccine_before'] == 1 ? 'success' : 'warning', $model->meta['had_vaccine_before']) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><u>ไม่เคยมี</u> ประวัติการเกิดภาวะ Guillain-Barre Syndrome (กล้ามเนื้ออ่อนแรงเฉียบพลัน)
                                    </th>
                                    <td>
                                        <?php echo badgeYesNo($model->meta['guillain_barre_syndrome'] == 1 ? 'success' : 'warning', $model->meta['guillain_barre_syndrome']) ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
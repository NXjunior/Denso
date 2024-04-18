<?php

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Denso';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>

<div class="row g-4">
    <?php if (userRole() === 'Admin') : ?>
        <?php foreach ($activePeriodByCompany as $activePeriod) : ?>
            <div class="col-12 col-sm-6 col-xl-4 col-xxl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="fs-4 fw-semibold"><?php echo $activePeriod['name'] ?></div>
                        <div><?php echo $activePeriod['booked'] ?>/<?php echo $activePeriod['quota'] ?></div>
                        <div class="progress progress-thin my-2">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo round($activePeriod['percent'], 2) ?>%" aria-valuenow="<?php echo $activePeriod['percent'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div><small class="text-body-secondary"><?php echo round($activePeriod['percent'], 2) ?>% Booked</small>
                    </div>
                    <div class="card-footer bg-secondary text-white px-3 py-2">
                        <?php echo Html::a('<span class="fw-semibold">ข้อมูล</span><i class="fa-sharp fa-regular fa-arrow-right fa-xl"></i>', ['/denso/period/' . $activePeriod['id']], ['class' => 'btn-block text-white text-decoration-none d-flex justify-content-between align-items-center link-dark']) ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>

    <?php if (userRole() === 'Manager' && user()->username == 'denso_bpk') : ?>
        <div class="col-12 col-sm-6 col-xl-4 col-xxl-4">
            <div class="card">
                <div class="card-body">
                    <div class="fs-4 fw-semibold"><?php echo $activePeriodByCompany[0]['name'] ?></div>
                    <div><?php echo $activePeriodByCompany[0]['booked'] ?>/<?php echo $activePeriodByCompany[0]['quota'] ?></div>
                    <div class="progress progress-thin my-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo round($activePeriodByCompany[0]['percent'], 2) ?>%" aria-valuenow="<?php echo $activePeriodByCompany[0]['percent'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><small class="text-body-secondary"><?php echo round($activePeriodByCompany[0]['percent'], 2) ?>% Booked</small>
                </div>
                <div class="card-footer bg-secondary text-white px-3 py-2">
                    <?php echo Html::a('<span class="fw-semibold">ข้อมูล</span><i class="fa-sharp fa-regular fa-arrow-right fa-xl"></i>', ['/denso/period/' . $activePeriodByCompany[0]['id']], ['class' => 'btn-block text-white text-decoration-none d-flex justify-content-between align-items-center link-dark']) ?>
                </div>
            </div>
        </div>
    <?php endif ?>

    <?php if (userRole() === 'Manager' && user()->username == 'denso_wgr') : ?>
        <div class="col-12 col-sm-6 col-xl-4 col-xxl-4">
            <div class="card">
                <div class="card-body">
                    <div class="fs-4 fw-semibold"><?php echo $activePeriodByCompany[1]['name'] ?></div>
                    <div><?php echo $activePeriodByCompany[1]['booked'] ?>/<?php echo $activePeriodByCompany[1]['quota'] ?></div>
                    <div class="progress progress-thin my-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo round($activePeriodByCompany[1]['percent'], 2) ?>%" aria-valuenow="<?php echo $activePeriodByCompany[1]['percent'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><small class="text-body-secondary"><?php echo round($activePeriodByCompany[1]['percent'], 2) ?>% Booked</small>
                </div>
                <div class="card-footer bg-secondary text-white px-3 py-2">
                    <?php echo Html::a('<span class="fw-semibold">ข้อมูล</span><i class="fa-sharp fa-regular fa-arrow-right fa-xl"></i>', ['/denso/period/' . $activePeriodByCompany[1]['id']], ['class' => 'btn-block text-white text-decoration-none d-flex justify-content-between align-items-center link-dark']) ?>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>
<?php

use common\models\BaseDataSchool;
use common\models\Semester;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use common\models\Booking;
use common\models\Slot;
use yii\web\JsExpression;

use yii\bootstrap5\Html;
use yii\web\View;
use Faker\Provider\Base;
use \kartik\form\ActiveForm;
use kartik\date\DatePicker;

?>


<style>
  .tab-content-section {
    background-color: var(--cui-secondary-start);
  }

  .dotted {
    border-bottom-style: dashed;
    border-color: var(--cui-secondary);
  }
</style>

<div class="row">
  <div class="col-12 col-md-3"></div>
  <div class="col-12 col-md-6">
    <?php echo $this->render('_stepper', [
      'stage' => 3,
    ]); ?>
  </div>
  <div class="col-12 col-md-3"></div>
</div>

<?php if (Yii::$app->session->hasFlash('updateSuccess')) { ?>
  <div class="alert alert-success" role="alert">
    <i class="fa-regular fa-circle-check me-2"></i> <?php echo Yii::$app->session->getFlash('updateSuccess'); ?>
  </div>
<?php } ?>

<div class="container align-middle mb-5 pb-5">
  <?php $form = ActiveForm::begin([
    'id' => 'register-form',
    'options' => ['class' => 'needs-validation novalidate', 'novalidate' => true],
    'bsVersion' => 5
  ]);
  ?>

  <div class="row justify-content-center mb-3">
    <div class="col-lg-12 col-md-12">
      <div class="card d-block d-md-flex row">

        <div class="card-header p-4">
          <div class="row d-flex justify-content-between">
            <div class="col-12 col-lg-6 col-md-6">
              <?php echo $this->render('_identity', [
                'identity' => $model->source_id . ' (' .  $model->employee->fullname . ')',
              ]); ?>
            </div>
            <?php if ($model->errors) : ?>
              <div class="col-12 col-lg-6 col-md-6">
                <div class="alert alert-danger" role="alert">
                  <?php echo $form->errorSummary($model) ?>
                </div>
              </div>
            <?php endif ?>
          </div>
        </div>

        <div class="card-body px-5 pt-5 pb-5">
          <div class="row align-items-md-stretch">
            <div class="col-md-6 mb-4">
              <div class="h-100 p-5 bg-success-subtle border border-success rounded-3">
                <h2 class="border-bottom border-success border-opacity-25 pb-2" data-coreui-i18n="success">สำเร็จ!</h2>
                <dl class="row mt-4 lh-lg">
                  <dt class="col-sm-5 fs-4 fw-normal text-light-emphasis mt-1" data-coreui-i18n="companyName">>ชื่อหน่วยงาน/บริษัท</dt>
                  <dd class="col-sm-7 fs-4 fw-normal text-light-emphasis dotted"><?php echo $model->employee->company->name ?></dd>
                  <dt class="col-sm-5 fs-4 fw-normal text-light-emphasis mt-1" data-coreui-i18n="fullname">>ชื่อ-นามสกุล</dt>
                  <dd class="col-sm-7 fs-4 fw-normal text-light-emphasis dotted"><?php echo $model->employee->fullname ?></dd>
                  <dt class="col-sm-5 fs-4 fw-normal text-light-emphasis mt-1" data-coreui-i18n="employeeId">>รหัสพนักงาน</dt>
                  <dd class="col-sm-7 fs-4 fw-normal text-light-emphasis dotted"><?php echo $model->employee->code ?></dd>
                  <dt class="col-sm-5 fs-4 fw-normal text-light-emphasis mt-1" data-coreui-i18n="serviceLocation">>สถานที่รับบริการ</dt>
                  <dd class="col-sm-7 fs-4 fw-normal text-light-emphasis dotted"><?php echo $model->period->name ?></dd>
                  <dt class="col-sm-5 fs-4 fw-normal text-light-emphasis mt-1" data-coreui-i18n="serviceDate">>วันที่รับบริการ</dt>
                  <dd class="col-sm-7 fs-4 fw-normal text-light-emphasis dotted"><?php echo Yii::$app->date->date('วันlที่ j F Y', strtotime($model->target->slot_date)) ?></dd>
                  <dt class="col-sm-5 fs-4 fw-normal text-light-emphasis mt-1" data-coreui-i18n="serviceTime">เวลาที่รับบริการ</dt>
                  <dd class="col-sm-7 fs-4 fw-normal text-light-emphasis dotted"><?php echo $model->target->time_start . ' - ' . $model->target->time_end ?></dd>
                </dl>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                <h2>QR Code</h2>
                <?php echo $qrImage ?>
                <!-- <img src="/img/qr.png" class="card-img-top" alt="qr code"> -->
              </div>
            </div>
          </div>
        </div>

        <div class="card-footer p-4">
          <div class="row">
            <div class="col-12 text-center text-dark" data-coreui-i18n="qrSaveRemark">
              กรุณาบันทึก QR Code ไว้เพื่อใช้ในการฉีดวัคซีน
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php ActiveForm::end(); ?>
</div>
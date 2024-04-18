<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'ระบบจองเวลาฉีดวัคซีน';
$dirAsset = Yii::$app->assetManager->getPublishedUrl('@coreui/dist');

?>

<div class="min-vh-100 d-flex flex-row align-items-center" style="height: 80vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="card-group d-block d-md-flex row ">
          <div class="card col-md-7 p-4 mb-0 rounded-5">
            <div class="card-header bg-body border-0 d-flex flex-row-reverse ">
              <?php echo $this->render('@coreui/views/layouts/_i18next'); ?>
            </div>
            <div class="card-body bg-body rounded-4">
              <div class="container text-center mb-4">
                <div class="row justify-content-center">
                  <div class="col-12">
                    <img src="<?php echo Yii::$app->params['logoImage'] ?>" width="70%" style="max-width: 240px;" />
                    <h1 data-coreui-i18n="systemName"><?php echo $this->title ?></h1>
                  </div>
                </div>
              </div>
              <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
              <?php if (Yii::$app->session->hasFlash('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Oops!</strong> <span data-coreui-i18n="notFoundEmployeeCode"><?php echo Yii::$app->session->getFlash('error') ?></span>
                  <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>

              <?php echo $form->field($model, 'company_id')->hiddenInput(['value' => $companyModel->id])->label(false);
              ?>


              <?php
              echo $form->field($model, 'username', [

                'labelOptions' => ['label' => false, 'class' => 'hidden'],
                'inputOptions' => [
                  'class' => 'form-control form-control-lg',
                  'placeholder' => 'เลขประจำตัวพนักงาน 7 หลัก',
                  'data-coreui-i18n' => "employeeCode",
                  'value' => '',
                ],
                'inputTemplate' => '<div class="input-group input-group-lg mb-0">
                                      <span class="input-group-text">
                                      <svg class="icon icon-xl">
                                          <use xlink:href="' . $this->params['dirAsset'] . '/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                      </svg>
                                      </span>
                                      {input}
                                  </div>',
              ])->textInput([
                'length' => 13,
                'maxlength' => 13,
                'minlength' => 13,
                'type' => 'number',
              ]) ?>

              <div class="row">
                <div class="col-12">
                  <?php echo Html::submitButton('ตรวจสอบ', [
                    'class' => 'btn btn-brand btn-lg px-4 float-end',
                    'name' => 'login-button',
                    'data-coreui-i18n' => "check"
                  ]) ?>
                </div>
              </div>
              <?php ActiveForm::end(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
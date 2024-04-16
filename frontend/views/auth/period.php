<?php

// use yii\bootstrap5\ActiveForm;
use kartik\form\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'ระบบจองเวลาฉีดวัคซีน';
$dirAsset = Yii::$app->assetManager->getPublishedUrl('@coreui/dist');

?>
<div class="min-vh-100 d-flex flex-row align-items-center">
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

              <?php $form = ActiveForm::begin(['id' => 'login-form', 'bsVersion' => 5]); ?>

              <?php if (Yii::$app->session->hasFlash('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Oops!</strong> <?php echo Yii::$app->session->getFlash('error') ?>
                  <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>

              <?php if (Yii::$app->session->hasFlash('hasBookedPeriod')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Oops!</strong> <span data-coreui-i18n="hasBooked, {'period_name': <?php echo Yii::$app->session->getFlash('hasBookedPeriod') ?>}"><?php echo Yii::$app->session->getFlash('hasBooked') ?></span>
                  YES/NO
                  <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif; ?>

              <?php echo $form->field($model, 'company_id')->hiddenInput(['value' => $companyModel->id])->label(false);
              ?>

              <?php echo $form->field($model, 'period_id', [
                'template' => '<div class="d-grid gap-2">{input}{error}{hint}</div>',
              ])->radioButtonGroup($periodOptions, [
                'class' => 'btn-group btn-group-lg ',
                // 'item' => function ($index, $label, $name, $checked, $value) use ($model) {

                //   $checked = ($model->period_id && $value == $model->period_id) ? 'checked' : '';

                //   $return = '<input type="radio" id="loginform-period_id--' . $model->period_id . '" class="btn-check" name="' . $name . '" value="' . $value . '"  data-index="' . $model->period_id . '" autocomplete="off" ' . $checked . '>';
                //   $return .= '<label class="btn btn-outline-primary" for="loginform-period_id--' . $model->period_id . '">' . $label . '</label>';
                //   return $return;
                // },
                'itemOptions' => [
                  'labelOptions' => ['class' => 'btn btn-outline-primary']
                ],
                // 'onchange' => '
                //   $("[for=loginform-period_id--' . $model->period_id . ']").removeClass("active");
                //   $("#loginform-period_id--' . $model->period_id . '").attr("checked", false);
                // '
              ])->label('');
              ?>

              <div class="row">
                <div class="col-12">

                  <?php
                  if (isset($hasBooked)) {
                    $buttonText = 'เปลี่ยนสถานที่';
                    $buttonLabel = 'changeLocation';
                  } else {
                    $buttonText = $userInPeriod ? 'เข้าสู่ระบบ' : 'เริ่มจอง';
                    $buttonLabel = $userInPeriod ? 'signIn' : 'chooseLocation';
                  }
                  ?>
                  <?php echo Html::submitButton($buttonText, [
                    'class' => 'btn btn-brand btn-lg px-4 float-end',
                    'name' => 'login-button',
                    'data-coreui-i18n' => $buttonLabel
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
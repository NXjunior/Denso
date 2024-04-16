<?php

use common\models\BaseDataSchool;
use common\models\Semester;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use common\models\Course;
use yii\web\JsExpression;

use yii\bootstrap5\Html;
use yii\web\View;
use common\models\booking;
use Faker\Provider\Base;
use \kartik\form\ActiveForm;

$optionsConfig = [0, 1];
$optionsLabel = [0 => 'No', 1 => 'Yes'];

?>


<style>
  .tab-content-section {
    background-color: var(--cui-secondary-start);
  }
</style>

<div class="row">
  <div class="col-12 col-md-3"></div>
  <div class="col-12 col-md-6">
    <?php echo $this->render('_stepper', [
      'stage' => 1,
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


        <div class="card-body px-5 pt-5 pb-0">
          <div class="row mb-1">
            <div class="col-md-6 mb-3">
              <?php $allergicEgg = array_search($modelMeta->allergic_egg, $optionsConfig); ?>
              <?php echo $form->field($modelMeta, 'allergic_egg', [
                'labelOptions' => [
                  'class' => 'form-label pe-4',
                  'data-coreui-i18n' => 'eggAllergic'
                ],
                'template' => '<span class="fs-5">{label}</span><br>{input}{hint}{error}'
              ])->radioButtonGroup($optionsLabel, [
                'class' => 'btn-group btn-group-lg ',
                'item' => function ($index, $label, $name, $checked, $value) use ($modelMeta) {
                  $checked = ($modelMeta->allergic_egg && $value == $modelMeta->allergic_egg) ? 'checked' : '';
                  $return = '<input type="radio" id="bookingmeta-allergic-egg--' . $index . '" class="btn-check" name="' . $name . '" value="' . $value . '"  data-index="' . $index . '" autocomplete="off" ' . $checked . '>';
                  $return .= '<label class="btn btn-outline-primary" for="bookingmeta-allergic-egg--' . $index . '" data-coreui-i18n="' . strtolower($label) . '">' . $label . '</label>';
                  return $return;
                },
                'itemOptions' => [
                  'labelOptions' => [
                    'class' => 'btn btn-outline-primary',
                  ]
                ],
                'onchange' => '
                  $("[for=bookingmeta-allergic-egg--' . $allergicEgg . ']").removeClass("active");
                  $("#bookingmeta-allergic-egg--' . $allergicEgg . '").attr("checked", false);
                '
              ])->label('<span class="fs-5">ท่านมีประวัติ<strong class="text-decoration-underline">แพ้ไข่ไก่</strong>อย่างรุนแรง หรือไม่</span>');
              ?>
            </div>

            <div class="col-md-6 mb-3">
              <?php $fever = array_search($modelMeta->fever, $optionsConfig); ?>
              <?php echo $form->field($modelMeta, 'fever', [
                'labelOptions' => [
                  'class' => 'form-label pe-4',
                  'data-coreui-i18n' => 'feverStatus'
                ],
                'template' => '<span class="fs-5">{label}</span><br>{input}{hint}{error}'
              ])->radioButtonGroup($optionsLabel, [
                'class' => 'btn-group btn-group-lg ',
                'item' => function ($index, $label, $name, $checked, $value) use ($modelMeta) {
                  $checked = ($modelMeta->fever && $value == $modelMeta->fever) ? 'checked' : '';
                  $return = '<input type="radio" id="bookingmeta-fever--' . $index . '" class="btn-check" name="' . $name . '" value="' . $value . '"  data-index="' . $index . '" autocomplete="off" ' . $checked . '>';
                  $return .= '<label class="btn btn-outline-primary" for="bookingmeta-fever--' . $index . '" data-coreui-i18n="' . strtolower($label) . '">' . $label . '</label>';
                  return $return;
                },
                'itemOptions' => [
                  'labelOptions' => ['class' => 'btn btn-outline-primary']
                ],
                'onchange' => '
                  $("[for=bookingmeta-fever--' . $fever . ']").removeClass("active");
                  $("#bookingmeta-fever--' . $fever . '").attr("checked", false);
                '
              ])->label('<span class="fs-5">ท่านกำลัง<strong class="text-decoration-underline">มีไข้</strong> หรือกำลังเจ็บป่วยเฉียบพลัน หรือไม่</span>');
              ?>
            </div>
          </div>

          <div class="row mb-1">
            <div class="col-md-6 mb-3">
              <?php $had = array_search($modelMeta->had_vaccine_before, $optionsConfig); ?>
              <?php echo $form->field($modelMeta, 'had_vaccine_before', [
                'labelOptions' => [
                  'class' => 'form-label pe-4',
                  'data-coreui-i18n' => 'hadVaccineBefore'
                ],
                'template' => '<span class="fs-5">{label}</span></span><br>{input}{hint}{error}'
              ])->radioButtonGroup($optionsLabel, [
                'class' => 'btn-group btn-group-lg ',
                'item' => function ($index, $label, $name, $checked, $value) use ($modelMeta) {
                  $checked = ($modelMeta->had_vaccine_before && $value == $modelMeta->had_vaccine_before) ? 'checked' : '';
                  $return = '<input type="radio" id="bookingmeta-had-vaccine-before--' . $index . '" class="btn-check" name="' . $name . '" value="' . $value . '"  data-index="' . $index . '" autocomplete="off" ' . $checked . '>';
                  $return .= '<label class="btn btn-outline-primary" for="bookingmeta-had-vaccine-before--' . $index . '" data-coreui-i18n="' . strtolower($label) . '">' . $label . '</label>';
                  return $return;
                },
                'itemOptions' => [
                  'labelOptions' => ['class' => 'btn btn-outline-primary']
                ],
                'onchange' => '
                  $("[for=bookingmeta-had-vaccine-before--' . $had . ']").removeClass("active");
                  $("#bookingmeta-had-vaccine-before--' . $had . '").attr("checked", false);
                '
              ])->label('<span class="fs-5">คุณ<strong class="text-decoration-underline">เคย</strong>ได้รับวัคซีนป้องกันไข้หวัดใหญ่มาก่อน หรือไม่</span>');
              ?>
            </div>
            <div class="col-md-6 mb-3">
              <?php $guillain = array_search($modelMeta->guillain_barre_syndrome, $optionsConfig); ?>
              <?php echo $form->field($modelMeta, 'guillain_barre_syndrome', [
                'labelOptions' => [
                  'class' => 'form-label pe-4',
                  'data-coreui-i18n' => 'guillainBarreSyndrome'
                ],
                'template' => '<span class="fs-5">{label}</span><br>{input}{hint}{error}'
              ])->radioButtonGroup($optionsLabel, [
                'class' => 'btn-group btn-group-lg ',
                'item' => function ($index, $label, $name, $checked, $value) use ($modelMeta) {
                  $checked = ($modelMeta->guillain_barre_syndrome && $value == $modelMeta->guillain_barre_syndrome) ? 'checked' : '';
                  $return = '<input type="radio" id="bookingmeta-guillain-barre-syndrome--' . $index . '" class="btn-check" name="' . $name . '" value="' . $value . '"  data-index="' . $index . '" autocomplete="off" ' . $checked . '>';
                  $return .= '<label class="btn btn-outline-primary" for="bookingmeta-guillain-barre-syndrome--' . $index . '" data-coreui-i18n="' . strtolower($label) . '">' . $label . '</label>';
                  return $return;
                },
                'itemOptions' => [
                  'labelOptions' => ['class' => 'btn btn-outline-primary']
                ],
                'onchange' => '
                  $("[for=bookingmeta-guillain-barre-syndrome--' . $guillain . ']").removeClass("active");
                  $("#bookingmeta-guillain-barre-syndrome--' . $guillain . '").attr("checked", false);
                '
              ])->label('<span class="fs-5">ท่าน<strong class="text-decoration-underline">เคย</strong>มีประวัติการเกิดภาวะ Guillain-Barre Syndrome (กล้ามเนื้ออ่อนแรงเฉียบพลัน) ภายใน 6 สัปดาห์ หลังจากที่ได้รับ วัคซีนไข้หวัดใหญ่ หรือไม่</span>');
              ?>
            </div>
          </div>


          <div class="row mb-1">
            <div class="col-md-12 text-center mb-3">
              <p class="font-monospace text-warning" data-coreui-i18n="consentRemark">*** ข้าพเจ้ายินยอมให้ใช้ข้อมูลในเอกสารฉบับนี้ เพื่อการฉีดวัคซีนไข้หวัดใหญ่เท่านั้น ***</p>
            </div>
          </div>
        </div>


        <div class="card-footer p-4">
          <div class="row">
            <div class="col-12 col-md-6 ">
              <div class="form-check px-4 mt-3">
                <?php
                $model->confirm = null;
                echo $form->field($model, 'confirm', [
                  'labelOptions' => [
                    'class' => 'm-0',
                    'data-coreui-i18n' => 'acceptTerm'
                  ],
                ])->checkbox([
                  'custom' => true,
                  'ng-model' => "confirm",
                  'ng-checked' => "confirm",
                  'ng-change' => "!confirm",
                ])->label('ท่านได้รับข้อมูลเกี่ยวกับวัคซีนไข้หวัดใหญ่และได้ทำความเข้าใจแล้ว<br/>และมีความประสงค์ เข้ารับบริการฉีดวัคซีนไข้หวัดใหญ่ ประจำปี 2567');
                ?>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <?php echo Html::submitButton(!$model->completed_at ? 'บันทึกข้อมูล' : 'อัพเดทข้อมูล', [
                'class' => 'btn btn-brand btn-lg px-4 mt-3 float-end',
                'name' => 'login-button',
                'ng-disabled' => 'summitting || !confirm',
                'ng-click' => 'submit($event)',
                'data-coreui-i18n' => !$model->completed_at ? 'save' : 'update'
              ]) ?>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php ActiveForm::end(); ?>
</div>
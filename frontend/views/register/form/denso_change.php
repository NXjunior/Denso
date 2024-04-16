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
      'stage' => null,
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
    'id' => 'change-form',
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

          <?php echo $form->field($model, 'company_id')->hiddenInput(['value' => $model->company_id])->label(false);
          ?>
          <?php echo $form->field($model, 'source_id')->hiddenInput(['value' => $model->source_id])->label(false);
          ?>

          <?php echo $form->field($model, 'period_id', [
            'template' => '<div class="d-grid gap-2">{input}{error}{hint}</div>',
          ])->radioButtonGroup($periodOptions, [
            'class' => 'btn-group btn-group-lg ',
            'item' => function ($index, $label, $name, $checked, $value) use ($model) {

              $checked = ($model->period_id && $value == $model->period_id) ? 'checked' : '';

              $return = '<input type="radio" id="booking-period_id--' . $value . '" class="btn-check" name="' . $name . '" value="' . $value . '"  data-index="' . $value . '" autocomplete="off" ' . $checked . '>';
              $return .= '<label class="btn btn-outline-primary" for="booking-period_id--' . $value . '">' . $label . '</label>';
              return $return;
            },
            'itemOptions' => [
              'labelOptions' => ['class' => 'btn btn-outline-primary']
            ],
            'onchange' => '
                  $("[for=booking-period_id--' . $model->period_id . ']").removeClass("active");
                  $("#booking-period_id--' . $model->period_id . '").attr("checked", false);
                '
          ])->label('');
          ?>
        </div>

        <div class="card-footer p-4">
          <div class="row">
            <div class="col-12 col-md-6 ">

            </div>
            <div class="col-12 col-md-6">
              <?php echo Html::submitButton('เปลี่ยนสถานที่', [
                'class' => 'btn btn-brand btn-lg px-4 mt-3 float-end',
                'name' => 'change-button',
                'id' => 'change-button',
                'data-coreui-i18n' => 'changeLocation'
              ]) ?>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php ActiveForm::end(); ?>
</div>


<?php
$script = <<<JQUERY

    $(document).ready(function() {

      if($('input[name="Booking[period_id]"]:checked').val() == $model->period_id)
        $('#change-button').attr('disabled', true);
      else
        $('#change-button').attr('disabled', false);

      $('form :input').change(function() {
        if($('input[name="Booking[period_id]"]:checked').val() == $model->period_id)
          $('#change-button').attr('disabled', true);
        else
          $('#change-button').attr('disabled', false);
      });
    });

JQUERY;

?>

<?php $this->registerJs($script, View::POS_END); ?>
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

$optionsConfig = [0, 1];
$optionsLabel = [0 => 'No', 1 => 'Yes'];

$today = new \DateTime();
$selectableDate = $today;
$selectableDate->modify('+' . Booking::CONFIG_GAPDATE . ' day');

$allSlotDateArray = [];
foreach ($allSlotDate as $date) {
  $allSlotDateArray[] = 'new Date("' . $date['slot_date'] . ' 00:00:00")';
}

$rows = '';
foreach ($slots as $slot) {

  $rowInfo = '';
  $sumQuota = $sumBooked = $sumVisited = 0;
  foreach ($slot['slots'] as $slotInfoKey => $slotInfoValue) {
    if ($slotInfoKey === Slot::BREAK_TIME_START) {
      $rowInfo .= '<td class="px-0 align-middle bg-body-tertiary">
                <span class="badge text-bg-light fs-6 fw-normal px-2">Break</span>
              </td>';
    } else {

      $slotAvailable = $slotInfoValue['quota'] - $slotInfoValue['booked'];
      $rowInfo .= '<td class="active">
                    <h4><span class="badge bg-sky text-white fw-normal px-3">' . $slotAvailable . '</span></h4>
                    <input type="radio" class="btn-check" name="slot" id="slot-' . $slotInfoValue['id'] . '" autocomplete="off" value="' . $slotInfoValue['id'] . '">
                    <label class="btn btn-outline-primary ' . ($slotAvailable == 0 ? 'disabled' : '') . '" for="slot-' . $slotInfoValue['id'] . '" data-coreui-i18n="select" >เลือก</label>
                  </td>';
    }
  }
  $rows .= '<tr class="slot_date-' . $slot['date'] . '">' . $rowInfo . '</tr>';
}
?>


<style>
  .tab-content-section {
    background-color: var(--cui-secondary-start);
  }

  .datepicker table tr td.active.active button {
    color: #fff;
    border: none;
  }
</style>

<div class="row">
  <div class="col-12 col-md-3"></div>
  <div class="col-12 col-md-6">
    <?php echo $this->render('_stepper', [
      'stage' => 2,
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

          <?php if (Yii::$app->session->hasFlash('lastminuteSlotEmpty')) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Oops!</strong> <span data-coreui-i18n="lastminuteSlotEmpty, {'slot_info': <?php echo Yii::$app->session->getFlash('slotInfo') ?>}"></span>
              <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>

          <div class="row mb-1">
            <div class="col-md-4 mb-3">
              <p class="fs-4" data-coreui-i18n="selectDate">
                <span class="badge rounded-circle text-white text-bg-secondary fw-normal">1</span> ระบุวัน
              </p>
              <div class="well border border-secondary rounded p-1" style="width:305px">
                <?php echo $form->field($model, 'slot_date')->widget(DatePicker::classname(), [
                  'bsVersion' => 5,
                  'type' => DatePicker::TYPE_INLINE,
                  'size' => 'lg',
                  'language' => 'en',
                  'options' => ['placeholder' => 'Enter slot date ...'],
                  'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'startDate' => $selectableDate->format('Y-m-d'),
                    'endDate' => Booking::lastSlotDateInThisPeriod($model->period_id),
                    'datesDisabled' => Booking::DATES_DISABLED,
                    'beforeShowDay' => new \yii\web\JsExpression("function (dates) {
                        // console.log(dates);

                        function isInArray(array, value) {
                          return !!array.find(item => {return item.getTime() == value.getTime()});
                        }

                        const allSlotDate = [" . implode(", ", $allSlotDateArray) . "];

                        if(isInArray(allSlotDate, dates) && dates >= new Date('" . $selectableDate->format('Y-m-d') . " 00:00:00')  && dates <= new Date('" . Booking::lastSlotDateInThisPeriod($model->period_id) . " 00:00:00')){
                          return {
                            // classes: 'm-0 ',
                            tooltip: 'Selectable date',
                            content: '<button type=\"button\" class=\"btn btn-sm btn-outline-success rounded-1 fs-6 shadow m-0\">' + dates.getDate() + '</button>'
                          };
                        }
                      }"),
                  ],
                  'pluginEvents' => [
                    'changeDate' => new \yii\web\JsExpression("function (e) {
                        function pad(num, size) {
                          var s = '000000000' + num;
                          return s.substr(s.length-size);
                        }
                        const day = e.date.getDate();
                        const month = e.date.getMonth() + 1;
                        const year = e.date.getFullYear();
                        const selectedDate = year+'-'+pad(month,2)+'-'+pad(day,2);

                        const slotRowId = 'slot_date-' + selectedDate

                        $(\"tr[class*='slot_date-']\").css('display','none');
                        $('tr[class*='+slotRowId+']').css('display','table-row');
                      }"),
                  ],
                ])->label(''); ?>
              </div>
            </div>
            <div class="col-md-8 mb-3">
              <p class="fs-4" data-coreui-i18n="selectSlot">
                <span class="badge rounded-circle text-white text-bg-secondary fw-normal">2</span> เลือกเวลา
              </p>
              <div class="table-responsive slot-table">
                <table class="table table-bordered text-center mb-5">
                  <thead>
                    <tr class="bg-light-gray">
                      <th class="text-uppercase px-0">1<br /><small class="fw-normal">08:00-09:00</small></th>
                      <th class="text-uppercase px-0">2<br /><small class="fw-normal">09:00-10:00</small></th>
                      <th class="text-uppercase px-0">3<br /><small class="fw-normal">10:00-11:00</small></th>
                      <th class="text-uppercase px-0">4<br /><small class="fw-normal">11:00-12:00</small></th>
                      <th class="text-uppercase px-0">5<br /><small class="fw-normal">12:00-13:00</small></th>
                      <th class="text-uppercase bg-light px-0">6<br /><small class="fw-normal">13:00-14:00</small></th>
                      <th class="text-uppercase px-0">7<br /><small class="fw-normal">14:00-15:00</small></th>
                      <th class="text-uppercase px-0">8<br /><small class="fw-normal">15:00-16:00</small></th>
                      <th class="text-uppercase px-0">9<br /><small class="fw-normal">16:00-17:00</small></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php echo $rows ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>


        <div class="card-footer p-4">
          <div class="row">
            <div class="col-12 col-md-6 ">

            </div>
            <div class="col-12 col-md-6">
              <?php echo Html::submitButton(!$model->completed_at ? 'จอง' : 'อัพเดทข้อมูล', [
                'class' => 'btn btn-brand btn-lg px-4 mt-3 float-end',
                'name' => 'booking-button',
                'id' => 'booking-button',
                'data-coreui-i18n' => !$model->completed_at ? 'reserve' : 'update'
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
        $("tr[class*='slot_date-']").css("display","none");

        if($('input[name="slot"]:checked').val())
          $('#booking-button').attr('disabled', false);
        else
          $('#booking-button').attr('disabled', true);

        $('form :input').change(function() {
          if($('input[name="slot"]:checked').val())
            $('#booking-button').attr('disabled', false);
          else
            $('#booking-button').attr('disabled', true);
        });
    });

JQUERY;

?>

<?php $this->registerJs($script, View::POS_END); ?>
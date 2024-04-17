<?php

use yii\helpers\Html;
use \kartik\form\ActiveForm;
use common\models\Period;
use common\models\Slot;
use common\models\Employee;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\web\JsExpression;

/** @var yii\web\View $this */
/** @var common\models\Booking $model */
/** @var yii\widgets\ActiveForm $form */

$periodOptions = Period::find()->where(['company_id' => user()->company_id])->all();
$slotOptions = Slot::TIME_TABLE;

$dataList = Employee::find()->select(['code AS id', 'CONCAT(title, \' \',firstname, \' \', lastname) AS text'])->andWhere(['company_id' => user()->company_id])->asArray()->all();
$data = ArrayHelper::map($dataList, 'id', 'text');
$url = \yii\helpers\Url::to(['/employee/list']);

?>

<div class="booking-form row">

  <div class="col-12">
    <div class="card">
      <div class="card-body p-5">

        <?php $form = ActiveForm::begin(); ?>

        <?php echo $form->field($model, 'status')->hiddenInput()->label(false); ?>
        <?php echo $form->field($model, 'company_id')->hiddenInput()->label(false); ?>

        <?php echo $form->field($model, 'period_id', [
          'template' => '<div class="d-grid gap-2">{input}{error}{hint}</div>',
        ])->radioButtonGroup(ArrayHelper::map($periodOptions, 'id', 'name'), [
          'class' => 'btn-group btn-group-lg',
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

        <?php echo $form->field($model, 'walkin_time', [
          'template' => '<div class="d-grid gap-2 pt-2">{input}{error}{hint}</div>',
        ])->radioButtonGroup(ArrayHelper::map($slotOptions, 'time_start', 'time_start'), [
          'class' => 'btn-group btn-group-lg ',
          'item' => function ($index, $label, $name, $checked, $value) use ($model) {
            $disabled = $label == Slot::BREAK_TIME_START ? 'disabled' : '';
            $checked = ($model->walkin_time && $value == $model->walkin_time) ? 'checked' : '';
            $return = '<input type="radio" id="booking-time_start--' . $value . '" class="btn-check" name="' . $name . '" value="' . $value . '"  data-index="' . $value . '" autocomplete="off" ' . $checked . ' ' . $disabled . '>';
            $return .= '<label class="btn btn-outline-' . ($label == Slot::BREAK_TIME_START ? 'secondary' : 'primary') . '" for="booking-time_start--' . $value . '">' . $label . '</label>';

            return $return;
          },
          'itemOptions' => [
            'labelOptions' => ['class' => 'btn btn-outline-primary']
          ],
          'onchange' => '
      $("[for=booking-time_start--' . $model->time_start . ']").removeClass("active");
      $("#booking-time_start--' . $model->time_start . '").attr("checked", false);
    '
        ])->label('');
        ?>

        <?php echo $form->field($model, 'source_id', [])
          ->widget(Select2::className(), [
            'data' => $data,
            'size' => Select2::LARGE,
            'options' => [
              'placeholder' => 'เลือกพนักงาน',
              'class' => 'form-select form-select-lg mb-3',
            ],
            'pluginOptions' => [

              'allowClear' => true,
              'minimumInputLength' => 3,
              'language' => [
                'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
              ],
              'ajax' => [
                'url' => $url,
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
              ],
              'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
              'templateResult' => new JsExpression('function(employee) { return employee.text; }'),
              'templateSelection' => new JsExpression('function (employee) { return employee.text; }'),
            ],
          ])->label('พนักงาน') ?>



        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <?= Html::submitButton('Create', ['class' => 'btn btn-success btn-lg text-white mt-4']) ?>
        </div>
        <?php ActiveForm::end(); ?>
      </div>
    </div>

  </div>
</div>
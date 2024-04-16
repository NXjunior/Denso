<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Slot $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="slot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'period_id')->hiddenInput()->label(false); ?>
    <?php echo $form->field($model, 'name')->hiddenInput()->label(false); ?>
    <?php echo $form->field($model, 'desp')->hiddenInput()->label(false); ?>
    <?php echo $form->field($model, 'note')->hiddenInput()->label(false); ?>
    <?php echo $form->field($model, 'extra')->hiddenInput()->label(false); ?>
    <?php echo $form->field($model, 'slot_date')->hiddenInput()->label(false); ?>
    <?php echo $form->field($model, 'time_start')->hiddenInput()->label(false); ?>
    <?php echo $form->field($model, 'time_end')->hiddenInput()->label(false); ?>
    <?php echo $form->field($model, 'creator')->hiddenInput()->label(false); ?>
    <?php echo $form->field($model, 'created_at')->hiddenInput()->label(false); ?>
    <?php echo $form->field($model, 'updater')->hiddenInput()->label(false); ?>
    <?php echo $form->field($model, 'updated_at')->hiddenInput()->label(false); ?>
    <?php echo $form->field($model, 'status')->hiddenInput()->label(false); ?>


    <?= $form->field($model, 'quota')->textInput() ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
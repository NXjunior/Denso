<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Period $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="period-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'company_id')->hiddenInput()->label(false); ?>
    <?php echo $form->field($model, 'creator')->hiddenInput()->label(false); ?>
    <?php echo $form->field($model, 'created_at')->hiddenInput()->label(false); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
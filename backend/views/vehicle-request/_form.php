<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\VehicleRequest $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vehicle-request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vehicle_id')->textInput() ?>

    <?= $form->field($model, 'requested_id')->textInput() ?>

    <?= $form->field($model, 'requested_role')->textInput() ?>

    <?= $form->field($model, 'approver')->textInput() ?>

    <?= $form->field($model, 'approved_at')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'creator')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updater')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

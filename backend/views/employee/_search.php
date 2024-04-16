<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\EmployeeSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'firstname') ?>

    <?php // echo $form->field($model, 'lastname') ?>

    <?php // echo $form->field($model, 'title_en') ?>

    <?php // echo $form->field($model, 'firstname_en') ?>

    <?php // echo $form->field($model, 'lastname_en') ?>

    <?php // echo $form->field($model, 'creator') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updater') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

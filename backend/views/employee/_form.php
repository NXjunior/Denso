<?php

use yii\helpers\Html;
use \kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\Employee $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="row g-4 justify-content-center mb-3 employee-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="col-lg-12 col-md-12">
        <div class="card d-block d-md-flex row">
            <div class="card-header p-4">
                <div class="row d-flex justify-content-between">
                    <h3><?php echo $this->title ?></h3>
                </div>
            </div>

            <div class="card-body px-4 pb-0">
                <div class="row mb-1">
                    <div class="col-md">
                        <?php
                        echo $form->field($model, 'code', [
                            'inputOptions' => [
                                'class' => 'form-control ',
                                'id' => 'code',
                                'placeholder' => 'ชื่อ',
                                'maxLength' => 7,
                            ],
                            'template' => '<div class="form-floating">{input}{label}{error}{hint}</div>',
                        ])->label('รหัสพนักงาน')->hint('ตัวเลข 7 หลัก ใช้ในการจองวัน') ?>
                    </div>
                    <div class="col-md">
                        <?php
                        echo $form->field($model, 'company_code', [
                            'inputOptions' => [
                                'class' => 'form-control ',
                                'id' => 'company_code',
                                'placeholder' => 'บริษัท',
                            ],
                            'template' => '<div class="form-floating">{input}{label}{error}{hint}</div>',
                        ])->label('บริษัท') ?>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md">
                        <?php echo $form->field($model, 'title', [
                            'inputOptions' => [
                                'id' => 'title',
                                'placeholder' => 'ระบุคำนำหน้าชื่อ',
                            ],
                            'template' => '<div class="form-floating ">{input}{label}{error}{hint}</div>',
                        ])->dropDownList(['นาย' => 'นาย', 'นาง' => 'นาง', 'นางสาว' => 'นางสาว', 'ว่าที่ร้อยตรี' => 'ว่าที่ร้อยตรี'], [
                            'class' => 'form-select pt-4',
                            'style' => 'line-height:25px',
                            'prompt' => 'ระบุคำนำหน้าชื่อ',
                        ])->label('คำนำหน้าชื่อ') ?>
                    </div>

                    <div class="col-md">
                        <?php
                        echo $form->field($model, 'firstname', [
                            'inputOptions' => [
                                'class' => 'form-control ',
                                'id' => 'firstname',
                                'placeholder' => 'ชื่อ',
                            ],
                            'template' => '<div class="form-floating">{input}{label}{error}{hint}</div>',
                        ])->label('ชื่อ') ?>
                    </div>

                    <div class="col-md">
                        <?php
                        echo $form->field($model, 'lastname', [
                            'inputOptions' => [
                                'class' => 'form-control',
                                'id' => 'lastname',
                                'placeholder' => 'สกุล',
                            ],
                            'template' => '<div class="form-floating">{input}{label}{error}{hint}</div>',
                        ])->label('สกุล') ?>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md">
                        <?php echo $form->field($model, 'title_en', [
                            'inputOptions' => [
                                'id' => 'title_en',
                                'placeholder' => 'Select Title',
                            ],
                            'template' => '<div class="form-floating ">{input}{label}{error}{hint}</div>',
                        ])->dropDownList(['Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Miss' => 'Miss', 'Act.2Nd Lt.' => 'Act.2Nd Lt.'], [
                            'class' => 'form-select pt-4',
                            'style' => 'line-height:25px',
                            'prompt' => 'Title',
                        ])->label('Title') ?>
                    </div>

                    <div class="col-md">
                        <?php
                        echo $form->field($model, 'firstname_en', [
                            'inputOptions' => [
                                'class' => 'form-control ',
                                'id' => 'firstname_en',
                                'placeholder' => 'First name',
                            ],
                            'template' => '<div class="form-floating">{input}{label}{error}{hint}</div>',
                        ])->label('First name') ?>
                    </div>

                    <div class="col-md">
                        <?php
                        echo $form->field($model, 'lastname_en', [
                            'inputOptions' => [
                                'class' => 'form-control',
                                'id' => 'lastname_en',
                                'placeholder' => 'Last name',
                            ],
                            'template' => '<div class="form-floating">{input}{label}{error}{hint}</div>',
                        ])->label('Last name') ?>
                    </div>
                </div>
            </div>

            <div class="card-footer p-4">
                <div class="row">
                    <div class="col-12 col-md-6 ">

                    </div>
                    <div class="col-12 col-md-6">
                        <?php
                        echo $form->field($model, 'company_id')->hiddenInput(['value' => 1])->label(false);
                        echo $form->field($model, 'creator')->hiddenInput(['value' => userId()])->label(false);
                        echo $form->field($model, 'status')->hiddenInput(['value' => 10])->label(false);
                        ?>
                        <?php echo Html::submitButton($model->isNewRecord ? 'บันทึก' : 'อัพเดทข้อมูล', ['class' => 'btn btn-brand btn-lg px-4 float-end', 'name' => 'login-button']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
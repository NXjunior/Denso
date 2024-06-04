<?php

use yii\helpers\Html;
use \kartik\form\ActiveForm;
use common\models\Employee;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use common\models\Province;

/** @var yii\web\View $this */
/** @var common\models\VehicleRequest $model */
/** @var yii\widgets\ActiveForm $form */

$dataList = Employee::find()->select(['code AS id', 'CONCAT(title, \' \',firstname, \' \', lastname, \' : \', code) AS text'])->andWhere(['company_id' => 1, 'id' => $model->requested_id])->asArray()->all();
$data = ArrayHelper::map($dataList, 'id', 'text');
$url = \yii\helpers\Url::to(['/employee/list']);


$provinceList = Province::find()->select(['id', 'name AS text'])->andWhere(['id' => $modelVehicle->province])->asArray()->all();
$provinceData = ArrayHelper::map($provinceList, 'id', 'text');
$urlProvince = \yii\helpers\Url::to(['/vehicle-request/list-province']);

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
                        echo $form->field($model, 'requested_id',  ['template' => '<div class="form-floating">{input}{label}{error}{hint}</div>',])
                            ->widget(Select2::className(), [
                                'data' => $data,
                                'size' => Select2::LARGE,
                                'options' => [
                                    'placeholder' => 'เลือกมนุษย์',
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
                            ])->label('เจ้าของรถ')
                        ?>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md">
                        <?php
                        echo $form->field($modelVehicle, 'plate', [
                            'inputOptions' => [
                                'class' => 'form-control ',
                                'id' => 'plate',
                                'placeholder' => 'เลขทะเบียน',
                                'maxLength' => 20,
                            ],
                            'template' => '<div class="form-floating">{input}{label}{error}{hint}</div>',
                        ])->label('เลขทะเบียน')->hint('') ?>
                    </div>
                    <div class="col-md">
                        <div class="col-md">
                            <?php echo $form->field($modelVehicle, 'province', ['template' => '<div class="form-floating">{input}{label}{error}{hint}</div>',])
                                ->widget(Select2::className(), [
                                    'data' => $provinceData,
                                    'size' => Select2::LARGE,
                                    'options' => [
                                        'placeholder' => 'เลือกจังหวัด',
                                        'class' => 'form-select form-select-lg mb-3',
                                    ],
                                    'pluginOptions' => [

                                        'allowClear' => true,
                                        'minimumInputLength' => 2,
                                        'language' => [
                                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                                        ],
                                        'ajax' => [
                                            'url' => $urlProvince,
                                            'dataType' => 'json',
                                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                                        ],
                                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                                        'templateResult' => new JsExpression('function(province) { return province.text; }'),
                                        'templateSelection' => new JsExpression('function (province) { return province.text; }'),
                                    ],
                                ])->label('จังหวัด') ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer p-4">
                <div class="row">
                    <div class="col-12 col-md-6 ">

                    </div>
                    <div class="col-12 col-md-6">
                        <?php echo Html::submitButton($model->isNewRecord ? 'บันทึก' : 'อัพเดทข้อมูล', ['class' => 'btn btn-brand btn-lg px-4 float-end', 'name' => 'login-button']) ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>
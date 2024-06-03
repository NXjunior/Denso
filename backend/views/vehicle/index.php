<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'method' => 'post',
]);
$this->title = "สวัสดีจั๊พ";
?>

<h1>Yooooooo</h1>
<?= Html::encode($hello) ?>

<h1 class="text-center">แบบฟอร์มลงทะเบียนรับสติ๊กเกอร์</h1>
<div class="row mt-5">
    <div class="col-12 mb-2" >
        <div class="row">
            <div class="col-2">
                <?= $form->field($model,'gender')->dropDownList([
                    'ด.ช.' => 'ด.ช.',
                    'ด.ญ.' => 'ด.ญ.',
                    'นาย' => 'นาย',
                    'นาง' => 'นาง',
                    'นางสาว' => 'นางสาว',
                ],
                ['prompt' => 'เลือกเพศ']
                ) ?>
            </div>
            <div class="col-5">        
                    <?= $form->field($model,'firstname')->textInput()  ?>
            </div>
            <div class="col-5">
                <?= $form->field($model,'lastname')->textInput() ?>
            </div>
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="row">
            <div class="col-4">
                <?= $form->field($model,'phone')->textInput() ?>
            </div>
            <div class="col-4">
                <?= $form->field($model,'role')->dropDownList([
                    'student' => 'นักเรียน',
                    'teacher' => 'ครูและบุคลากรทางการศึกษา',
                    'entrepreneur' => 'ผู้ประกอบการร้่านค้า',
                    'other'=>'อื่นๆ'
                ],
                [
                    'prompt' => 'กรุณาเลือกตำแหน่ง'
                ]) ?>
            </div>
            <div class="col-4">
                <?= $form->field($model,'position')->textInput() ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-12 mt-2">
        <div class="row">
            <div class="col-3">
                <?= $form->field($model,'house_no')->textInput() ?>
            </div>
            <div class="col-3">
                <?= $form->field($model,'moo')->textInput() ?>
            </div>
            <div class="col-3">
                <?= $form->field($model,'soi')->textInput() ?>
            </div>
            <div class="col-3">
                <?= $form->field($model,'road')->textInput() ?>
            </div>
        </div>
    </div>
    <div class="col-12 mt-2">
        <div class="row">
            <div class="col-3">
                <?= $form->field($model,'tambon')->textInput() ?>
            </div>
            <div class="col-3">
                <?= $form->field($model,'ampher')->textInput() ?>
            </div>
            <div class="col-3">
                <?= $form->field($model,'province')->textInput() ?>
            </div>
            <div class="col-3">
                <?= $form->field($model,'zip_code')->textInput() ?>
            </div>
        </div>
    </div>
    
    <div>
    
</div>
<div class="form-group  d-flex justify-content-center my-4">
    <?= Html::submitButton('register',['class'=>'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>

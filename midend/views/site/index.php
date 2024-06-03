<?php

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>


<div class="row site-index">
    <div class="col-lg-4 mb-3">
        <h2>In product</h2>
        <?php echo Html::a('พระนารายณ์ ใบมอบตัว', ['/paper/profile_phanarai'], ['class' => 'btn btn-success']); ?>&nbsp;
        <a class="btn btn-outline-secondary" href="https://t.nextschool.io/project/nextschool/issue/4265">Link Tree &raquo;</a>
        <br /><br />
        <?php echo Html::a('ไตรมิตร ใบมอบตัว', ['/paper/profile_traimit'], ['class' => 'btn btn-success']); ?>&nbsp;
        <a class="btn btn-outline-secondary" href="https://t.nextschool.io/project/nextschool/issue/4248">Link Tree &raquo;</a>
        <br /><br />
        <?php echo Html::a('พุทไธสง ปก ปพ.5', ['/paper/putthaisong_transcript5'], ['class' => 'btn btn-success']); ?>&nbsp;
        <a class="btn btn-outline-secondary" href="https://t.nextschool.io/project/nextschool/issue/4264">Link Tree &raquo;</a>
        <br /><br />
        <?php echo Html::a('นิคม บัตรประจำตัวผู้เข้าสอบ', ['/paper/examidcard'], ['class' => 'btn btn-success']); ?>&nbsp;
        <a class="btn btn-outline-secondary" href="https://t.nextschool.io/project/nextschool/issue/4294">Link Tree &raquo;</a>
        <br /><br />
        <?php echo Html::a('จินดาพร แก้ไขรายงานการรับเงิน', ['/report/receipt'], ['class' => 'btn btn-success']); ?>&nbsp;
        <a class="btn btn-outline-secondary" href="https://t.nextschool.io/project/nextschool/issue/4209">Link Tree &raquo;</a>
        <br /><br />
        <?php echo Html::a('นิคมวิทยา ทะเบียนประวัตินักเรียนรายบุคคล', ['/paper/nikom_print_profile'], ['class' => 'btn btn-success']); ?>&nbsp;
        <a class="btn btn-outline-secondary" href="https://t.nextschool.io/project/nextschool/issue/4406">Link Tree &raquo;</a>
    </div>
    <div class="col-lg-4 mb-3">
        <h2>In pull request</h2>
        <?php echo Html::a('ศรียานุสร แก้ไขรายงานความประพฤติรายบุคคล', ['/paper/siyanuson_student_behave'], ['class' => 'btn btn-warning']); ?>&nbsp;
        <a class="btn btn-outline-secondary" href="https://t.nextschool.io/project/nextschool/issue/4429">Link Tree &raquo;</a>
        <br /><br />
        <?php echo Html::a('บ้านบึง สรุปรายงานขาด ลา มาสายบุคลากร', ['/paper/banbueng_staff_attendance'], ['class' => 'btn btn-warning']); ?>&nbsp;
        <a class="btn btn-outline-secondary" href="https://t.nextschool.io/project/nextschool/issue/4369">Link Tree &raquo;</a>
        <br /><br />
        <?php echo Html::a('แบบเยี่ยมบ้านบดิน (แบบบันทึกเยี่ยมบ้าน)', ['/paper/visit_bodin'], ['class' => 'btn btn-warning']); ?>&nbsp;
        <a class="btn btn-outline-secondary" href="https://t.nextschool.io/project/nextschool/issue/4342">Link Tree &raquo;</a>
        <br /><br />
        <?php echo Html::a('แบบเยี่ยมบ้านบดิน (แบบสรุปเยี่ยมบ้าน)', ['/paper/visit_bodin_summary'], ['class' => 'btn btn-warning']); ?>&nbsp;
        <a class="btn btn-outline-secondary" href="https://t.nextschool.io/project/nextschool/issue/4342">Link Tree &raquo;</a>
        <br /><br />
        <?php echo Html::a('แบบเยี่ยมบ้าน ศรียานุสร', ['/paper/visit_siyanuson'], ['class' => 'btn btn-warning']); ?>&nbsp;
        <a class="btn btn-outline-secondary" href="https://t.nextschool.io/project/nextschool/issue/4348">Link Tree &raquo;</a>
        <br /><br />
        <?php echo Html::a('พุทไธสง คะแนน ปพ.5 ตั้ง margin', ['/paper/putthaisong_transcript_eva'], ['class' => 'btn btn-warning']); ?>&nbsp;
        <a class="btn btn-outline-secondary" href="https://t.nextschool.io/project/nextschool/issue/4351">Link Tree &raquo;</a>
        <br /><br />
        <?php echo Html::a('พุทไธสง เข้าเรียน ปพ.5 ตั้ง margin', ['/paper/putthaisong_transcript_attendance'], ['class' => 'btn btn-warning']); ?>&nbsp;
        <a class="btn btn-outline-secondary" href="https://t.nextschool.io/project/nextschool/issue/4351">Link Tree &raquo;</a>
        <br /><br />
        <?php echo Html::a('Image cropper', ['/image/imagecrop'], ['class' => 'btn btn-warning']); ?>&nbsp;
        <a class="btn btn-outline-secondary" href="https://t.nextschool.io/project/nextschool/issue/4050">Link Tree &raquo;</a>
    </div>
</div>
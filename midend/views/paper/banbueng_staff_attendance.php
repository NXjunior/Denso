<?php
$dtime = \DateTime::createFromFormat("Y-m-d", date('Y-m-d'));
$timestamp = $dtime->getTimestamp();
$thaiYear = date('Y', $timestamp) + 543;
$DateTime = Yii::$app->date->date('ประจำวันl ที่ j เดือน F พ.ศ. ', $timestamp) . $thaiYear;
$DateTime1 = Yii::$app->date->date('j F ', $timestamp) . $thaiYear;

$DateTimeShort = Yii::$app->date->date('j M y', $timestamp);
$dateTimeParts1 = explode(' ', $DateTimeShort);
$dayShort = $dateTimeParts1[0];
$monthShort = $dateTimeParts1[1];
$yearShort = $dateTimeParts1[2] + 43;


?>
<div style="margin-left:15px;margin-right:15px;">
        <div style="border:1px solid;width:100%;background-color: #CEFFFF;">
                <div style="float:left;width:18%;text-align:right;">
                        <img src="<?php echo $img ?>" alt="School icon" style="width:60px;height:auto;">
                </div>
                <div style="float:left;width:70%;text-align:center;margin-top:10px;line-height:30px;font-weight:bold;font-size:18pt;">
                        <p>สรุปบันทึกการปฏิบัติราชการของข้าราชการครู และ บุคลากร<br /><?php echo $title['name'] ?><br />
                                <?php echo $DateTime ?>
                        </p>
                </div>
        </div>
        <div style="padding-top:10px;">
                <table class="table table-sm">
                        <tr>
                                <td style="padding-top:8px;line-height:16px;height:25px;font-weight:bold;text-align:center;border: 1px solid;font-size:16pt;background-color: #CEFFFF;" colspan="3">
                                        ข้าราชการครู
                                </td>
                                <td style="padding-top:8px;line-height:16px;height:25px;font-weight:bold;text-align:center;border: 1px solid;font-size:16pt;background-color: #CEFFFF;" colspan="3">
                                        ลูกจ้างประจำ
                                </td>
                        </tr>
                        <tr>
                                <td style="padding-top:8px;line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        ข้าราชการครูทั้งหมด
                                </td>
                                <td style="width:40px;padding-top:8px;line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $teacherCivilServant['totalStaff'] ?>
                                </td>
                                <td style="padding-top:8px;line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                                <td style="padding-top:8px;line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        ลูกจ้างประจำทั้งหมด
                                </td>
                                <td style="width:40px;padding-top:8px;line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $permanentStaff['totalStaff'] ?>
                                </td>
                                <td style="padding-top:8px;line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                        </tr>
                        <tr>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        ไปราชการ
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $teacherCivilServant['onDutyService'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        ไปราชการ
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $permanentStaff['onDutyService'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                        </tr>
                        <tr>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        ลาป่วย
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $teacherCivilServant['sickLeave'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        ลาป่วย
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $permanentStaff['sickLeave'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                        </tr>
                        <tr>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        ลากิจ
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $teacherCivilServant['personalLeave'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        ลากิจ
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $permanentStaff['personalLeave'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                        </tr>
                        <tr>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        มาสาย
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $teacherCivilServant['late'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        มาสาย
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $permanentStaff['late'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                        </tr>
                        <tr>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        อื่นๆ
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $teacherCivilServant['other'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        อื่นๆ
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $permanentStaff['other'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                        </tr>
                        <tr>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-left:1px solid;border-bottom:1px solid;background-color:#D9D9D9;border-top:1px solid;">
                                        รวมการมาปฎิบัติราชการ
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;border-bottom:1px solid;background-color:#D9D9D9;border-top:1px solid;">
                                        <?php echo $teacherCivilServant['totalPresent'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;border-bottom:1px solid;background-color:#D9D9D9;border-top:1px solid;">
                                        คน
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-left:1px solid;border-bottom:1px solid;background-color:#D9D9D9;border-top:1px solid;">
                                        รวมการมาปฎิบัติราชการ
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;border-bottom:1px solid;background-color:#D9D9D9;border-top:1px solid;">
                                        <?php echo $permanentStaff['totalPresent'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border:0px;border-right:1px solid;border-bottom:1px solid;background-color:#D9D9D9;border-top:1px solid;">
                                        คน
                                </td>
                        </tr>
                </table>
        </div>

        <div style="float:left;width:50%;font-weight:bold;line-height:22px;padding-top:-15px;padding-left:5px;">
                ไปราชการ:&nbsp;<?php foreach ($teacherCivilServantListName['onDutyService'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                ลาป่วย:&nbsp;<?php foreach ($teacherCivilServantListName['sickLeave'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                ลากิจ:&nbsp;<?php foreach ($teacherCivilServantListName['personalLeave'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                มาสาย:&nbsp;<?php foreach ($teacherCivilServantListName['late'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                อื่นๆ:&nbsp;<?php foreach ($teacherCivilServantListName['other'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                ช่วยราชการ:&nbsp;<?php foreach ($teacherCivilServantListName['helpDutyService'] as $index => $list) {
                                                echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                        } ?>
        </div>
        <div style="float:left;width:48.5%;font-weight:bold;line-height:22px;padding-top:-15px;padding-left:5px;">
                ไปราชการ:&nbsp;<?php foreach ($permanentStaffListName['onDutyService'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                ลาป่วย:&nbsp;<?php foreach ($permanentStaffListName['sickLeave'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                ลากิจ:&nbsp;<?php foreach ($permanentStaffListName['personalLeave'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                มาสาย:&nbsp;<?php foreach ($permanentStaffListName['late'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                อื่นๆ:&nbsp;<?php foreach ($permanentStaffListName['other'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                ช่วยราชการ:&nbsp;<?php foreach ($permanentStaffListName['helpDutyService'] as $index => $list) {
                                                echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                        } ?>
        </div>

        <div style="padding-top:10px;">
                <table class="table table-sm">
                        <tr>
                                <td style="padding-top:8px;line-height:16px;height:25px;font-weight:bold;text-align:center;border: 1px solid;font-size:16pt;background-color: #CEFFFF;" colspan="3">
                                        ครูอัตราจ้าง
                                </td>
                                <td style="padding-top:8px;line-height:16px;height:25px;font-weight:bold;text-align:center;border: 1px solid;font-size:16pt;background-color: #CEFFFF;" colspan="3">
                                        ลูกจ้างชั่วคราว
                                </td>
                        </tr>
                        <tr>
                                <td style="padding-top:8px;line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        ครูอัตราจ้างทั้งหมด
                                </td>
                                <td style="padding-top:8px;width:40px;line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $contractTeacher['totalStaff'] ?>
                                </td>
                                <td style="padding-top:8px;line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                                <td style="padding-top:8px;line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        ลูกจ้างชั่วคราวทั้งหมด
                                </td>
                                <td style="padding-top:8px;width:40px;line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $temporaryStaff['totalStaff'] ?>
                                </td>
                                <td style="padding-top:8px;line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                        </tr>
                        <tr>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        ไปราชการ
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $contractTeacher['onDutyService'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        ไปราชการ
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $temporaryStaff['onDutyService'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                        </tr>
                        <tr>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        ลาป่วย
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $contractTeacher['sickLeave'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        ลาป่วย
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $temporaryStaff['sickLeave'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                        </tr>
                        <tr>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        ลากิจ
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $contractTeacher['personalLeave'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        ลากิจ
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $temporaryStaff['personalLeave'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                        </tr>
                        <tr>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        มาสาย
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $contractTeacher['late'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        มาสาย
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $temporaryStaff['late'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                        </tr>
                        <tr>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        อื่นๆ
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $contractTeacher['other'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:left;font-size:16pt;border-left:1px solid;padding-left:7px;">
                                        อื่นๆ
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;">
                                        <?php echo $temporaryStaff['other'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;">
                                        คน
                                </td>
                        </tr>
                        <tr>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-left:1px solid;border-bottom:1px solid;background-color:#D9D9D9;border-top:1px solid;">
                                        รวมการมาปฎิบัติราชการ
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;border-bottom:1px solid;background-color:#D9D9D9;border-top:1px solid;">
                                        <?php echo $contractTeacher['totalPresent'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-right:1px solid;border-bottom:1px solid;background-color:#D9D9D9;border-top:1px solid;">
                                        คน
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border-left:1px solid;border-bottom:1px solid;background-color:#D9D9D9;border-top:1px solid;">
                                        รวมการมาปฎิบัติราชการ
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:right;font-size:16pt;border-bottom:1px solid;background-color:#D9D9D9;border-top:1px solid;">
                                        <?php echo $temporaryStaff['totalPresent'] ?>
                                </td>
                                <td style="line-height:16px;height:25px;font-weight:bold;text-align:center;font-size:16pt;border:0px;border-right:1px solid;border-bottom:1px solid;background-color:#D9D9D9;border-top:1px solid;">
                                        คน
                                </td>
                        </tr>
                </table>
        </div>

        <div style="float:left;width:50%;font-weight:bold;line-height:22px;padding-top:-15px;padding-left:5px;">
                ไปราชการ:&nbsp;<?php foreach ($contractTeacherListName['onDutyService'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                ลาป่วย:&nbsp;<?php foreach ($contractTeacherListName['sickLeave'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                ลากิจ:&nbsp;<?php foreach ($contractTeacherListName['personalLeave'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                มาสาย:&nbsp;<?php foreach ($contractTeacherListName['late'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                อื่นๆ:&nbsp;<?php foreach ($contractTeacherListName['other'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                ช่วยราชการ:&nbsp;<?php foreach ($contractTeacherListName['helpDutyService'] as $index => $list) {
                                                echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                        } ?>
        </div>
        <div style="float:left;width:48.5%;font-weight:bold;line-height:22px;padding-top:-15px;padding-left:5px;">
                ไปราชการ:&nbsp;<?php foreach ($temporaryStaffListName['onDutyService'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                ลาป่วย:&nbsp;<?php foreach ($temporaryStaffListName['sickLeave'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                ลากิจ:&nbsp;<?php foreach ($temporaryStaffListName['personalLeave'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                มาสาย:&nbsp;<?php foreach ($temporaryStaffListName['late'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                อื่นๆ:&nbsp;<?php foreach ($temporaryStaffListName['other'] as $index => $list) {
                                        echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                } ?><br />
                ช่วยราชการ:&nbsp;<?php foreach ($temporaryStaffListName['helpDutyService'] as $index => $list) {
                                                echo ($index + 1) . "." . $list . '&nbsp;&nbsp;';
                                        } ?>
        </div>
        <div style="float:left;width:50%;text-align:center;font-weight:bold;line-height:22px;padding-top:20px;">
                ลงชื่อ...........................................................<br />
                (<?php foreach ($User as $userData) {
                                if ($userData['emp_position'] == 'รองผู้อำนวยการสถานศึกษา') {
                                        echo $userData['title'] . $userData['firstname'] . '&nbsp;&nbsp;&nbsp;' . $userData['lastname'];
                                        break;
                                }
                        } ?>)<br />
                รองผู้อำนวยการสถานศึกษา<br />
                <span><?php echo '(' . $DateTime1 . ')' ?></span>
        </div>
        <div style="float:left;width:50%;text-align:center;font-weight:bold;line-height:22px;padding-top:20px;">
                ลงชื่อ...........................................................<br />
                (<?php foreach ($User as $userData) {
                                if ($userData['emp_position'] == 'ผู้อำนวยการ') {
                                        echo $userData['title'] . $userData['firstname'] . '&nbsp;&nbsp;&nbsp;' . $userData['lastname'];
                                }
                        } ?>)<br />
                ผู้อำนวยการ<?php echo $title['name'] ?><br />
                <span><?php echo '(' . $DateTime1 . ')' ?></span>
        </div>
</div>
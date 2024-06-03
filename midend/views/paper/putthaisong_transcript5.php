<?php
$semesterNo = $semester['name'];
$dateComponentsSem = explode(' ', $semesterNo);
$semText = $dateComponentsSem[0];
$semNo = $dateComponentsSem[1];

if ($ranges[0]['ratio'] == 0) {
    $ranges_ratio_0 = "";
} else {
    $ranges_ratio_0 = $ranges[0]['ratio'];
}
if ($ranges[1]['ratio'] == 0) {
    $ranges_ratio_1 = "";
} else {
    $ranges_ratio_1 = $ranges[1]['ratio'];
}
if ($ranges[2]['ratio'] == 0) {
    $ranges_ratio_2 = "";
} else {
    $ranges_ratio_2 = $ranges[2]['ratio'];
}
if ($ranges[3]['ratio'] == 0) {
    $ranges_ratio_3 = "";
} else {
    $ranges_ratio_3 = $ranges[3]['ratio'];
}
if ($ranges[4]['ratio'] == 0) {
    $ranges_ratio_4 = "";
} else {
    $ranges_ratio_4 = $ranges[4]['ratio'];
}
if ($ranges[5]['ratio'] == 0) {
    $ranges_ratio_5 = "";
} else {
    $ranges_ratio_5 = $ranges[5]['ratio'];
}
if ($ranges[6]['ratio'] == 0) {
    $ranges_ratio_6 = "";
} else {
    $ranges_ratio_6 = $ranges[6]['ratio'];
}
if ($ranges[7]['ratio'] == 0) {
    $ranges_ratio_7 = "";
} else {
    $ranges_ratio_7 = $ranges[7]['ratio'];
}
if ($ranges[8]['ratio'] == 0) {
    $ranges_ratio_8 = "";
} else {
    $ranges_ratio_8 = $ranges[8]['ratio'];
}
if ($ranges[9]['ratio'] == 0) {
    $ranges_ratio_9 = "";
} else {
    $ranges_ratio_9 = $ranges[9]['ratio'];
}
// Return "" when data == 0
if ($ranges[0]['count'] == 0) {
    $ranges_count_0 = "";
} else {
    $ranges_count_0 = $ranges[0]['count'];
}
if ($ranges[1]['count'] == 0) {
    $ranges_count_1 = "";
} else {
    $ranges_count_1 = $ranges[1]['count'];
}
if ($ranges[2]['count'] == 0) {
    $ranges_count_2 = "";
} else {
    $ranges_count_2 = $ranges[2]['count'];
}
if ($ranges[3]['count'] == 0) {
    $ranges_count_3 = "";
} else {
    $ranges_count_3 = $ranges[3]['count'];
}
if ($ranges[4]['count'] == 0) {
    $ranges_count_4 = "";
} else {
    $ranges_count_4 = $ranges[4]['count'];
}
if ($ranges[5]['count'] == 0) {
    $ranges_count_5 = "";
} else {
    $ranges_count_5 = $ranges[5]['count'];
}
if ($ranges[6]['count'] == 0) {
    $ranges_count_6 = "";
} else {
    $ranges_count_6 = $ranges[6]['count'];
}
if ($ranges[7]['count'] == 0) {
    $ranges_count_7 = "";
} else {
    $ranges_count_7 = $ranges[7]['count'];
}
if ($ranges[8]['count'] == 0) {
    $ranges_count_8 = "";
} else {
    $ranges_count_8 = $ranges[8]['count'];
}
if ($ranges[9]['count'] == 0) {
    $ranges_count_9 = "";
} else {
    $ranges_count_9 = $ranges[9]['count'];
}

$totalGradePoints = ($ranges[0]['count'] * 4) +
                   ($ranges[1]['count'] * 3.5) +
                   ($ranges[2]['count'] * 3) +
                   ($ranges[3]['count'] * 2.5) +
                   ($ranges[4]['count'] * 2) +
                   ($ranges[5]['count'] * 1.5) +
                   ($ranges[6]['count'] * 1) +
                   ($ranges[7]['count'] * 0);

                   $totalStudentsWithGrades = $ranges[0]['count'] +
                    $ranges[1]['count'] +
                    $ranges[2]['count'] +
                    $ranges[3]['count'] +
                    $ranges[4]['count'] +
                    $ranges[5]['count'] +
                    $ranges[6]['count'] +
                    $ranges[7]['count'];

                    if ($totalStudentsWithGrades != 0) {
                        $averageGrade = $totalGradePoints / $totalStudentsWithGrades;
                        $averageGrade = number_format($averageGrade, 2);
                    } else {
                        $averageGrade = 0;
                    }

?>
<div style="text-align:center"><img src="img/putthaisong.png" alt="School icon" style="width:80px;height:auto;margin-top:0px;"></div>
<div style="font-size:20px;padding-top:20px">
<p style="font-size:30px;font-weight:bold;text-align:center;">แบบรายงานผลการพัฒนาคุณภาพผู้เรียน (ปพ.5)<p>
<p style="text-align:center;margin-top:10px">โรงเรียนพุทไธสง อำเภอพุทไธสง จังหวัดบุรีรัมย์<p>

<div style="margin-left:30px">
    <dl>
<dt style="width:130px;">ระดับชั้นมัธยมศึกษาปีที่</dt>
        <dd style="width:50px;"><?php echo $missing['grade']  ?></dd>
        <dt style="width:45px;">จำนวน</dt>
        <dd style="width:50px;"><?php echo $totalStudent ?></dd>
        <dt style="width:25px;">คน</dt>
        <dt style="width:100px;">ประจำภาคเรียนที่</dt>
        <dd style="width:40px;"><?php echo $semNo ?></dd>
        <dt style="width:65px;">ปีการศึกษา</dt>
        <dd style="width:60px;"><?php echo $academicYear['name'] ?></dd>
        </dl>
</div>
<div style="margin-left:20px;margin-right:-40px">
    <dl>
<dt style="width:60px;">รหัสวิชา : </dt>
        <dd style="width:100px;"><?php echo $missing['course_code'] ?></dd>
        <dt style="width:25px;">วิชา</dt>
        <dd style="width:180px;"><?php echo $missing['subject'] ?></dd>
        <dt style="width:110px;">กลุ่มสาระการเรียนรู้</dt>
        <dd style="width:180px;"><?php echo $missing['subject_areas'] ?></dd>
        </dl>
</div>
<div style="margin-left:100px;">
    <dl>
<dt style="width:120px;">จำนวนหน่วยการเรียน</dt>
        <dd style="width:40px;"><?php echo $missing['credit'] ?></dd>
        <dt style="width:105px;">หน่วยกิต</dt>
        <dt style="width:55px;">เวลาเรียน</dt>
        <dd style="width:45px;"><?php echo $missing['study_hour'] ?></dd>
        <dt style="width:80px;">ชั่วโมง/สัปดาห์</dt>
        </dl>
</div>
<div style="margin-left:20px;margin-top:10px;">
<p>ตารางแสดงผลสัมฤทธิ์ทางการเรียน</p>
<div style="margin-left:10px;">
<table class="table table-bordered table-sm table-collapse" style="border: 1px solid">
                    <thead>
                        <tr>
                            <th style="font-weight:bold;width: 30px;padding-top: -15px;vertical-align: middle;padding-bottom: 0px;background-color: white;border: 1px solid;text-align: center;height:60px;font-weight:normal;">
                                ระดับผลการเรียน
                            </th>
                            <th style="font-weight:bold;width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;background-color: white;border: 1px solid;text-align: center;height:60px;font-weight:normal;">
                            <?php echo $ranges[0]['name'] ?>
                            </th>
                            <th style="font-weight:bold;width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;background-color: white;border: 1px solid;text-align: center;height:60px;font-weight:normal;">
                            <?php echo $ranges[1]['name'] ?>
                            </th>
                            <th style="font-weight:bold;width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;background-color: white;border: 1px solid;text-align: center;height:60px;font-weight:normal;">
                            <?php echo $ranges[2]['name'] ?>
                            </th>
                            <th style="font-weight:bold;width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;background-color: white;border: 1px solid;text-align: center;height:60px;font-weight:normal;">
                            <?php echo $ranges[3]['name'] ?>
                            </th>
                            <th style="font-weight:bold;width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;background-color: white;border: 1px solid;text-align: center;height:60px;font-weight:normal;">
                            <?php echo $ranges[4]['name'] ?>
                            </th>
                            <th style="font-weight:bold;width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;background-color: white;border: 1px solid;text-align: center;height:60px;font-weight:normal;">
                            <?php echo $ranges[5]['name'] ?>
                            </th>
                            <th style="font-weight:bold;width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;background-color: white;border: 1px solid;text-align: center;height:60px;font-weight:normal;">
                            <?php echo $ranges[6]['name'] ?>
                            </th>
                            <th style="font-weight:bold;width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;background-color: white;border: 1px solid;text-align: center;height:60px;font-weight:normal;">
                            <?php echo $ranges[7]['name'] ?>
                            </th>
                            <th style="font-weight:bold;width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;background-color: white;border: 1px solid;text-align: center;height:60px;font-weight:normal;">
                            <?php echo $ranges[8]['name'] ?>
                            </th>
                            <th style="font-weight:bold;width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;background-color: white;border: 1px solid;text-align: center;height:60px;font-weight:normal;">
                            <?php echo $ranges[9]['name'] ?>
                            </th>
                            <th style="font-weight:bold;width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;background-color: white;border: 1px solid;text-align: center;height:60px;font-weight:normal;">
                            รวม
                            </th>
                            <th style="font-weight:bold;width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;background-color: white;border: 1px solid;text-align: center;height:60px;font-weight:normal;">
                            ผลการเรียน<br />เฉลี่ย
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            จำนวนคน
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_count_0 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_count_1 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_count_2 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_count_3 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_count_4 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_count_5 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_count_6 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_count_7 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_count_8 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_count_9 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $totalStudent ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $averageGrade ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            คิดเป็นร้อยละ
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_ratio_0 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_ratio_1 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_ratio_2 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_ratio_3 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_ratio_4 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_ratio_5 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_ratio_6 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_ratio_7 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_ratio_8 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            <?php echo $ranges_ratio_9 ?>
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            100
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
<p>ผลการประเมิน การอ่าน คิด วิเคราะห์และเขียน</p>
<div style="margin-left:10px;">
<table class="table table-bordered table-sm table-collapse" style="border: 1px solid">
                    <thead>
                        <tr>
                            <th colspan="5" style="font-weight:bold;width: 30px;padding-top: -15px;vertical-align: middle;padding-bottom: 0px;background-color: white;border: 1px solid;text-align: center;height:40px;font-weight:normal;">
                                ผลการประเมิน
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            จำนวนนักเรียนทั้งหมด
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            ดีเยี่ยม (3)
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            ดี (2)
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            ผ่านเกณฑ์ (1)
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                            ไม่ผ่านเกณฑ์ (0)
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">

                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                                
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                                
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                                
                            </td>
                            <td style="width: 30px;padding-top: -15px;padding-bottom: 0px;vertical-align: middle;text-align: center;border: 1px solid;height:40px">
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <p style="margin-top:-10px">ขอรับรองว่าได้ตรวจสอบข้อมูลข้างต้นแล้ว เป็นข้อมูลที่ถูกต้องตามความเป็นจริงทุกประการ</p>
        <div style="padding-top:10px;margin-left:30px;text-align:center;line-height:30px">
        <p style="line-height:10px;margin-left:0px;">ลงชื่อ ......................................................... ครูผู้สอน<p>
        <p style="padding-top:10px;margin-left:-25px;line-height:10px">(<?php echo $teachName ?>)<p>
        <p style="line-height:10px">วันที่ ......... เดือน ......................... พ.ศ. ................<p>
        </div>
        <p style="padding-top:-10px;">เรียนเสนอเพื่อพิจารณาอนุมัติผลการเรียน</p>
        <div style="padding-top:10px;margin-left:220px;line-height:30px">
        <p style="line-height:10px;">ลงชื่อ ......................................................... หัวหน้ากลุ่มสาระการเรียนรู้<p>
        <p style="margin-left:30px;line-height:10px">(.........................................................)<p>
        <p style="line-height:10px;margin-left:0px;">ลงชื่อ ......................................................... หัวหน้างานวัดผลและประเมินผล<p>
        <p style="margin-left:70px;line-height:10px">(นายสุริยันต์ แสงมล)<p>
        <p style="line-height:10px;margin-left:0px;">ลงชื่อ ......................................................... รองผู้อำนวยการกลุ่มบริหารวิชาการ<p>
        <p style="margin-left:70px;line-height:10px">(นางดาวรุ่ง สุระศรี)<p>
        <p style="line-height:10px;margin-left:-187px;"><span style="font-family: fontawesome; font-size:120%;">&#9723;</span>&nbsp;&nbsp;&nbsp;&nbsp;อนุมัติ&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:120%;">&#9723;</span>&nbsp;&nbsp;&nbsp;&nbsp;ไม่อนุมัติ&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ ......................................................... ผู้อำนวยการโรงเรียนพุทไธสง<p>
        <p style="margin-left:70px;line-height:10px">(นายภูวนาถ ยุพานวิทย์)<p>
        <p style="line-height:10px;margin-left:5px;">วันที่ ......... เดือน ......................... พ.ศ. ................<p>
        </div>
</div>
</div>


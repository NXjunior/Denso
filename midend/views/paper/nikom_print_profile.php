<?php
use yii\helpers\Html;

$imageSource = $missing['image'];
if (!empty($imageSource)) {
    $image = '<img src="' . $imageSource . '" alt="School icon" style="width:3.5cm;height:4.5cm;margin-top:0px;">';
} else {
  $image = '<p style="text-align:center;margin-top:60px;font-size:16pt">รูปถ่ายนักเรียน<br />ขนาด 1 - 2 นิ่้ว</p>';
}
?>
<div style="font-size:16pt;line-height:26px;">
<div style="width:35%;float:left;">
<div style="width:3.5cm;height:4.5cm;border:2px solid;float:left;">
<?php echo $image ?>
</div>
</div>
<div style="width:35%;float:left;text-align:center;">
<img src="<?php echo $img ?>" alt="School icon" style="width:90px;height:auto;">
<p style="padding-top:5px;"><strong>ทะเบียนประวัตินักเรียนรายบุคคล<br />ปีการศึกษา <?php echo $title['year'] ?></strong><p>
</div>
<div style="width:29%;float:left;text-align:center;">
<div style="width:4.6cm;height:4.8cm;border:2px solid;float:right;">
<p style="padding-top:15px;padding-bottom:-12px;"><strong><u>ส่วนของเจ้าหน้าที่</u><br />รหัสโรงเรียน</strong></p>
<table style="margin-left:20px;margin-right:20px;">
    <tr>
    <td style="width:20px;border:1px solid;text-align:center;font-weight:bold;font-size:18pt;height:25px;line-height:15px">
        1
</td>
<td style="width:20px;border:1px solid;text-align:center;font-weight:bold;padding-bottom:12px;font-size:18pt;height:25px;line-height:15px">
        0
</td>
<td style="width:20px;border:1px solid;text-align:center;font-weight:bold;font-size:18pt;height:25px;line-height:15px">
        2
</td>
<td style="width:20px;border:1px solid;text-align:center;font-weight:bold;font-size:18pt;height:25px;line-height:15px">
        1
</td>
<td style="width:20px;border:1px solid;text-align:center;font-weight:bold;font-size:18pt;height:25px;line-height:15px">
        4
</td>
<td style="width:20px;border:1px solid;text-align:center;font-weight:bold;font-size:18pt;height:25px;line-height:15px">
        7
</td>
<td style="width:20px;border:1px solid;text-align:center;font-weight:bold;padding-bottom:12px;font-size:18pt;height:25px;line-height:15px">
        0
</td>
<td style="width:20px;border:1px solid;text-align:center;font-weight:bold;font-size:18pt;height:25px;line-height:15px">
        2
</td>
<td style="width:20px;border:1px solid;text-align:center;font-weight:bold;font-size:18pt;height:25px;line-height:15px">
        3
</td>
<td style="width:20px;border:1px solid;text-align:center;font-weight:bold;font-size:18pt;height:25px;line-height:15px">
        8
</td>
</tr>
</table>
<p style="padding-top:15px;padding-bottom:-22px;">เลขประจำตัวนักเรียน<p>
<table style="margin-left:40px;margin-right:40px;">
    <tr>
    <td style="width:20px;border:1px solid;text-align:center;font-weight:bold;font-size:18pt;height:25px;line-height:15px">
        
</td>
<td style="width:20px;border:1px solid;text-align:center;font-weight:bold;padding-bottom:12px;font-size:18pt;height:25px;line-height:15px">
        
</td>
<td style="width:20px;border:1px solid;text-align:center;font-weight:bold;padding-bottom:12px;font-size:18pt;height:25px;line-height:15px">
        
</td>
<td style="width:20px;border:1px solid;text-align:center;font-weight:bold;font-size:18pt;height:25px;line-height:15px">
        
</td>
<td style="width:20px;border:1px solid;text-align:center;font-weight:bold;padding-bottom:12px;font-size:18pt;height:25px;line-height:15px">
        
</td>
</tr>
</table>
<p style="padding-top:10px;padding-bottom:-20px;">ชั้น ม...../.....<p>
</div>
<p style="padding-top:10px;padding-bottom:-20px;font-weight:bold;margin-left:20px;">(งานทะเบียนนักเรียน)<p>
</div>
<p style="font-weight:bold;font-size:18pt;line-height:10px;padding-bottom:5px;"><u>ข้อมูลนักเรียน</u></p>
<strong>ประเภท</strong>&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#xf111;<?php echo ($title['grade'] >= 4) ? '</span>&nbsp;นักเรียนโควตา&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;นักเรียนทั่วไป<br />' : '</span>&nbsp;ในเขต&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;ทั่วไป<br />' ?>
<p style="font-weight:bold;padding-top:5px;">*แผนการเรียน <?php echo ($title['grade'] >= 4) ? '(เฉพาะนักเรียน ม.ปลาย)' : '(เฉพาะนักเรียน ม.ต้น)' ?>*</p>
<div style="width:50%;float:left;font-size:12pt;">
<?php echo ($missing['dynamic_edu_program'] == 0) ? '<p style="font-size:150%;padding-top:-3px;padding-bottom:-33px;padding-left:7px"><strong>/</strong></p>' : "" ?>
<?php echo !empty($missing['edu_programChoice'][0]['edu_programName']) ? '<p style="padding-bottom:-10px;"><span style="font-family: fontawesome; font-size:100%;">&#xf111;</span>&nbsp;&nbsp;' . $missing['edu_programChoice'][0]['edu_programName'] . '</p>' : "" ?>
<?php echo ($missing['dynamic_edu_program'] == 2) ? '<p style="font-size:150%;padding-top:-3px;padding-bottom:-33px;padding-left:7px"><strong>/</strong></p>' : "" ?>
<?php echo !empty($missing['edu_programChoice'][2]['edu_programName']) ? '<p style="padding-bottom:-10px;"><span style="font-family: fontawesome; font-size:100%;">&#xf111;</span>&nbsp;&nbsp;' . $missing['edu_programChoice'][2]['edu_programName'] . '</p>' : "" ?>
<?php echo ($missing['dynamic_edu_program'] == 4) ? '<p style="font-size:150%;padding-top:-3px;padding-bottom:-33px;padding-left:7px"><strong>/</strong></p>' : "" ?>
<?php echo !empty($missing['edu_programChoice'][4]['edu_programName']) ? '<p style="padding-bottom:-10px;"><span style="font-family: fontawesome; font-size:100%;">&#xf111;</span>&nbsp;&nbsp;' . $missing['edu_programChoice'][4]['edu_programName'] . '</p>' : "" ?>
<?php echo ($missing['dynamic_edu_program'] == 6) ? '<p style="font-size:150%;padding-top:-3px;padding-bottom:-33px;padding-left:7px"><strong>/</strong></p>' : "" ?>
<?php echo !empty($missing['edu_programChoice'][6]['edu_programName']) ? '<p style="padding-bottom:-10px;"><span style="font-family: fontawesome; font-size:100%;">&#xf111;</span>&nbsp;&nbsp;' . $missing['edu_programChoice'][6]['edu_programName'] . '</p>' : "" ?>
<?php echo ($missing['dynamic_edu_program'] == 8) ? '<p style="font-size:150%;padding-top:-3px;padding-bottom:-33px;padding-left:7px"><strong>/</strong></p>' : "" ?>
<?php echo !empty($missing['edu_programChoice'][8]['edu_programName']) ? '<p style="padding-top:-3px;padding-bottom:-10px;"><span style="font-family: fontawesome; font-size:100%;">&#xf111;</span>&nbsp;&nbsp;' . $missing['edu_programChoice'][8]['edu_programName'] . '</p>' : "" ?>
</div>
<div style="width:50%;float:left;font-size:12pt;">
<?php echo ($missing['dynamic_edu_program'] == 1) ? '<p style="font-size:150%;padding-top:-3px;padding-bottom:-33px;padding-left:7px"><strong>/</strong></p>' : "" ?>
<?php echo !empty($missing['edu_programChoice'][1]['edu_programName']) ? '<p style="padding-bottom:-10px;"><span style="font-family: fontawesome; font-size:100%;">&#xf111;</span>&nbsp;&nbsp;' . $missing['edu_programChoice'][1]['edu_programName'] . '</p>' : "" ?>
<?php echo ($missing['dynamic_edu_program'] == 3) ? '<p style="font-size:150%;padding-top:-3px;padding-bottom:-33px;padding-left:7px"><strong>/</strong></p>' : "" ?>
<?php echo !empty($missing['edu_programChoice'][3]['edu_programName']) ? '<p style="padding-bottom:-10px;"><span style="font-family: fontawesome; font-size:100%;">&#xf111;</span>&nbsp;&nbsp;' . $missing['edu_programChoice'][3]['edu_programName'] . '</p>' : "" ?>
<?php echo ($missing['dynamic_edu_program'] == 5) ? '<p style="font-size:150%;padding-top:-3px;padding-bottom:-33px;padding-left:7px"><strong>/</strong></p>' : "" ?>
<?php echo !empty($missing['edu_programChoice'][5]['edu_programName']) ? '<p style="padding-bottom:-10px;"><span style="font-family: fontawesome; font-size:100%;">&#xf111;</span>&nbsp;&nbsp;' . $missing['edu_programChoice'][5]['edu_programName'] . '</p>' : "" ?>
<?php echo ($missing['dynamic_edu_program'] == 7) ? '<p style="font-size:150%;padding-top:-3px;padding-bottom:-33px;padding-left:7px"><strong>/</strong></p>' : "" ?>
<?php echo !empty($missing['edu_programChoice'][7]['edu_programName']) ? '<p style="padding-bottom:-10px;"><span style="font-family: fontawesome; font-size:100%;">&#xf111;</span>&nbsp;&nbsp;' . $missing['edu_programChoice'][7]['edu_programName'] . '</p>' : "" ?>
<?php echo ($missing['dynamic_edu_program'] == 9) ? '<p style="font-size:150%;padding-top:-3px;padding-bottom:-33px;padding-left:7px"><strong>/</strong></p>' : "" ?>
<?php echo !empty($missing['edu_programChoice'][9]['edu_programName']) ? '<p style="padding-bottom:-10px;"><span style="font-family: fontawesome; font-size:100%;">&#xf111;</span>&nbsp;&nbsp;' . $missing['edu_programChoice'][9]['edu_programName'] . '</p>' : "" ?>
</div>
<dl>
    <dt style="width:80px;font-weight:bold;">ชื่อภาษาไทย</dt>
    <dd style="width:260px;"><?php echo $profile['title'] . '&nbsp;' . $profile['firstname'] ?></dd>
    <dt style="width:55px;font-weight:bold;">นามสกุล</dt>
    <dd style="width:265px;"><?php echo $profile['lastname'] ?></dd>
    <dt style="width:185px;font-weight:bold;">ชื่อภาษาอังกฤษ (ตัวพิมพ์ใหญ่)</dt>
    <dd style="width:485px;">&nbsp;</dd>
    <dt style="width:215px;font-weight:bold;">นามสกุลภาษาอังกฤษ (ตัวพิมพ์ใหญ่)</dt>
    <dd style="width:454px;">&nbsp;</dd>
    <dt style="width:20px;"><?php echo ($profile['gender'] == 0) ? '<div id="gender" class="overmask" style="font-size:150%;padding-left:55px;padding-top:-15px;"><strong>/</strong></div>' : (($profile['gender'] == 1) ? '<div id="gender" class="overmask" style="font-size:150%;padding-left:105px;padding-top:-15px;"><strong>/</strong></div>' : "" ); ?></dt>
    <dt style="width:140px;padding-left:-30px;"><strong>เพศ</strong>&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;ชาย&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;หญิง</dt>
    <dt style="width:95px;font-weight:bold;">วัน/เดือน/ปีเกิด</dt>
    <dd style="width:192px;"><?php echo $profile['dob'] ?></dd>
    <dt style="width:30px;font-weight:bold;">อายุ</dt>
    <dd style="width:60px;"><?php echo $profile['ageYear'] ?></dd>
    <dt style="width:30px;font-weight:bold;padding-right:-10px;">ปี</dt>
    <dd style="width:60px;"><?php echo $profile['ageMonth'] ?></dd>
    <dt style="width:35px;font-weight:bold;">เดือน</dt>
    <dt style="width:76px;font-weight:bold;">จังหวัดที่เกิด</dt>
    <dd style="width:98px;"><?php echo $profile['born'] ?></dd>
    <dt style="width:50px;font-weight:bold;">สัญชาติ</dt>
    <dd style="width:57px;"><?php echo $profile['nationality'] ?></dd>
    <dt style="width:50px;font-weight:bold;">เชื้อชาติ</dt>
    <dd style="width:57px;"><?php echo $profile['race'] ?></dd>
    <dt style="width:45px;font-weight:bold;">ศาสนา</dt>
    <dd style="width:57px;"><?php echo $profile['religion'] ?></dd>
    <dt style="width:60px;font-weight:bold;">กรุ๊ปเลือด</dt>
    <dd style="width:80px;"><?php echo $profile['blood'] ?></dd>
    <dt style="width:140px;font-weight:bold;">เลขประจำตัวประชาชน</dt>
    <dd style="width:324px;">
      <strong><?php echo citizenWithSpaceGlobal($profile['personal_id'], "-") ?></strong>
    </dd>
    <dt style="width:45px;font-weight:bold;">ชื่อเล่น</dt>
    <dd style="width:150px;">&nbsp;</dd>
    <dt style="width:220px;font-weight:bold;">หนังสือเดินทางเลขที่ (Passport No.)</dt>
    <dd style="width:335px;">&nbsp;</dd>
    <dt style="width:105px;font-weight:bold;">(เฉพาะต่างด้าว)*</dt>
    <dt style="width:45px;font-weight:bold;">น้ำหนัก</dt>
    <dd style="width:38px;"><?php echo $profile['weight'] ?></dd>
    <dt style="width:45px;font-weight:bold;">ส่วนสูง</dt>
    <dd style="width:37px;"><?php echo $profile['height'] ?></dd>
    <dt style="width:89px;font-weight:bold;">เบอร์โทรติดต่อ</dt>
    <dd style="width:96px;"><?php echo $profile['mobile_no'] ?></dd>
    <dt style="width:45px;font-weight:bold;">E-Mail</dt>
    <dd style="width:245px;"><?php echo $profile['email'] ?></dd>
    <dt style="width:50px;font-weight:bold;">ID LINE</dt>
    <dd style="width:182px;">&nbsp;</dd>
    <dt style="width:110px;font-weight:bold;">จำนวนพี่น้อง (คน)</dt>
    <dd style="width:70px;"><?php echo $profile['siblings'] ?></dd>
    <dt style="width:37px;font-weight:bold;">พี่ชาย</dt>
    <dd style="width:70px;"><?php echo $profile['elderBrother'] ?></dd>
    <dt style="width:50px;font-weight:bold;">น้องชาย</dt>
    <dd style="width:70px;"><?php echo $profile['youngerBrother'] ?></dd>
    <dt style="width:37px;font-weight:bold;">พี่สาว</dt>
    <dd style="width:70px;"><?php echo $profile['elderSister'] ?></dd>
    <dt style="width:50px;font-weight:bold;">น้องสาว</dt>
    <dd style="width:70px;"><?php echo $profile['youngerSister'] ?></dd>
    <dt style="width:145px;font-weight:bold;">รวมจำนวนพี่น้องทั้งหมด</dt>
    <dd style="width:64px;"><?php echo $profile['siblings'] + 1 ?></dd>
    <dt style="width:139px;font-weight:bold;">นักเรียนเป็นบุตรลำดับที่</dt>
    <dd style="width:64px;"><?php echo $profile['birthOrder'] ?></dd>
    <dt style="width:300px;"><strong>จำนวนพี่น้องที่กำลังศึกษาอยู่&nbsp;(คน)</strong><i>ไม่รวมตัวนักเรียน</i></dt>
    <dd style="width:120px;"><?php echo $profile['childInSchool'] ?></dd>
    <dt style="width:120px;font-weight:bold;">ที่ประกอบอาชีพแล้ว</dt>
    <dd style="width:120px;">&nbsp;</dd>
    <dt style="width:100px;font-weight:bold;">ชื่อโรงเรียนเดิม</dt>
    <dd style="width:360px;"><?php echo $old_school['name'] ?></dd>
    <dt style="width:45px;font-weight:bold;">จังหวัด</dt>
    <dd style="width:152px;"><?php echo $old_school['province'] ?></dd>
</dl>
<p style="font-weight:bold;font-size:18pt;line-height:26px;padding-bottom:-10px;"><u>ที่อยู่ตามทะเบียนบ้าน</u><p>
<div style="float:left;width:14%">
<strong>รหัสประจำบ้าน</strong>
</div>
<div style="padding-right:-8px;padding-top:-3px;float:left;width:4%">
<table>
    <tr>
    <td style="width:15px;border:1px solid;text-align:center;font-size:18pt;height:20px;">
        
</td>
</tr>
</table></div>
<div style="padding-right:-8px;padding-top:-3px;float:left;width:4%">
<table>
    <tr>
    <td style="width:15px;border:1px solid;text-align:center;font-size:18pt;height:20px;">
        
</td>
</tr>
</table></div>
<div style="padding-right:-8px;padding-top:-3px;float:left;width:4%">
<table>
    <tr>
    <td style="width:15px;border:1px solid;text-align:center;font-size:18pt;height:20px;">
        
</td>
</tr>
</table></div>
<div style="padding-right:-8px;padding-top:-3px;float:left;width:4%">
<table>
    <tr>
    <td style="width:15px;border:1px solid;text-align:center;font-size:18pt;height:20px;">
        
</td>
</tr>
</table>
</div>
<div style="padding-right:-8px;float:left;width:4%">
&nbsp;-&nbsp;
</div>
<div style="padding-right:-8px;padding-top:-3px;float:left;width:4%">
<table>
    <tr>
    <td style="width:15px;border:1px solid;text-align:center;font-size:18pt;height:20px;">
        
</td>
</tr>
</table>
</div>
<div style="padding-right:-8px;padding-top:-3px;float:left;width:4%">
<table>
    <tr>
    <td style="width:15px;border:1px solid;text-align:center;font-size:18pt;height:20px;">
        
</td>
</tr>
</table>
</div>
<div style="padding-right:-8px;padding-top:-3px;float:left;width:4%">
<table>
    <tr>
    <td style="width:15px;border:1px solid;text-align:center;font-size:18pt;height:20px;">
        
</td>
</tr>
</table>
</div>
<div style="padding-right:-8px;padding-top:-3px;float:left;width:4%">
<table>
    <tr>
    <td style="width:15px;border:1px solid;text-align:center;font-size:18pt;height:20px;">
        
</td>
</tr>
</table>
</div>
<div style="padding-right:-8px;padding-top:-3px;float:left;width:4%">
<table>
    <tr>
    <td style="width:15px;border:1px solid;text-align:center;font-size:18pt;height:20px;">
        
</td>
</tr>
</table>
</div>
<div style="padding-right:-8px;padding-top:-3px;float:left;width:4%">
<table>
    <tr>
    <td style="width:15px;border:1px solid;text-align:center;font-size:18pt;height:20px;">
        
</td>
</tr>
</table>
</div>
<div style="padding-right:-8px;float:left;width:4%">
&nbsp;-&nbsp;
</div>
<div style="padding-right:-8px;padding-top:-3px;float:left;width:4%">
<table>
    <tr>
    <td style="width:15px;border:1px solid;text-align:center;font-size:18pt;height:20px;">
        
</td>
</tr>
</table>
</div>
<div style="padding-top:-8px;padding-left:10px;float:left;">
<dl>
    <dt style="width:60px;font-weight:bold;">บ้านเลขที่</dt>
    <dd style="width:257px;"><?php echo $address['no'] ?></dd>
</dl>
</div>
<dl>
<dt style="width:50px;font-weight:bold;">หมู่บ้าน</dt>
    <dd style="width:140px;">&nbsp;</dd>
<dt style="width:35px;font-weight:bold;">หมู่ที่</dt>
    <dd style="width:50px;"><?php echo $address['moo'] ?></dd>
    <dt style="width:35px;font-weight:bold;">ซอย</dt>
    <dd style="width:145px;"><?php echo $address['soi'] ?></dd>
    <dt style="width:35px;font-weight:bold;">ถนน</dt>
    <dd style="width:145px;"><?php echo $address['street'] ?></dd>
    <dt style="width:75px;font-weight:bold;">ตำบล/แขวง</dt>
    <dd style="width:150px;"><?php echo $address['sub_district'] ?></dd>
    <dt style="width:70px;font-weight:bold;">อำเภอ/เขต</dt>
    <dd style="width:155px;"><?php echo $address['district'] ?></dd>
    <dt style="width:45px;font-weight:bold;">จังหวัด</dt>
    <dd style="width:149px;"><?php echo $address['province'] ?></dd>
    <dt style="width:80px;font-weight:bold;">รหัสไปรษณีย์</dt>
    <dd style="width:150px;"><?php echo $address['zip'] ?></dd>
    <dt style="width:90px;font-weight:bold;">เบอร์โทรติดต่อ</dt>
    <dd style="width:335px;"><?php echo $parent['phone'] ?></dd>
</dl>
</div>
<p style="font-size:14pt;float:right;margin-left:620px;padding-top:10px;">หน้า 1/2</p>
<pagebreak/>
<div id="transport" class="overmask" style="font-size:150%;padding-top:65px;padding-left:147px"><strong><?php echo $model['transport'] == 1 ? "/" : "" ?></strong></div>
<div id="transport" class="overmask" style="font-size:150%;padding-top:65px;padding-left:215px"><strong><?php echo $model['transport'] == 3 ? "/" : "" ?></strong></div>
<div id="transport" class="overmask" style="font-size:150%;padding-top:65px;padding-le10t:375px"><strong><?php echo $model['transport'] == 2 ? "/" : "" ?></strong></div>
<div id="transport" class="overmask" style="font-size:150%;padding-top:195px;padding-left:7px"><strong><?php echo $profile['familyStatus'] == 'อยู่ด้วยกันจดทะเบียนสมรส' ? "/" : "" ?></strong></div>
<div id="transport" class="overmask" style="font-size:150%;padding-top:195px;padding-left:185px"><strong><?php echo $profile['familyStatus'] == 'อยู่ด้วยกันไม่ได้จดทะเบียนสมรส' ? "/" : "" ?></strong></div>
<div id="transport" class="overmask" style="font-size:150%;padding-top:195px;padding-left:390px"><strong><?php echo $profile['familyStatus'] == 'โสด' ? "/" : "" ?></strong></div>
<div id="transport" class="overmask" style="font-size:150%;padding-top:195px;padding-left:438px"><strong><?php echo $profile['familyStatus'] == 'แยกกันอยู่' ? "/" : "" ?></strong></div>
<div id="transport" class="overmask" style="font-size:150%;padding-top:195px;padding-left:523px"><strong><?php echo $profile['familyStatus'] == 'บิดาถึงแก่กรรม' ? "/" : "" ?></strong></div>
<div id="transport" class="overmask" style="font-size:150%;padding-top:225px;padding-left:7px"><strong><?php echo $profile['familyStatus'] == 'มารดาถึงแก่กรรม' ? "/" : "" ?></strong></div>
<div id="transport" class="overmask" style="font-size:150%;padding-top:225px;padding-left:130px"><strong><?php echo $profile['familyStatus'] == 'บิดาหรือมารดาแต่งงานใหม่' ? "/" : "" ?></strong></div>
<div id="transport" class="overmask" style="font-size:150%;padding-top:225px;padding-left:310px"><strong><?php echo $profile['familyStatus'] == 'หย่าร้าง' ? "/" : "" ?></strong></div>

<div style="font-size:16pt;line-height:26px;padding-top:40px;">
<p style="font-weight:bold;font-size:18pt;line-height:10px;padding-bottom:5px;"><u>รายละเอียดการเดินทางมาโรงเรียนของนักเรียน</u></p>
การเดินทางมาโรงเรียน&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;เดินเท้า&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;พาหนะไม่เสียค่าโดยสาร&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;พาหนะเสียค่าโดยสาร
<dl>
<dt style="width:220px;"><strong>ระยะทางจากบ้าน-โรงเรียน</strong> (กิโลเมตร)</dt>
    <dd style="width:115px;"><?php echo $profile['distance'] ?></dd>
    <dt style="width:210px;font-weight:bold;">ระยะเวลาในการเดินทางมาโรงเรียน</dt>
    <dd style="width:115px;"><?php echo $profile['travelDuration'] ?></dd>
    <dt style="width:180px;"><strong>ค่าใช้จ่ายในการเดินทาง</strong> (บาท)</dt>
    <dd style="width:120px;"><?php echo $profile['travelCost'] ?></dd>
    </dl>
    <p style="font-weight:bold;font-size:18pt;line-height:10px;padding-bottom:5px;padding-top:10px;"><u>สถานภาพสมรสของบิดามารดา</u></p>
    <div style="padding-bottom:5px;">
    <span style="font-family: fontawesome; font-size:80%;padding-bottom:5px;">&#xf111;</span>&nbsp;อยู่ด้วยกันจดทะเบียนสมรส&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;อยู่ด้วยกันไม่ได้จดทะเบียนสมรส&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;โสด&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;แยกกันอยู่&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;บิดาถึงแก่กรรม
</div>
<span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;มารดาถึงแก่กรรม&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;บิดาหรือมารดาแต่งงานใหม่&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;หย่าร้าง
<p style="font-weight:bold;font-size:18pt;line-height:10px;padding-top:10px;"><u>ข้อมูลบิดา</u></p>
<dl>
<dt style="width:100px;"><span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;เป็นผู้ปกครอง</dt>
    <dt style="width:70px;font-weight:bold;">เกิดเมื่อวันที่</dt>
    <dd style="width:490px;"><?php echo $dad['dob'] ?></dd>
    <dt style="width:30px;font-weight:bold;">ชื่อ</dt>
    <dd style="width:160px;"><?php echo $dad['title'] . '&nbsp;' . $dad['f_name'] ?></dd>
    <dt style="width:60px;font-weight:bold;">นามสกุล</dt>
    <dd style="width:160px;"><?php echo $dad['l_name'] ?></dd>
    <dt style="width:30px;font-weight:bold;">อายุ</dt>
    <dd style="width:40px;"><?php echo $dad['age'] ?></dd>
    <dt style="width:75px;font-weight:bold;">ปี&nbsp;&nbsp;กรุ๊ปเลือด</dt>
    <dd style="width:85px;"><?php echo $dad['blood'] ?></dd>
    <dt style="width:50px;font-weight:bold;">สัญชาติ</dt>
    <dd style="width:40px;"><?php echo $dad['nationality'] ?></dd>
    <dt style="width:50px;font-weight:bold;">เชื้อชาติ</dt>
    <dd style="width:40px;"><?php echo $dad['race'] ?></dd>
    <dt style="width:47px;font-weight:bold;">ศาสนา</dt>
    <dd style="width:40px;"><?php echo $dad['religion'] ?></dd>
    <dt style="width:40px;font-weight:bold;">อาชีพ</dt>
    <dd style="width:130px;"><?php echo $dad['job'] ?></dd>
    <dt style="width:130px;font-weight:bold;">รายได้ต่อเดือน (บาท)</dt>
    <dd style="width:64px;"><?php echo $dad['income'] ?></dd>
    <dt style="width:140px;font-weight:bold;">เลขประจำตัวประชาชน</dt>
    <dd style="width:300px;"><strong><?php echo citizenWithSpaceGlobal($dad['citizen'], "-") ?></strong></dd>
    <dt style="width:90px;font-weight:bold;">เบอร์โทรติดต่อ</dt>
    <dd style="width:130px;"><?php echo $dad['phone'] ?></dd>
    <dt style="width:220px;font-weight:bold;">หนังสือเดินทางเลขที่ (Passport No.)</dt>
    <dd style="width:335px;">&nbsp;</dd>
    <dt style="width:105px;font-weight:bold;">(เฉพาะต่างด้าว)*</dt>
    </dl>
    <p style="font-weight:bold;font-size:18pt;line-height:10px;padding-top:10px;"><u>ข้อมูลมารดา</u></p>
    <dl>
<dt style="width:100px;"><span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;เป็นผู้ปกครอง</dt>
    <dt style="width:70px;font-weight:bold;">เกิดเมื่อวันที่</dt>
    <dd style="width:490px;"><?php echo $mom['dob'] ?></dd>
    <dt style="width:30px;font-weight:bold;">ชื่อ</dt>
    <dd style="width:160px;"><?php echo $mom['title'] . '&nbsp;' . $mom['f_name'] ?></dd>
    <dt style="width:60px;font-weight:bold;">นามสกุล</dt>
    <dd style="width:160px;"><?php echo $mom['l_name'] ?></dd>
    <dt style="width:30px;font-weight:bold;">อายุ</dt>
    <dd style="width:40px;"><?php echo $mom['age'] ?></dd>
    <dt style="width:75px;font-weight:bold;">ปี&nbsp;&nbsp;กรุ๊ปเลือด</dt>
    <dd style="width:85px;"><?php echo $mom['blood'] ?></dd>
    <dt style="width:50px;font-weight:bold;">สัญชาติ</dt>
    <dd style="width:40px;"><?php echo $mom['nationality'] ?></dd>
    <dt style="width:50px;font-weight:bold;">เชื้อชาติ</dt>
    <dd style="width:40px;"><?php echo $mom['race'] ?></dd>
    <dt style="width:47px;font-weight:bold;">ศาสนา</dt>
    <dd style="width:40px;"><?php echo $mom['religion'] ?></dd>
    <dt style="width:40px;font-weight:bold;">อาชีพ</dt>
    <dd style="width:130px;"><?php echo $mom['job'] ?></dd>
    <dt style="width:130px;font-weight:bold;">รายได้ต่อเดือน (บาท)</dt>
    <dd style="width:64px;"><?php echo $mom['income'] ?></dd>
    <dt style="width:140px;font-weight:bold;">เลขประจำตัวประชาชน</dt>
    <dd style="width:300px;"><strong><?php echo citizenWithSpaceGlobal($mom['citizen'], "-") ?></strong></dd>
    <dt style="width:90px;font-weight:bold;">เบอร์โทรติดต่อ</dt>
    <dd style="width:130px;"><?php echo $mom['phone'] ?></dd>
    <dt style="width:220px;font-weight:bold;">หนังสือเดินทางเลขที่ (Passport No.)</dt>
    <dd style="width:335px;">&nbsp;</dd>
    <dt style="width:105px;font-weight:bold;">(เฉพาะต่างด้าว)*</dt>
    </dl>
    <p style="font-weight:bold;font-size:18pt;line-height:10px;padding-top:10px;"><u>ข้อมูลผู้ปกครอง</u></p>
    <dl>
<dt style="width:100px;"><span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;เป็นผู้ปกครอง</dt>
    <dt style="width:70px;font-weight:bold;">เกิดเมื่อวันที่</dt>
    <dd style="width:130px;">&nbsp;</dd>
    <dt style="width:40px;font-weight:bold;">เดือน</dt>
    <dd style="width:130px;">&nbsp;</dd>
    <dt style="width:40px;font-weight:bold;">พ.ศ.</dt>
    <dd style="width:130px;">&nbsp;</dd>
    <dt style="width:30px;font-weight:bold;">ชื่อ</dt>
    <dd style="width:160px;"><?php echo $parent['title'] . '&nbsp;' . $parent['firstname'] ?></dd>
    <dt style="width:60px;font-weight:bold;">นามสกุล</dt>
    <dd style="width:160px;"><?php echo $parent['lastname'] ?></dd>
    <dt style="width:30px;font-weight:bold;">อายุ</dt>
    <dd style="width:40px;"><?php echo $parent['age'] ?></dd>
    <dt style="width:75px;font-weight:bold;">ปี&nbsp;&nbsp;กรุ๊ปเลือด</dt>
    <dd style="width:85px;"><?php echo $parent['blood'] ?></dd>
    <dt style="width:50px;font-weight:bold;">สัญชาติ</dt>
    <dd style="width:40px;"><?php echo $parent['nationality'] ?></dd>
    <dt style="width:50px;font-weight:bold;">เชื้อชาติ</dt>
    <dd style="width:40px;"><?php echo $parent['race'] ?></dd>
    <dt style="width:47px;font-weight:bold;">ศาสนา</dt>
    <dd style="width:40px;"><?php echo $parent['religion'] ?></dd>
    <dt style="width:40px;font-weight:bold;">อาชีพ</dt>
    <dd style="width:130px;"><?php echo $parent['job'] ?></dd>
    <dt style="width:130px;font-weight:bold;">รายได้ต่อเดือน (บาท)</dt>
    <dd style="width:64px;"><?php echo $parent['income'] ?></dd>
    <dt style="width:140px;font-weight:bold;">เลขประจำตัวประชาชน</dt>
    <dd style="width:300px;"><strong><?php echo citizenWithSpaceGlobal($parent['citizen'], "-") ?></strong></dd>
    <dt style="width:90px;font-weight:bold;">เบอร์โทรติดต่อ</dt>
    <dd style="width:130px;"><?php echo $parent['phone'] ?></dd>
    <dt style="width:220px;font-weight:bold;">หนังสือเดินทางเลขที่ (Passport No.)</dt>
    <dd style="width:335px;">&nbsp;</dd>
    <dt style="width:105px;font-weight:bold;">(เฉพาะต่างด้าว)*</dt>
    </dl>
    <br />
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ขอรับรองว่าข้อมูลข้างต้นนี้ ถูกต้อง ครบถ้วนเป็นความจริงทุกประการ และข้าพเจ้าขอรับรองว่าจะกำกับดูแล ติดตามความประพฤติของนักเรียนให้อยู่ในระเบียบวินัยของโรงเรียนทุกประการ</p>
    <div style="float:left;text-align:center;width:50%;padding-top:5px;">
    <p>ลงชื่อ ............................................... ผู้ปกครอง</p>
    <p  style="margin-left:-30px;padding-top:-5px;padding-bottom:-5px;">( ............................................... )</p>
    <p>วันที่ ........... เดือน ....................... พ.ศ. ...............</p>
    </div>
    <div style="float:left;text-align:center;width:50%">
    <p>ลงชื่อ ............................................... (นักเรียน)</p>
    <p  style="margin-left:-25px;padding-top:-5px;padding-bottom:-5px;">( ............................................... )</p>
    <p>วันที่ ........... เดือน ....................... พ.ศ. ...............</p>
    </div>
    <p style="font-size:14pt;float:right;margin-left:620px;">หน้า 2/2</p>
</div>

<?php

function citizenWithBlock($citizen)
{
  if ($citizen == '-') {
    return '';
  }

  if (strlen($citizen !== 13)) {
    return $citizen;
  }

  $citizenArr = str_split($citizen);
  return $citizenArr[0] . ' - ' . $citizenArr[1] . $citizenArr[2] . $citizenArr[3] . $citizenArr[4] . ' - ' . $citizenArr[5] . $citizenArr[6] . $citizenArr[7] . $citizenArr[8] . $citizenArr[9] . ' - ' . $citizenArr[10] . $citizenArr[11] . ' - ' . $citizenArr[12];
}

function citizenWithSpace($citizen, $spacer)
{
  if (strlen($citizen) == 13) {
    $formatted = substr($citizen, 0, 1) . $spacer . substr($citizen, 1, 4) . $spacer . substr($citizen, 5, 5) . $spacer . substr($citizen, 10, 2) . $spacer . $citizen[12];
    return $formatted;
  }
  return $citizen;
}

$travelDuration = $profile['travelDuration'];
$dateComponentsTralvel = explode(' ', $travelDuration);
$travel = $dateComponentsTralvel[0];
$minute = $dateComponentsTralvel[1];

$dob = $profile['dob'];
$dateComponents = explode(' ', $dob);
$day = $dateComponents[0];
$month = $dateComponents[1];
$year = $dateComponents[2];

$dobDad = $dad['dob'];
$dateComponentsDad = explode(' ', $dobDad);
$dayOfBirthDad = $dateComponentsDad[0];
$monthOfBirthDad = $dateComponentsDad[1];
$yearOfBirthDad = $dateComponentsDad[2];

$dobMom = $mom['dob'];
$dateComponentsMom = explode(' ', $dobMom);
$dayOfBirthMom = $dateComponentsMom[0];
$monthOfBirthMom = $dateComponentsMom[1];
$yearOfBirthMom = $dateComponentsMom[2];

$dobParent = $model['dob'];
$thai_months = array(
    'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน',
    'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
);
$dobP = new DateTime($dobParent);
$dayOfBirthParent = $dobP->format('j');
$monthOfBirthParent = $thai_months[$dobP->format('n') - 1];
$yearOfBirthParent = $dobP->format('Y') + 543; 
?>

<div  style="margin-left:0px;margin-right:-10px;line-height:25px;font-size:16pt;">
<div class="col-1" style="float:left;width:28%;padding-top:5px;padding-top:30px;">
<div class="text-left"><img src="img/phanarai.png" alt="School icon" style="width:auto;height:110px;"></div>
</div>
<div class="col-1" style="width:43%;float:left;padding-top:65px;">
<p style="text-align:center;font-size:20pt;font-weight:bold;line-height:32px">ใบมอบตัว<br />ปีการศึกษา&nbsp;<?php echo $title['year']?></p>
<p style="text-align:center;padding-top:10px">วันที่...........เดือน..............................พ.ศ....................</p>
</div>
<div class="col-1" style="float:right;width:27%;padding-top:5px;">
<table class="table table-bordered table-sm table-collapse" style="width:5cm;height:1.4m;">
          <tr>
            <td style="width:cm;height:1.4cm;text-align:right;border: 1px solid;font-size:14pt;line-height:-10px" valign="bottom">
            <p style="font-size:12pt;font-weight:bold;">เฉพาะเจ้าหน้าที่</p></td>
    </tr>
</table>
<div style="width:2.5cm;height:3.25cm;margin-right:27px;text-align:right;padding-left:2cm;padding-top:10px;">
    <table class="table table-bordered table-sm table-collapse">
          <tr>
            <td style="width:2.5cm;height:3.25cm;text-align:center;border: 1px solid;font-size:14pt;">
            <p style="text-align:center;font-size:14pt;font-weight:bold;">ติดรูปถ่าย</p></td>
    </tr>
</div>
</table>
</div>
</div>
<br />
<br />
<div style="margin-left:25px;margin-right:-25px;padding-right:20px;padding-top:-35px;line-height:20px;font-size:16pt">
ข้าพเจ้าขอทำใบมอบตัวนักเรียนไว้ให้ต่อผู้อำนวยการโรงเรียนพระนารายณ์ดังนี้

<dl>
        <dt style="width:50px;">ข้าพเจ้า</dt>
        <dd style="width:380px;"><?php echo $parent['title'] . $parent['firstname'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $parent['lastname'] ?></dd>
        <dt style="width:40px;">อาชีพ</dt>
        <dd style="width:160px;"><?php echo $parent['job'] ?></dd>
        <dt style="width:140px;">ขอทำใบมอบตัวนักเรียน</dt>
        <dd style="width:500px;"><?php echo $profile['title'] . $profile['firstname'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $profile['lastname'] ?></dd>
        <dt style="width:320px;">เข้าเป็นนักเรียนโรงเรียนพระนารายณ์ ชั้นมัธยมศึกษาปีที่</dt>
        <dd style="width:60px;"><?php echo $title['grade'] ?></dd>
</dl>
<div style="padding-top:10px">
<strong>ข้อมูลนักเรียน</strong>
<dl>
        <dt style="width:50px;">เกิดวันที่</dt>
        <dd style="width:35px;"><?php echo $day ?></dd>
        <dt style="width:32px;">เดือน</dt>
        <dd style="width:110px;"><?php echo $month ?></dd>
        <dt style="width:30px;">พ.ศ.</dt>
        <dd style="width:50px;"><?php echo $year ?></dd>
        <dt style="width:135px;">เลขประจำตัวประชาชน</dt>
        <dd style="width:168px;">
          <strong><?php echo citizenWithSpace($model['registrant']['source_id'], "-") ?></strong>
        </dd>
        <dt style="width:75px;">นับถือศาสนา</dt>
        <dd style="width:57px;"><?php echo $profile['religion'] ?></dd>
        <dt style="width:46px;">สัญชาติ</dt>
        <dd style="width:57px;"><?php echo $profile['nationality'] ?></dd>
        <dt style="width:46px;">เชื้อชาติ</dt>
        <dd style="width:57px;"><?php echo $profile['race'] ?></dd>
        <dt style="width:45px;">น้ำหนัก</dt>
        <dd style="width:48px;"><?php echo $profile['weight'] ?></dd>
        <dt style="width:30px;">กก.</dt>
        <dt style="width:50px;">ส่วนสูง</dt>
        <dd style="width:48px;"><?php echo $profile['height'] ?></dd>
        <dt style="width:30px;">ซม.</dt>
        <dt style="width:57px;">หมู่โลหิต</dt>
        <dd style="width:60px;"><?php echo $profile['blood'] ?></dd>
        <dt style="width:90px;">ชื่อโรงเรียนเดิม</dt>
        <dd style="width:225px;"><?php echo $old_school['name'] ?></dd>
        <dt style="width:45px;">จังหวัด</dt>
        <dd style="width:143px;"><?php echo $old_school['province'] ?></dd>
        <dt style="width:90px;">โทรศัพท์มือถือ</dt>
        <dd style="width:180px;"><?php echo $profile['mobile_no'] ?></dd>
</dl>
<div style="line-height:30px">
<strong>ที่อยู่ตามทะเบียนบ้าน</strong>
</div>
<dl>
        <dt style="width:280px;">เลขรหัสประจำบ้าน ................................................</dt>
        <dt style="width:60px;">บ้านเลขที่</dt>
        <dd style="width:60px;"><?php echo $address['no'] ?></dd>
        <dt style="width:30px;">หมู่ที่</dt>
        <dd style="width:50px;"><?php echo $address['moo'] ?></dd>
        <dt style="width:30px;">ซอย</dt>
        <dd style="width:100px;"><?php echo $address['soi'] ?></dd>
        <dt style="width:35px;">ถนน</dt>
        <dd style="width:90px;"><?php echo $address['street'] ?></dd>
        <dt style="width:70px;">แขวง/ตำบล</dt>
        <dd style="width:100px;"><?php echo $address['sub_district'] ?></dd>
        <dt style="width:70px;">เขต/อำเภอ</dt>
        <dd style="width:100px;"><?php echo $address['district'] ?></dd>
        <dt style="width:45px;">จังหวัด</dt>
        <dd style="width:100px;"><?php echo $address['province'] ?></dd>
        <dt style="width:80px;">รหัสไปรษณีย์</dt>
        <dd style="width:90px;"><?php echo $address['zip'] ?></dd>
</dl>
<div style="line-height:30px">
<strong>ที่อยู่ปัจจุบัน
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;เหมือนที่อยู่ตามทะเบียนบ้าน&nbsp;&nbsp;
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ไม่เหมือนที่อยู่ตามทะเบียนบ้าน โปรดระบุ
</strong>
</div>
<dl>
<dt style="width:60px;">บ้านเลขที่</dt>
        <dd style="width:60px;"><?php echo $address['no'] ?></dd>
        <dt style="width:30px;">หมู่ที่</dt>
        <dd style="width:40px;"><?php echo $address['moo'] ?></dd>
        <dt style="width:30px;">ซอย</dt>
        <dd style="width:90px;"><?php echo $address['soi'] ?></dd>
        <dt style="width:35px;">ถนน</dt>
        <dd style="width:87px;"><?php echo $address['street'] ?></dd>
        <dt style="width:70px;">แขวง/ตำบล</dt>
        <dd style="width:100px;"><?php echo $address['sub_district'] ?></dd>
        <dt style="width:70px;">เขต/อำเภอ</dt>
        <dd style="width:100px;"><?php echo $address['district'] ?></dd>
        <dt style="width:45px;">จังหวัด</dt>
        <dd style="width:100px;"><?php echo $address['province'] ?></dd>
        <dt style="width:80px;">รหัสไปรษณีย์</dt>
        <dd style="width:90px;"><?php echo $address['zip'] ?></dd>
        </dl>
        </div>
        <div style="padding-top:10px">
        <dl>
        <dt style="width:80px;">วิธีการเดินทาง</dt>
        <dd style="width:80px;"><?php echo $profile['transport'] ?></dd>
        <dt style="width:145px;">ระยะทางบ้าน – โรงเรียน</dt>
        <dd style="width:30px;"><?php echo $profile['distance'] ?></dd>
        <dt style="width:50px;">กิโลเมตร</dt>
        <dt style="width:135px;">ค่าใช้จ่ายในการเดินทาง</dt>
        <dd style="width:35px;"><?php echo $profile['travelCost'] ?></dd>
        <dt style="width:50px;">บาท/วัน</dt>
        <dt style="width:385px;"> นักเรียนมีความสามารถพิเศษ
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ดนตรี&nbsp;&nbsp;&nbsp;&nbsp;
        <span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;กีฬา โปรดระบุ</dt>
        <dd style="width:257px;"><?php echo $profile['talent'] ?></dd>
        </dl>
        </div>
        <div style="padding-top:10px">
        <strong>ข้อมูลผู้ปกครอง <u>(กรณีผู้ปกครองเป็นบิดาหรือมารดา ไม่ต้องกรอกส่วนนี้ ข้ามไปกรอกหน้าถัดไป)</u></strong>
        <dl>
        <dt style="width:240px;">ข้าพเจ้ามีความเกี่ยวข้องกับนักเรียนคือเป็น</dt>
        <dd style="width:210px;"><?php echo $parent['relative'] ?></dd>
        <dt style="width:180px;">ของนักเรียน</dt>
        <dt style="width:110px;">ชื่อ-สกุล<u>ผู้ปกครอง</u></dt>
        <dd style="width:192px;"><?php echo $parent['title'] . $parent['firstname'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $parent['lastname'] ?></dd>
        <dt style="width:140px;">เลขประจำตัวประชาชน</dt>
        <dd style="width:192px;">
          <strong><?php echo citizenWithSpace($parent['citizen'], "-") ?></strong></dd>
          <dt style="width:50px;">เกิดวันที่</dt>
        <dd style="width:35px;"><?php echo $dayOfBirthParent ?></dd>
        <dt style="width:32px;">เดือน</dt>
        <dd style="width:110px;"><?php echo $monthOfBirthParent ?></dd>
        <dt style="width:30px;">พ.ศ.</dt>
        <dd style="width:50px;"><?php echo $yearOfBirthParent ?></dd>
        <dt style="width:86px;">โทรศัพท์มือถือ</dt>
        <dd style="width:220px;"><?php echo $parent['phone'] ?></dd>
        <dt style="width:140px;">ที่อยู่ปัจจุบันบ้านเลขที่</dt>
        <dd style="width:140px;"><?php echo $address['no'] ?></dd>
        <dt style="width:30px;">หมู่ที่</dt>
        <dd style="width:40px;"><?php echo $address['moo'] ?></dd>
        <dt style="width:30px;">ซอย</dt>
        <dd style="width:100px;"><?php echo $address['soi'] ?></dd>
        <dt style="width:35px;">ถนน</dt>
        <dd style="width:95px;"><?php echo $address['street'] ?></dd>
        <dt style="width:70px;">แขวง/ตำบล</dt>
        <dd style="width:90px;"><?php echo $address['sub_district'] ?></dd>
        <dt style="width:70px;">เขต/อำเภอ</dt>
        <dd style="width:90px;"><?php echo $address['district'] ?></dd>
        <dt style="width:45px;">จังหวัด</dt>
        <dd style="width:85px;"><?php echo $address['province'] ?></dd>
        <dt style="width:80px;">รหัสไปรษณีย์</dt>
        <dd style="width:83px;"><?php echo $address['zip'] ?></dd>
        <dt style="width:40px;">อาชีพ</dt>
        <dd style="width:120px;"><?php echo $parent['job'] ?></dd>
        <dt style="width:80px;">รายได้/เดือน</dt>
        <dd style="width:80px;"><?php echo $parent['income'] ?></dd>
        <dt style="width:30px;">บาท</dt>
        <dt style="width:290px;">สถานที่ทำงาน ...................................................</dt>
        <dt style="width:85px;">ซอย ................</dt>
        <dt style="width:85px;">ถนน ...............</dt>
        <dt style="width:145px;">แขวง/ตำบล .....................</dt>
        <dt style="width:145px;">เขต/อำเภอ ......................</dt>
        <dt style="width:145px;">จังหวัด ............................</dt>
        </dl>
        </div>
        </div>

        <pagebreak />

        <div style="margin-left:25px;margin-right:-25px;padding-right:20px;padding-top: 60px;line-height:20px;font-size:16pt">
        <strong>ข้อมูลบิดา-มารดา</u></strong>
        <dl>
        <dt style="width:80px;">ชื่อ-สกุล<u>บิดา</u></dt>
        <dd style="width:205px;"><?php echo $dad['title'] . $dad['f_name'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $dad['l_name'] ?></dd>
        <dt style="width:140px;">เลขประจำตัวประชาชน</dt>
        <dd style="width:208px;">
          <strong><?php echo citizenWithSpace($dad['citizen'], "-") ?></strong></dd>
          <dt style="width:50px;">เกิดวันที่</dt>
        <dd style="width:35px;"><?php echo $dayOfBirthDad ?></dd>
        <dt style="width:32px;">เดือน</dt>
        <dd style="width:110px;"><?php echo $monthOfBirthDad ?></dd>
        <dt style="width:30px;">พ.ศ.</dt>
        <dd style="width:50px;"><?php echo $yearOfBirthDad ?></dd>
        <dt style="width:86px;">โทรศัพท์มือถือ</dt>
        <dd style="width:220px;"><?php echo $dad['phone'] ?></dd>
        <dt style="width:130px;">ที่อยู่ปัจจุบันบ้านเลขที่</dt>
        <dd style="width:110px;"><?php echo $address['no'] ?></dd>
        <dt style="width:30px;">หมู่ที่</dt>
        <dd style="width:75px;"><?php echo $address['moo'] ?></dd>
        <dt style="width:30px;">ซอย</dt>
        <dd style="width:100px;"><?php echo $address['soi'] ?></dd>
        <dt style="width:35px;">ถนน</dt>
        <dd style="width:100px;"><?php echo $address['street'] ?></dd>
        <dt style="width:70px;">แขวง/ตำบล</dt>
        <dd style="width:90px;"><?php echo $address['sub_district'] ?></dd>
        <dt style="width:70px;">เขต/อำเภอ</dt>
        <dd style="width:90px;"><?php echo $address['district'] ?></dd>
        <dt style="width:45px;">จังหวัด</dt>
        <dd style="width:85px;"><?php echo $address['province'] ?></dd>
        <dt style="width:80px;">รหัสไปรษณีย์</dt>
        <dd style="width:83px;"><?php echo $address['zip'] ?></dd>
        <dt style="width:40px;">อาชีพ</dt>
        <dd style="width:120px;"><?php echo $dad['job'] ?></dd>
        <dt style="width:80px;">รายได้/เดือน</dt>
        <dd style="width:80px;"><?php echo $dad['income'] ?></dd>
        <dt style="width:30px;">บาท</dt>
        <dt style="width:290px;">สถานที่ทำงาน ...................................................</dt>
        <dt style="width:85px;">ซอย ................</dt>
        <dt style="width:85px;">ถนน ...............</dt>
        <dt style="width:145px;">แขวง/ตำบล .....................</dt>
        <dt style="width:145px;">เขต/อำเภอ ......................</dt>
        <dt style="width:145px;">จังหวัด ............................</dt>
        <br />
        <dt style="width:90px;">ชื่อ-สกุล<u>มารดา</u></dt>
        <dd style="width:202px;"><?php echo $mom['title'] . $mom['f_name'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $mom['l_name'] ?></dd>
        <dt style="width:140px;">เลขประจำตัวประชาชน</dt>
        <dd style="width:202px;">
          <strong><?php echo citizenWithSpace($mom['citizen'], "-") ?></strong></dd>
          <dt style="width:50px;">เกิดวันที่</dt>
        <dd style="width:35px;"><?php echo $dayOfBirthMom ?></dd>
        <dt style="width:32px;">เดือน</dt>
        <dd style="width:110px;"><?php echo $monthOfBirthMom ?></dd>
        <dt style="width:30px;">พ.ศ.</dt>
        <dd style="width:50px;"><?php echo $yearOfBirthMom ?></dd>
        <dt style="width:86px;">โทรศัพท์มือถือ</dt>
        <dd style="width:220px;"><?php echo $mom['phone'] ?></dd>
        <dt style="width:130px;">ที่อยู่ปัจจุบันบ้านเลขที่</dt>
        <dd style="width:110px;"><?php echo $address['no'] ?></dd>
        <dt style="width:30px;">หมู่ที่</dt>
        <dd style="width:75px;"><?php echo $address['moo'] ?></dd>
        <dt style="width:30px;">ซอย</dt>
        <dd style="width:100px;"><?php echo $address['soi'] ?></dd>
        <dt style="width:35px;">ถนน</dt>
        <dd style="width:100px;"><?php echo $address['street'] ?></dd>
        <dt style="width:70px;">แขวง/ตำบล</dt>
        <dd style="width:90px;"><?php echo $address['sub_district'] ?></dd>
        <dt style="width:70px;">เขต/อำเภอ</dt>
        <dd style="width:90px;"><?php echo $address['district'] ?></dd>
        <dt style="width:45px;">จังหวัด</dt>
        <dd style="width:85px;"><?php echo $address['province'] ?></dd>
        <dt style="width:80px;">รหัสไปรษณีย์</dt>
        <dd style="width:83px;"><?php echo $address['zip'] ?></dd>
        <dt style="width:40px;">อาชีพ</dt>
        <dd style="width:120px;"><?php echo $mom['job'] ?></dd>
        <dt style="width:80px;">รายได้/เดือน</dt>
        <dd style="width:80px;"><?php echo $mom['income'] ?></dd>
        <dt style="width:30px;">บาท</dt>
        <dt style="width:290px;">สถานที่ทำงาน ...................................................</dt>
        <dt style="width:85px;">ซอย ................</dt>
        <dt style="width:85px;">ถนน ...............</dt>
        <dt style="width:145px;">แขวง/ตำบล .....................</dt>
        <dt style="width:145px;">เขต/อำเภอ ......................</dt>
        <dt style="width:145px;">จังหวัด ............................</dt>
        </dl>
        <div style="line-height:30px">
        สถานภาพครอบครัว&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;อยู่ด้วยกันจดทะเบียนสมรส&nbsp;&nbsp;
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;อยู่ด้วยกันไม่จดทะเบียนสมรส&nbsp;&nbsp;
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;หย่าร้าง
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;แยกกันอยู่&nbsp;&nbsp;
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;บิดาถึงแก่กรรม
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;มารดาถึงแก่กรรม&nbsp;&nbsp;
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;บิดาและมารดาถึงแก่กรรม
<!--
  <div id="edu_program" class="overmask" style="font-size:150%;margin-top:-65px;margin-left:125px"><strong><?php echo $profile['familyStatus'] === 'อยู่ด้วยกันจดทะเบียนสมรส' ? "/" : "" ?></strong></div>
<div id="edu_program" class="overmask" style="font-size:150%;margin-top:-5px;margin-left:310px"><strong><?php echo $profile['familyStatus'] === 'อยู่ด้วยกันจดทะเบียนสมรสa' ? "/" : "" ?></strong></div>
<div id="edu_program" class="overmask" style="font-size:150%;margin-top:-5px;margin-left:310px"><strong><?php echo $profile['familyStatus'] === 'อยู่ด้วยกันจดทะเบียนสมรสa' ? "/" : "" ?></strong></div>
<br/>
-->
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้ารับเป็นผู้ปกครองและขอให้คำมั่นสัญญาว่าจะเป็นผู้คอยตักเตือนให้นักเรียนขยันหมั่นเพียรในการเรียน<br />
และประพฤติตน ปฏิบัติตนให้อยู่ในระเบียบวินัยด้วยความเรียบร้อยตามคำสั่งของครูตามระเบียบและแนวปฏิบัติของ<br />
โรงเรียนทุกประการ ทั้งจะเป็นผู้อุปถัมภ์ค่าใช้จ่ายในการเรียนให้พอใช้สอย
        <dl>
        <dt style="width:90px;">ข้าพเจ้าขอมอบ</dt>
        <dd style="width:550px;"><?php echo $profile['title'] . $profile['firstname'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $profile['lastname'] ?></dd>
        </dl>
        ให้เข้าเป็นนักเรียนโรงเรียนพระนารายณ์ ตั้งแต่วันนี้เป็นต้นไป พร้อมทั้งนี้ได้แนบสำเนาเอกสารดังต่อไปนี้

        <div class="col-1" style="float:left;width:50%">
        <span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;สำเนา ปพ.1<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;สำเนาทะเบียนบ้านบิดา<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;สำเนาทะเบียนบ้านเฉพาะที่ไม่ใช่บิดา – มารดา<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;อื่นๆ ถ้ามี………………………………………………<br />
</div>
<div class="col-1" style="float:left;width:50%">
        <span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;สำเนาทะเบียนบ้านนักเรียน<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;สำเนาทะเบียนบ้านมารดา<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;สำเนาสูติบัตร<br />
</div>
<p><u>หมายเหตุ</u> ในกรณีที่เอกสารไม่ครบ ให้นำมายื่นภายในวันที่...........................................หากเกินกว่านี้ถือว่าสละสิทธิ์</p>
</div>
<div class="col-1" style="float:right;width:50%;line-height:30px">
<p>ลงชื่อ.........................................................ผู้ปกครอง<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(.......................................................)<br /></p>

<p>ลงชื่อ.....................................................ครูผู้รับมอบตัว<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(.......................................................)<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;................/....................../..................<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เขียนตัวบรรจง
</p>
</div>
        </div>
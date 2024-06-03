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

?>


<div id="school_code" class="overmask" style="font-size:120%;"><strong>10010043</strong></div>
<div id="gender_male" class="overmask" style="font-size:150%;"><strong><?php echo $profile['gender'] === 0 ? "/" : "" ?></strong></div>
<div id="gender_female" class="overmask" style="font-size:150%;"><strong><?php echo $profile['gender'] === 1 ? "/" : "" ?></strong></div>

<div class="page A4" style="line-height: 1;">

  <div id="header" class="clear">
    <div class="header hLeft center fLeft">
      <div class="borderDoubleB" style="margin:10; width:35mm; height:45mm; float:left;">
        <p style="padding-top:60px;">รูปถ่ายนักเรียน</p><br />
        <p style="font-size:90%;">ขนาด 1 - 2 นิ้ว</p>
      </div>
      <div class="borderDoubleB" style="margin-left:10; width:35mm; height:45mm;float:left;">
        <p style="padding-top:60px;">รูปถ่ายผู้ปกครอง</p><br />
        <p style="font-size:90%;">ขนาด 1 - 2 นิ้ว</p>
      </div>
    </div>
    <div class="header hCenter center fLeft">
      <img src="<?php echo $img ?>" alt="" style="width:100;height:100">
      <br>
      <h3 class="topicH2 bold">
        ทะเบียนประวัตินักเรียนรายบุคคล
      </h3>
      <h3 class="topicH2 bold">
        ปีการศึกษา&nbsp;<?php echo date('m') <= 4 ? date('Y') + 542 : date('Y') + 543 ?>
      </h3>
    </div>
    <div class="header hRight center fRight">
      <div class="borderDoubleB" style="padding-top:20; width:450px; height:42mm;">
        <p><u><strong>ส่วนของเจ้าหน้าที่</strong></u></p>
        <p style="padding-top:5;"><strong>รหัสโรงเรียน</strong></p>
        <p style="font-size:150%;letter-spacing: -0.14em;">🔲🔲🔲🔲🔲🔲🔲🔲</p>
        <p style="padding-top:5;">เลขประจำตัวนักเรียน</p>
        <p style="font-size:150%;letter-spacing: -0.14em;">🔲🔲🔲🔲🔲</p>
        <p>ชั้น ม...../.....</p>
      </div>
      <p style="font-size:110%;font-weight:bold;">(งานทะเบียนนักเรียน)</p>
    </div>
  </div>
  <div class="container clear" style="margin-top:2;line-height: 1.5;">
    <section style="margin-left:15;">
      <h4 class="section">ข้อมูลนักเรียน</h4>
      <strong>ประเภทห้องเรียน</strong>
      <span>
        <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;&nbsp;ปกติ&nbsp;&nbsp;&nbsp;&nbsp;
        <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;&nbsp;MEP&nbsp;&nbsp;&nbsp;&nbsp;
        <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;&nbsp;EP&nbsp;&nbsp;&nbsp;&nbsp;
        <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;&nbsp;IEP&nbsp;&nbsp;&nbsp;&nbsp;
        <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;&nbsp;GIFTED&nbsp;&nbsp;&nbsp;&nbsp;
        <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;&nbsp;EIS&nbsp;&nbsp;&nbsp;&nbsp;
        <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;&nbsp;AI
      </span>

      <br />
      <strong>*แผนการเรียน (เฉพาะนักเรียน ม.ปลาย)*</strong>&nbsp;
      <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;&nbsp;วิทยาศาสตร์-คณิตศาสตร์&nbsp;&nbsp;&nbsp;
      <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;&nbsp;วิทยาศาสตร์-คณิตศาสตร์-ปัญญาประดิษฐ์
      <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;&nbsp;ภาษาอังกฤษ-คณิตศาสตร์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;&nbsp;ภาษาอังกฤษ-ภาษาจีน &nbsp;&nbsp;
      <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;&nbsp;ภาษาอังกฤษ-ภาษาญี่ปุ่น&nbsp;&nbsp;&nbsp;&nbsp;
      <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;&nbsp;ภาษาอังกฤษ-ภาษาเกาหลี &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;&nbsp;ภาษาอังกฤษ-ธุรกิจ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;&nbsp;ภาษาไทย-สังคมศึกษา

      <br />
      <dl>
        <dt style="width:75px;"><strong>ชื่อภาษาไทย</strong></dt>
        <dd style="width:260px;"><?php echo $profile['title'] . $profile['firstname'] ?></dd>
        <dt style="width:50px;"><strong>นามสกุล</strong></dt>
        <dd style="width:293px;"><?php echo $profile['lastname'] ?></dd>
      </dl>
      <dl>
        <dt style="width:185px;"><strong>ชื่อภาษาอังกฤษ (ตัวพิมพ์ใหญ่)</strong></dt>
        <dd style="width:500px;">&nbsp;</dd>
      </dl>
      <dl>
        <dt style="width:215px;"><strong>นามสกุลภาษาอังกฤษ (ตัวพิมพ์ใหญ่)</strong></dt>
        <dd style="width:470px;">&nbsp;</dd>
      </dl>

      <dl>
        <dt style="width:40px;"><strong>เพศ</strong></dt>
        <dd class="noborder" style="width:110px;padding-top:3px;">
          <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;ชาย&nbsp;&nbsp;&nbsp;
          <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;หญิง
        </dd>
        <dt style="width:110px;"><strong>&nbsp;&nbsp;วัน/เดือน/ปีเกิด</strong></dt>
        <dd style="width:170px;"><?php echo $profile['dob'] ?></dd>
        <dt style="width:75px;"><strong>จังหวัดที่เกิด</strong></dt>
        <dd style="width:160px;"><?php echo $profile['born'] ?></dd>
      </dl>

      <dl>
        <dt style="width:50px;"><strong>สัญชาติ</strong></dt>
        <dd style="width:70px;"><?php echo $profile['nationality'] ?></dd>
        <dt style="width:50px;"><strong>เชื้อชาติ</strong></dt>
        <dd style="width:85px;"><?php echo $profile['race'] ?></dd>
        <dt style="width:45px;"><strong>ศาสนา</strong></dt>
        <dd style="width:174px;"><?php echo $profile['religion'] ?></dd>
        <dt style="width:58px;"><strong>กรุ๊ปเลือด</strong></dt>
        <dd style="width:125px;"><?php echo $profile['blood'] ?></dd>
      </dl>

      <dl>
        <dt style="width:140px;"><strong>เลขประจำตัวประชาชน</strong></dt>
        <dd style="width:300px;font-size:120%;">
          <strong><?php echo citizenWithSpace($model['registrant']['source_id'], "-") ?></strong>
        </dd>
        <dt style="width:40px;"><strong>ชื่อเล่น</strong></dt>
        <dd style="width:195px;">&nbsp;</dd>
      </dl>

      <dl>
        <dt style="width:220px;"><strong>หนังสือเดินทางเลขที่ (Passport No.)</strong></dt>
        <dd style="width:355px;">&nbsp;</dd>
        <dt style="width:110px;"><strong>(เฉพาะต่างด้าว)*</strong></dt>
      </dl>

      <dl>
        <dt style="width:43px;"><strong>น้ำหนัก</strong></dt>
        <dd style="width:35px;"><?php echo $profile['weight'] ?></dd>
        <dt style="width:43px;"><strong>ส่วนสูง</strong></dt>
        <dd style="width:35px;"><?php echo $profile['height'] ?></dd>
        <dt style="width:85px;"><strong>เบอร์โทรติดต่อ</strong></dt>
        <dd style="width:110px;"><?php echo $profile['mobile_no'] ?></dd>
        <dt style="width:43px;"><strong>E-Mail</strong></dt>
        <dd style="width:140px;"><?php echo $profile['email'] ?></dd>
        <dt style="width:50px;"><strong>ID LINE</strong></dt>
        <dd style="width:63px;">&nbsp;</dd>
      </dl>

      <dl>
        <dt style="width:115px;"><strong>จำนวนพี่น้อง (คน)</strong></dt>
        <dd style="width:35px;"><?php echo $profile['elderBrother'] + $profile['youngerBrother'] + $profile['elderSister'] + $profile['youngerSister'] ?></dd>
        <dt style="width:35px;"><strong>พี่ชาย</strong></dt>
        <dd style="width:35px;"><?php echo $profile['elderBrother'] ?></dd>
        <dt style="width:48px;"><strong>น้องชาย</strong></dt>
        <dd style="width:35px;"><?php echo $profile['youngerBrother'] ?></dd>
        <dt style="width:35px;"><strong>พี่สาว</strong></dt>
        <dd style="width:30px;"><?php echo $profile['elderSister'] ?></dd>
        <dt style="width:50px;"><strong>น้องสาว</strong></dt>
        <dd style="width:30px;"><?php echo $profile['youngerSister'] ?></dd>
        <dt style="width:145px;"><strong>รวมจำนวนพี่น้องทั้งหมด</strong></dt>
        <dd style="width:45px;"><?php echo $profile['elderBrother'] + $profile['youngerBrother'] + $profile['elderSister'] + $profile['youngerSister'] + 1 ?></dd>
      </dl>

      <dl>
        <dt style="width:140px;"><strong>นักเรียนเป็นบุตรลำดับที่</strong></dt>
        <dd style="width:35;"><?php echo $profile['birthOrder'] ?></dd>
        <dt style="width:305px;"><strong>จำนวนพี่น้องที่กำลังศึกษาอยู่ (คน)</strong><i>ไม่รวมตัวนักเรียน</i></dt>
        <dd style="width:35;"><?php echo $profile['childInSchool'] ?></dd>
        <dt style="width:120px;"><strong>ที่ประกอบอาชีพแล้ว</strong></dt>
        <dd style="width:35;">&nbsp;</dd>
      </dl>

      <dl>
        <dt style="width:170px;"><strong>วุฒิเดิม *ที่ใช้ในการมอบตัว*</strong></dt>
        <dd class="noborder" style="width:485px;padding-top:3px;">
          <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;ประถมศึกษาปีที่ 6&nbsp;
          <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;มัธยมศึกษาปีที่&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;1&nbsp;
          <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;2&nbsp;
          <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;3&nbsp;
          <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;4&nbsp;
          <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;5&nbsp;
          <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;6
        </dd>
        <dt style="width:255px;">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;อื่นๆ (ระบุ)
        </dt>
        <dd style="width:435;">&nbsp;</dd>
      </dl>

      <dl>
        <dt style="width:90px;"><strong>ชื่อโรงเรียนเดิม</strong></dt>
        <dd style="width:365;"><?php echo $profile['graduate'] ?></dd>
        <dt style="width:50px;"><strong>จังหวัด</strong></dt>
        <dd style="width:175;"><?php echo $profile['graduateProvince'] ?></dd>
      </dl>

      <h4 class="section">ที่อยู่ตามทะเบียนบ้าน</h4>
      <dl>
        <dt style="width:90px;"><strong>รหัสประจำบ้าน</strong></dt>
        <dd class="noborder" style="width:230px;padding-top:3px;font-size:120%;">🔲🔲🔲🔲 - 🔲🔲🔲🔲🔲🔲 - 🔲</dd>
        <dt style="width:60px;"><strong>บ้านเลขที่</strong></dt>
        <dd style="width:45px;"><?php echo $address['no'] ?></dd>
        <dt style="width:50px;"><strong>หมู่บ้าน</strong></dt>
        <dd style="width:110px;">&nbsp;</dd>
        <dt style="width:35px;"><strong>หมู่ที่</strong></dt>
        <dd style="width:35px;"><?php echo $address['moo'] ?></dd>
      </dl>

      <dl>
        <dt style="width:30px;"><strong>ซอย</strong></dt>
        <dd style="width:335;"><?php echo $address['soi'] ?></dd>
        <dt style="width:30px;"><strong>ถนน</strong></dt>
        <dd style="width:279;"><?php echo $address['street'] ?></dd>
      </dl>

      <dl>
        <dt style="width:80px;"><strong>ตำบล/แขวง</strong></dt>
        <dd style="width:165;"><?php echo $address['sub_district'] ?></dd>
        <dt style="width:65px;"><strong>อำเภอ/เขต</strong></dt>
        <dd style="width:160;"><?php echo $address['district'] ?></dd>
        <dt style="width:45px;"><strong>จังหวัด</strong></dt>
        <dd style="width:152;"><?php echo $address['province'] ?></dd>
      </dl>

      <dl>
        <dt style="width:80px;"><strong>รหัสไปรษณีย์</strong></dt>
        <dd style="width:165;"><?php echo $address['zip'] ?></dd>
        <dt style="width:90px;"><strong>เบอร์โทรติดต่อ</strong></dt>
        <dd style="width:337;"><?php echo $parent['phone'] ?></dd>
      </dl>

      <div class="right" style="font-size:80%;"><strong>หน้า 1/2</strong></div>
    </section>

    <pagebreak />

    <section style="margin-left:-45;margin-right:35;line-height: 0.9;">

      <h4 class="section">รายละเอียดการเดินทางมาโรงเรียนของนักเรียน</h4>
      <dl>
        <dt style="width:130px;">การเดินทางมาโรงเรียน</dt>
        <dd class="noborder" style="width:405px;padding-top:3px;">
          <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;เดินเท้า&nbsp;
          <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;พาหนะไม่เสียค่าโดยสาร&nbsp;
          <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;พาหนะเสียค่าโดยสาร
        </dd>
      </dl>

      <dl style="letter-spacing: -0.5px">
        <dt style="width:200px;"><strong>ระยะทางจากบ้าน-โรงเรียน</strong> (กิโลเมตร)</dt>
        <dd style="width:25;"><?php echo $profile['distance'] ?></dd>
        <dt style="width:200px;"><strong>ระยะเวลาในการเดินทางมาโรงเรียน</strong></dt>
        <dd style="width:55;"><?php echo $profile['travelDuration'] ?></dd>
        <dt style="width:170px;"><strong>ค่าใช้จ่ายในการเดินทาง</strong> (บาท)</dt>
        <dd style="width:25;"><?php echo $profile['travelCost'] ?></dd>
      </dl>

      <h4 class="section">สถานภาพสมรสของบิดามารดา</h4>
      <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;อยู่ด้วยกันจดทะเบียนสมรส&nbsp;
      <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;อยู่ด้วยกันไม่ได้จดทะเบียนสมรส&nbsp;
      <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;โสด&nbsp;
      <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;แยกกันอยู่&nbsp;
      <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;บิดาถึงแก่กรรม&nbsp;
      <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;มารดาถึงแก่กรรม&nbsp;
      <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;บิดาหรือมารดาแต่งงานใหม่&nbsp;
      <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;หย่าร้าง

      <h4 class="section">ข้อมูลบิดา</h4>
      <dl style="letter-spacing: -0.5px">
        <dt style="width:90px;">
          <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;เป็นผู้ปกครอง
        </dt>
        <dd class="noborder" style="width:265;margin-top:3px;"><i>(ถ้าเลือกเป็นผู้ปกครอง<u><strong>ไม่</strong></u>ต้องกรอกข้อมูลผู้ปกครอง)</i></dd>
        <dt style="width:65px;"><strong>เกิดเมื่อวันที่</strong></dt>
        <dd style="width:255;"><?php echo $dad['dob'] ?></dd>
      </dl>

      <dl>
        <dt style="width:30px;"><strong>ชื่อ</strong></dt>
        <dd style="width:310;"><?php echo $dad['title'] . ' ' . $dad['f_name'] ?></dd>
        <dt style="width:60px;"><strong>นามสกุล</strong></dt>
        <dd style="width:277;"><?php echo $dad['l_name'] ?></dd>
      </dl>

      <dl style="letter-spacing: -0.5px">
        <dt style="width:30px;"><strong>อายุ</strong></dt>
        <dd style="width:30px;"><?php echo $dad['age'] ?></dd>
        <dt style="width:75px;"><strong>ปี&nbsp;&nbsp;กรุ๊ปเลือด</strong></dt>
        <dd style="width:30px;"><?php echo $dad['blood'] ?></dd>
        <dt style="width:50px;"><strong>สัญชาติ</strong></dt>
        <dd style="width:35px;"><?php echo $dad['nationality'] ?></dd>
        <dt style="width:55px;"><strong>เชื้อชาติ</strong></dt>
        <dd style="width:35px;"><?php echo $dad['race'] ?></dd>
        <dt style="width:50px;"><strong>ศาสนา</strong></dt>
        <dd style="width:35px;"><?php echo $dad['religion'] ?></dd>
        <dt style="width:125px;"><strong>รายได้ต่อเดือน (บาท)</strong></dt>
        <dd style="width:85px;"><?php echo $dad['income'] ?></dd>
      </dl>


      <dl>
        <dt style="width:140px;"><strong>เลขประจำตัวประชาชน</strong></dt>
        <dd style="width:300px;font-size:120%;">
          <strong><?php echo citizenWithSpace($dad['citizen'], "-") ?></strong>
        </dd>
        <dt style="width:90px;"><strong>เบอร์โทรติดต่อ</strong></dt>
        <dd style="width:146px;"><?php echo $dad['phone'] ?></dd>
      </dl>

      <dl>
        <dt style="width:220px;"><strong>หนังสือเดินทางเลขที่ (Passport No.)</strong></dt>
        <dd style="width:360px;">&nbsp;</dd>
        <dt style="width:110px;"><strong>(เฉพาะต่างด้าว)*</strong></dt>
      </dl>

      <h4 class="section">ข้อมูลมารดา</h4>
      <dl style="letter-spacing: -0.5px">
        <dt style="width:90px;">
          <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;เป็นผู้ปกครอง
        </dt>
        <dd class="noborder" style="width:265;margin-top:3px;"><i>(ถ้าเลือกเป็นผู้ปกครอง<u><strong>ไม่</strong></u>ต้องกรอกข้อมูลผู้ปกครอง)</i></dd>
        <dt style="width:65px;"><strong>เกิดเมื่อวันที่</strong></dt>
        <dd style="width:255;"><?php echo $mom['dob'] ?></dd>
      </dl>

      <dl>
        <dt style="width:30px;"><strong>ชื่อ</strong></dt>
        <dd style="width:310;"><?php echo $mom['title'] . ' ' . $mom['f_name'] ?></dd>
        <dt style="width:60px;"><strong>นามสกุล</strong></dt>
        <dd style="width:277;"><?php echo $mom['l_name'] ?></dd>
      </dl>

      <dl style="letter-spacing: -0.5px">
        <dt style="width:30px;"><strong>อายุ</strong></dt>
        <dd style="width:30px;"><?php echo $mom['age'] ?></dd>
        <dt style="width:75px;"><strong>ปี&nbsp;&nbsp;กรุ๊ปเลือด</strong></dt>
        <dd style="width:30px;"><?php echo $mom['blood'] ?></dd>
        <dt style="width:50px;"><strong>สัญชาติ</strong></dt>
        <dd style="width:35px;"><?php echo $mom['nationality'] ?></dd>
        <dt style="width:55px;"><strong>เชื้อชาติ</strong></dt>
        <dd style="width:35px;"><?php echo $mom['race'] ?></dd>
        <dt style="width:50px;"><strong>ศาสนา</strong></dt>
        <dd style="width:35px;"><?php echo $mom['religion'] ?></dd>
        <dt style="width:125px;"><strong>รายได้ต่อเดือน (บาท)</strong></dt>
        <dd style="width:85px;"><?php echo $mom['income'] ?></dd>
      </dl>

      <dl>
        <dt style="width:140px;"><strong>เลขประจำตัวประชาชน</strong></dt>
        <dd style="width:300px;font-size:120%;">
          <strong><?php echo citizenWithSpace($mom['citizen'], "-") ?></strong>
        </dd>
        <dt style="width:90px;"><strong>เบอร์โทรติดต่อ</strong></dt>
        <dd style="width:146px;"><?php echo $mom['phone'] ?></dd>
      </dl>

      <dl>
        <dt style="width:220px;"><strong>หนังสือเดินทางเลขที่ (Passport No.)</strong></dt>
        <dd style="width:360px;">&nbsp;</dd>
        <dt style="width:110px;"><strong>(เฉพาะต่างด้าว)*</strong></dt>
      </dl>

      <h4 class="section">ข้อมูลผู้ปกครอง</h4>
      <dl style="letter-spacing: -0.5px">
        <dt style="width:90px;">
          <span style="font-family: fontawesome; font-size:70%;">&#xf111;</span>&nbsp;เป็นผู้ปกครอง
        </dt>
        <dd class="noborder" style="width:330;margin-top:3px;"><i>(กรณี บิดาหรือมารดาเป็นผู้ปกครอง<u><strong>ไม่</strong></u>ต้องกรอกข้อมูลผู้ปกครอง)</i></dd>
        <dt style="width:65px;"><strong>เกิดเมื่อวันที่</strong></dt>
        <dd style="width:25;">&nbsp;</dd>
        <dt style="width:35px;"><strong>เดือน</strong></dt>
        <dd style="width:55;">&nbsp;</dd>
        <dt style="width:30px;"><strong>พ.ศ.</strong></dt>
        <dd style="width:30;">&nbsp;</dd>
      </dl>

      <dl>
        <dt style="width:30px;"><strong>ชื่อ</strong></dt>
        <dd style="width:310;"><?php echo $parent['title'] . ' ' . $parent['firstname'] ?></dd>
        <dt style="width:60px;"><strong>นามสกุล</strong></dt>
        <dd style="width:277;"><?php echo $parent['lastname'] ?></dd>
      </dl>

      <dl style="letter-spacing: -0.5px">
        <dt style="width:30px;"><strong>อายุ</strong></dt>
        <dd style="width:30px;"><?php echo $parent['age'] ?></dd>
        <dt style="width:75px;"><strong>ปี&nbsp;&nbsp;กรุ๊ปเลือด</strong></dt>
        <dd style="width:30px;"><?php echo $parent['blood'] ?></dd>
        <dt style="width:50px;"><strong>สัญชาติ</strong></dt>
        <dd style="width:35px;"><?php echo $parent['nationality'] ?></dd>
        <dt style="width:55px;"><strong>เชื้อชาติ</strong></dt>
        <dd style="width:35px;"><?php echo $parent['race'] ?></dd>
        <dt style="width:50px;"><strong>ศาสนา</strong></dt>
        <dd style="width:35px;"><?php echo $parent['religion'] ?></dd>
        <dt style="width:125px;"><strong>รายได้ต่อเดือน (บาท)</strong></dt>
        <dd style="width:85px;"><?php echo $parent['income'] ?></dd>
      </dl>

      <dl>
        <dt style="width:140px;"><strong>เลขประจำตัวประชาชน</strong></dt>
        <dd style="width:300px;font-size:120%;">
          <strong><?php echo citizenWithSpace($parent['citizen'], "-") ?></strong>
        </dd>
        <dt style="width:90px;"><strong>เบอร์โทรติดต่อ</strong></dt>
        <dd style="width:146px;"><?php echo $parent['phone'] ?></dd>
      </dl>

      <dl>
        <dt style="width:220px;"><strong>หนังสือเดินทางเลขที่ (Passport No.)</strong></dt>
        <dd style="width:360px;">&nbsp;</dd>
        <dt style="width:110px;"><strong>(เฉพาะต่างด้าว)*</strong></dt>
      </dl>
      <p style="text-indent: 50px;margin-top:4px;">ขอรับรองว่าข้อมูลข้างต้นนี้ ถูกต้อง ครบถ้วนเป็นความจริงทุกประการ และข้าพเจ้าขอรับรองว่าจะกำกับดูแล ติดตาม ความประพฤติของนักเรียนให้อยู่ในระเบียบวินัยของโรงเรียนทุกประการ</p>

      <br />

      <div style="width:52%;display:block;float:left;margin-left:50px;">
        <dl>
          <dt style="width:35px;">ลงชื่อ</dt>
          <dd style="width:150px;">&nbsp;</dd>
          <dt style="width:170px;">ผู้ปกครอง</dt>
        </dl>
        <dl style="margin-left:25px;">
          <dt style="width:5px">(</dt>
          <dd style="width:130px;">&nbsp;</dd>
          <dt style="width:30;">)</dt>
        </dl>
        <dl>
          <dt style="width:30px;">วันที่</dt>
          <dd style="width:30px;">&nbsp;</dd>
          <dt style="width:30px;">เดือน</dt>
          <dd style="width:70px;">&nbsp;</dd>
          <dt style="width:30px;">พ.ศ.</dt>
          <dd style="width:50px;">&nbsp;</dd>
        </dl>
      </div>

      <div style="width:39%;display:block;float:right;margin-right:10px;">
        <dl>
          <dt style="width:35px;">ลงชื่อ</dt>
          <dd style="width:150px;">&nbsp;</dd>
          <dt style="width:70px;">(นักเรียน)</dt>
        </dl>
        <dl style="margin-left:20px;">
          <dt style="width:5px">(</dt>
          <dd style="width:150px;">&nbsp;</dd>
          <dt style="width:30px;">)</dt>
        </dl>
        <dl>
          <dt style="width:30px;">วันที่</dt>
          <dd style="width:30px;">&nbsp;</dd>
          <dt style="width:30px;">เดือน</dt>
          <dd style="width:70px;">&nbsp;</dd>
          <dt style="width:30px;">พ.ศ.</dt>
          <dd style="width:50px;">&nbsp;</dd>
        </dl>
      </div>

      <div class="right" style="font-size:80%;"><strong>หน้า 2/2</strong></div>
    </section>


  </div>
</div>

<div id="transport_walk" class="overmask" style="font-size:150%;"><strong></strong></div>
<div id="transport_nofee" class="overmask" style="font-size:150%;"><strong><?php echo !$profile['hasfee'] ? "/" : "" ?></strong></div>
<div id="transport_withfee" class="overmask" style="font-size:150%;"><strong><?php echo $profile['hasfee'] ? "/" : "" ?></strong></div>
<div id="family_status_marriage_certificate" class="overmask" style="font-size:150%;"><?php echo $profile['familyStatusNo'] === 0 ? "/" : "" ?></strong></div>
<div id="family_status_marriage" class="overmask" style="font-size:150%;"><strong><?php echo $profile['familyStatusNo'] === 1 ? "/" : "" ?></strong></div>
<div id="family_status_single" class="overmask" style="font-size:150%;"><strong></strong></div>
<div id="family_status_separate" class="overmask" style="font-size:150%;"><strong><?php echo $profile['familyStatusNo'] === 2 ? "/" : "" ?></strong></div>
<div id="family_status_father_passed_away" class="overmask" style="font-size:150%;"><strong><?php echo $profile['familyStatusNo'] === 4 ? "/" : "" ?></strong></div>
<div id="family_status_mother_passed_away" class="overmask" style="font-size:150%;"><strong><?php echo $profile['familyStatusNo'] === 5 ? "/" : "" ?></strong></div>
<div id="family_status_remarry" class="overmask" style="font-size:150%;"><strong></strong></div>
<div id="family_status_divorce" class="overmask" style="font-size:150%;"><strong><?php echo $profile['familyStatusNo'] === 3 ? "/" : "" ?></strong></div>
<?php

$travelDuration = $profile['travelDuration'];
$dateComponentsTralvel = explode(' ', $travelDuration);
$travel = $dateComponentsTralvel[0];
$minute = $dateComponentsTralvel[1];

$dob = $profile['dob'];
$dateComponents = explode(' ', $dob);
$day = $dateComponents[0];
$month = $dateComponents[1];
$year = $dateComponents[2];
?>

<div style="margin-left:40px;margin-right:0px;padding-top:10px;">
  <div class="col-1" style="width:3cm;height:4cm;float:right;">
    <table class="table table-bordered table-sm table-collapse">
      <tr>
        <td style="width:3cm;height:4cm;text-align:center;border: 1px solid;font-size:14pt;">
          <p>ติดรูปถ่ายนักเรียน<br />ขนาด 1.5 นิ้ว</p>
        </td>
      </tr>
    </table>
  </div>

  <div class="col-1" style="border-width: 12px;margin-left:105px;width:60%;float:left;font-size:16pt;margin-top:-13px">
    <table class="table table-bordered table-sm table-collapse">
      <tr>
        <td style="text-align:center;border: 3px solid;font-size:14pt;padding:10px"><strong><u>สำหรับครูผู้รับมอบตัว</u></strong><br />
          <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;เข้าใหม่ ม.1&nbsp;
          <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;เข้าใหม่ ม.4&nbsp;
          <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;ชั้นเคลื่อน&nbsp;
          <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;รับย้าย&nbsp;
          <p>เลขประจำตัว .................................. ชั้น ม. ....../...... เลขที่ ............</p>
          <p>ลายมือชื่อ .................................................................. ครูผู้รับมอบตัว</p>
        </td>
      </tr>
    </table>
    <h3 style="text-align:center;font-size:20pt">เอกสารมอบตัวนักเรียน ปีการศึกษา&nbsp;<?php echo $title['year'] ?></h3>
  </div>
</div>

<div class="row" style="margin-top:-25px;margin-left:15px;margin-right:0px;padding-top:10px;line-height:15px;font-size:16pt;">
  <strong>1.ข้อมูลส่วนตัว</strong>
  <dl>
    <dt style="width:120px;">ชื่อ-นามสกุลนักเรียน</dt>
    <dd style="width:509px;"><?php echo $profile['title'] . $profile['firstname'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $profile['lastname'] ?></dd>
    <br />
    <dt style="width:140px;">เลขประจำตัวประชาชน</dt>
    <dd style="width:489px;">
      <strong><?php echo citizenWithSpaceGlobal($model['registrant']['source_id'], "-") ?></strong>
    </dd>
    <br />
    <dt style="width:200px;">เข้าศึกษาในระดับชั้นมัธยมศึกษาปีที่</dt>
    <dd style="width:67px;"><?php echo $title['grade'] . '&nbsp;/&nbsp;&nbsp;' ?></dd>
    <dt style="width:70px;">ปีการศึกษา</dt>
    <dd style="width:60px;"><?php echo $title['year'] ?></dd>
    <dt style="width:130px;">เลขประจำตัวนักเรียน</dt>
    <dd style="width:84px;"><?php echo $profile['regis_id'] ?></dd>
  </dl>
  <div style="line-height:25px">
    <div class="col-1" style="float:left;width:22%">
      แผนการเรียน
      <p style="font-size:12pt">(สำหรับนักเรียนชั้น ม.4)</p>
    </div>
    <div class="col-1" style="float:left;width:28%">
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;วิศวกรรมศาสตร์หุ่นยนต์
      <br />
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;คณิตศาสตร์-ภาษาอังกฤษ
      <br />
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;อังกฤษ-ไทย-สังคม
    </div>
    <div class="col-1" style="float:left;width:28%">
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;วิทยาศาสตร์-คณิตศาสตร์
      <br />
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;ภาษาจีนเพื่อธุรกิจฯ
      <br />
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;ห้องเรียนพิเศษภาษาจีน
    </div>
    <div class="col-1" style="float:left;width:20%">
      <br />
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;ทวิศึกษา
    </div>
    <div id="edu_program" class="overmask" style="font-size:150%;padding-top:-56px;padding-left:520px"><strong><?php echo $profile['edu_program'] === 'ทวิศึกษา ชั้นมัธยมศึกษาปีที่ 1' ? "/" : "" ?></strong></div>
    <div id="edu_program" class="overmask" style="font-size:150%;padding-top:-30px;padding-left:335px"><strong><?php echo $profile['edu_program'] === 'ห้องเรียนพิเศษภาษาจีน ชั้นมัธยมศึกษาปีที่ 1' ? "/" : "" ?></strong></div>
    <div id="edu_program" class="overmask" style="font-size:150%;padding-top:-56px;padding-left:335px"><strong><?php echo $profile['edu_program'] === 'ภาษาจีนเพื่อธุรกิจฯ ชั้นมัธยมศึกษาปีที่ 1' ? "/" : "" ?></strong></div>
    <div id="edu_program" class="overmask" style="font-size:150%;padding-top:-80px;padding-left:335px"><strong><?php echo $profile['edu_program'] === 'วิทยาศาสตร์-คณิตศาสตร์ ชั้นมัธยมศึกษาปีที่ 1' ? "/" : "" ?></strong></div>
    <div id="edu_program" class="overmask" style="font-size:150%;padding-top:-80px;padding-left:150px"><strong><?php echo $profile['edu_program'] === 'วิศวกรรมศาสตร์หุ่นยนต์ ชั้นมัธยมศึกษาปีที่ 1' ? "/" : "" ?></strong></div>
    <div id="edu_program" class="overmask" style="font-size:150%;padding-top:-56px;padding-left:150px"><strong><?php echo $profile['edu_program'] === 'คณิตศาสตร์-ภาษาอังกฤษ ชั้นมัธยมศึกษาปีที่ 1' ? "/" : "" ?></strong></div>
    <div id="edu_program" class="overmask" style="font-size:150%;padding-top:-30px;padding-left:150px"><strong><?php echo $profile['edu_program'] === 'อังกฤษ-ไทย-สังคม ชั้นมัธยมศึกษาปีที่ 1' ? "/" : "" ?></strong></div>
  </div>
  <dl>
    <dt style="width:53px;">เกิดวันที่</dt>
    <dd style="width:43px;"><?php echo $day ?></dd>
    <dt style="width:35px;">เดือน</dt>
    <dd style="width:120px;"><?php echo $month ?></dd>
    <dt style="width:35px;">พ.ศ.</dt>
    <dd style="width:55px;"><?php echo $year ?></dd>
    <dt style="width:30px;">อายุ</dt>
    <dd style="width:40px;"><?php echo $profile['ageYear'] ?></dd>
    <dt style="width:26px;">ปี</dt>
    <dt style="width:45px;">น้ำหนัก</dt>
    <dd style="width:40px;"><?php echo $profile['weight'] ?></dd>
    <dt style="width:50px;">กิโลกรัม</dt>
    <br />
    <dt style="width:50px;">ส่วนสูง</dt>
    <dd style="width:43px;"><?php echo $profile['height'] ?></dd>
    <dt style="width:58px;">เซนติเมตร</dt>
    <dt style="width:155px;">สถานที่เกิดที่ระบุในสูติบัตร</dt>
    <dd style="width:145px;"><?php echo $profile['born'] ?></dd>
    <dt style="width:150px;">จังหวัด ..............................</dt>
    <br />
    <dt style="width:46px;">เชื้อชาติ</dt>
    <dd style="width:100px;"><?php echo $profile['race'] ?></dd>
    <dt style="width:46px;">สัญชาติ</dt>
    <dd style="width:100px;"><?php echo $profile['nationality'] ?></dd>
    <dt style="width:47px;">ศาสนา</dt>
    <dd style="width:100px;"><?php echo $profile['religion'] ?></dd>
    <dt style="width:55px;">หมู่โลหิต</dt>
    <dd style="width:105px;"><?php echo $profile['blood'] ?></dd>
    <br />
    <dt style="width:150px;">เบอร์โทรศัพท์ของนักเรียน</dt>
    <dd style="width:180px;"><?php echo $profile['mobile_no'] ?></dd>
    <dt style="width:290px;">โรคประจำตัว .............................................................</dt>
    <br />
    <dt style="width:170px;">ความถนัด/ความสนใจพิเศษ</dt>
    <dd style="width:460px;"><?php echo $profile['talent'] ?></dd>
  </dl>
  <div style="line-height:25px">
    <div class="col-1" style="float:left;width:35%">
      ความขาดแคลน/ความต้องการอื่นๆ
      <p style="font-size:13pt">(สามารถเลือกได้มากกว่า 1 รายการ)</p>
    </div>
    <div class="col-1" style="float:left;width:23%">
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;เครื่องแบบนักเรียน
      <br />
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;อาหารกลางวัน
    </div>
    <div class="col-1" style="float:left;width:15%">
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;เครื่องเขียน
      <br />
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;แบบเรียน
    </div>
    <div class="col-1" style="float:left;width:27%">
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;ทุนการศึกษา
      <br />
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;อื่นๆ ..........................
    </div>
  </div>
  <strong>2.ข้อมูลการศึกษาเดิม</strong>
  <dl>
    <dt style="width:300px;">วุฒิการศึกษาเดิม ..........................................................</dt>
    <dt style="width:90px;">สถานศึกษาเดิม</dt>
    <dd style="width:230px;"><?php echo $old_school['name'] ?></dd>
    <br />
    <dt style="width:70px;">ตำบล/แขวง</dt>
    <dd style="width:142px;"><?php echo $old_school['sub_district'] ?></dd>
    <dt style="width:70px;">อำเภอ/เขต</dt>
    <dd style="width:142px;"><?php echo $old_school['district'] ?></dd>
    <dt style="width:45px;">จังหวัด</dt>
    <dd style="width:141px;"><?php echo $old_school['province'] ?></dd>
  </dl>

  <strong>3.ข้อมูลที่อยู่</strong>
  <dl>
    <dt style="width:125px;"><u>ที่อยู่ตามทะเบียนบ้าน</u></dt>
    <dt style="width:60px;">บ้านเลขที่</dt>
    <dd style="width:333px;"><?php echo $address['no'] ?></dd>
    <dt style="width:30px;">หมู่ที่</dt>
    <dd style="width:60px;"><?php echo $address['moo'] ?></dd>
    <br />
    <dt style="width:100px;">ถนน/ตรอก/ซอย</dt>
    <dd style="width:300px;"><?php echo $address['street'] . '&nbsp;' . $address['soi'] ?></dd>
    <dt style="width:75px;">ตำบล/แขวง</dt>
    <dd style="width:142px;"><?php echo $address['sub_district'] ?></dd>
    <br />
    <dt style="width:75px;">อำเภอ/เขต</dt>
    <dd style="width:138px;"><?php echo $address['district'] ?></dd>
    <dt style="width:45px;">จังหวัด</dt>
    <dd style="width:139px;"><?php echo $address['province'] ?></dd>
  </dl>
  <div style="line-height:25px">
    <div class="col-1" style="float:left;width:22%">
      <u>ที่อยู่ปัจจุบันที่ติดต่อได้</u>
    </div>
    <div class="col-1" style="float:left;width:25%">
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;บ้านส่วนตัว
      <br />
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;พักอาศัยกับนายจ้าง
    </div>
    <div class="col-1" style="float:left;width:20%">
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;บ้านเช่า
      <br />
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;ห้องเช่า
    </div>
    <div class="col-1" style="float:left;width:32%">
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;พักอาศัยกับญาติ
      <br />
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;อื่นๆ ......................................
    </div>
  </div>
  <dl>
    <dt style="width:55px;">บ้านเลขที่</dt>
    <dd style="width:320px;"><?php echo $address['no'] ?></dd>
    <dt style="width:35px;">หมู่ที่</dt>
    <dd style="width:50px;"><?php echo $address['moo'] ?></dd>
    <dt style="width:35px;">ซอย</dt>
    <dd style="width:114px;"><?php echo $address['soi'] ?></dd>
    <br />
    <dt style="width:35px;">ถนน</dt>
    <dd style="width:149px;"><?php echo $address['street'] ?></dd>
    <dt style="width:75px;">ตำบล/แขวง</dt>
    <dd style="width:138px;"><?php echo $address['sub_district'] ?></dd>
    <dt style="width:75px;">อำเภอ/เขต</dt>
    <dd style="width:139px;"><?php echo $address['district'] ?></dd>
    <br />
    <dt style="width:45px;">จังหวัด</dt>
    <dd style="width:139px;"><?php echo $address['province'] ?></dd>
    <dt style="width:80px;">รหัสไปรษณีย์</dt>
    <dd style="width:56px;"><?php echo $address['zip'] ?></dd>
  </dl>
  <dl>
    <dt style="width:205px;">ที่พักอาศัยห่างจากโรงเรียนประมาณ</dt>
    <dd style="width:42px;"><?php echo $profile['distance'] ?></dd>
    <dt style="width:50px;">กิโลเมตร</dt>
    <dt style="width:90px;">ใช้เวลาเดินทาง</dt>
    <dd style="width:42px;"><?php echo $travel ?></dd>
    <dt style="width:40px;">นาที</dt>
  </dl>
  <div style="line-height:25px">
    <div class="col-1" style="float:left;width:26%">
      เดินทางมาโรงเรียนโดย
      <p style="font-size:13pt">(สามารถเลือกได้มากกว่า 1 รายการ)</p>
    </div>
    <div class="col-1" style="float:left;width:22%">
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;เดินเท้า
      <br />
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;รถยนต์ส่วนตัว
      <br />
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;อื่นๆ ........................
    </div>
    <div class="col-1" style="float:left;width:25%">
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;รถจักรยานยนต์ส่วนตัว
      <br />
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;รถโดยสารสาธารณะ
    </div>
    <div class="col-1" style="float:left;width:25%">
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;รถจักรยานยนต์รับจ้าง
      <br />
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;&nbsp;รถไฟฟ้า BTS/MRT
    </div>
    <div id="transport" class="overmask" style="font-size:150%;padding-top:-55px;padding-left:326px"><strong><?php echo $profile['transport'] === 'รถประจำทาง' ? "/" : "" ?></strong></div>
    <div id="transport" class="overmask" style="font-size:150%;padding-top:-80px;padding-left:324px"><strong><?php echo $profile['transport'] === 'รถจักรยานยนต์ส่วนตัว' ? "/" : "" ?></strong></div>
    <div id="transport" class="overmask" style="font-size:150%;padding-top:-80px;padding-left:490px"><strong><?php echo $profile['transport'] === 'รถจักรยานยนต์รับจ้าง' ? "/" : "" ?></strong></div>
    <div id="transport" class="overmask" style="font-size:150%;padding-top:-55px;padding-left:490px"><strong><?php echo $profile['transport'] === 'รถไฟฟ้า BTS/MRT' ? "/" : "" ?></strong></div>
    <div id="transport" class="overmask" style="font-size:150%;padding-top:-80px;padding-left:180px"><strong><?php echo $profile['transport'] === 'เดินเท้า' ? "/" : "" ?></strong></div>
    <div id="transport" class="overmask" style="font-size:150%;padding-top:-55px;padding-left:180px"><strong><?php echo $profile['transport'] === 'รถยนต์ส่วนตัว' ? "/" : "" ?></strong></div>
    <div id="transport" class="overmask" style="font-size:150%;padding-top:-32px;padding-left:180px"><strong><?php echo $profile['transport'] === 'อื่นๆ' ? "/" : "" ?></strong></div>
  </div>

  <pagebreak />

  <div class="row" style="margin-left:0px;margin-right:0px;line-height:15px;font-size:16pt;margin-top:40px">
    <strong>4.ข้อมูลครอบครัว</strong>
    <dl>
      <dt style="width:100px;">ชื่อ-นามสกุลบิดา</dt>
      <dd style="width:530px;"><?php echo $dad['title'] . $dad['f_name'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $dad['l_name'] ?></dd>
      <br />
      <dt style="width:160px;">เลขประจำตัวประชาชนบิดา</dt>
      <dd style="width:467px;">
        <strong><?php echo citizenWithSpaceGlobal($dad['citizen'], "-") ?></strong>
      </dd>
      <br />
      <dt style="width:130px;">สถานภาพของบิดา</dt>
      <dd class="noborder" style="width:190px;padding-top:3px;">
        <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;มีชีวิตอยู่&nbsp;&nbsp;
        <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;ถึงแก่กรรม&nbsp;
      </dd>
      <dt style="width:130px;">เบอร์โทรศัพท์ของบิดา</dt>
      <dd style="width:168px;"><?php echo $dad['phone'] ?></dd>
      <br />
      <dt style="width:85px;">อาชีพของบิดา</dt>
      <dd style="width:220px;"><?php echo $dad['job'] ?></dd>
      <dt style="width:90px;">รายได้ประมาณ</dt>
      <dd style="width:150px;"><?php echo $dad['income'] ?></dd>
      <dt style="width:65px;">บาท/เดือน</dt>
      <br />
      <dt style="width:110px;">ชื่อ-นามสกุลมารดา</dt>
      <dd style="width:520px;"><?php echo $mom['title'] . $mom['f_name'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $mom['l_name'] ?></dd>
      <br />
      <dt style="width:172px;">เลขประจำตัวประชาชนมารดา</dt>
      <dd style="width:457px;">
        <strong><?php echo citizenWithSpaceGlobal($mom['citizen'], "-") ?></strong>
      </dd>
      <br />
      <dt style="width:130px;">สถานภาพของมารดา</dt>
      <dd class="noborder" style="width:190px;padding-top:3px;">
        <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;มีชีวิตอยู่&nbsp;&nbsp;
        <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;ถึงแก่กรรม&nbsp;
      </dd>
      <dt style="width:140px;">เบอร์โทรศัพท์ของมารดา</dt>
      <dd style="width:160px;"><?php echo $mom['phone'] ?></dd>
      <br />
      <dt style="width:95px;">อาชีพของมารดา</dt>
      <dd style="width:220px;"><?php echo $mom['job'] ?></dd>
      <dt style="width:90px;">รายได้ประมาณ</dt>
      <dd style="width:140px;"><?php echo $mom['income'] ?></dd>
      <dt style="width:90px;">บาท/เดือน</dt>

    </dl>

    <div style="line-height:30px">
      <div class="col-1" style="float:left;width:28%">
        สถานภาพสมรสของบิดา-มารดา
      </div>
      <div class="col-1" style="float:left;width:22%">
        <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;อยู่ด้วยกัน
        <br />
        <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;บิดาถึงแก่กรรม
        <br />
      </div>
      <div class="col-1" style="float:left;width:22%">
        <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;แยกกันอยู่
        <br />
        <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;มารดาถึงแก่กรรม
      </div>
      <div class="col-1" style="float:left;width:25%">
        <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;หย่าร้าง
        <br />
        <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;บิดา-มารดาถึงแก่กรรม
        <br />
      </div>
      <br />
      <div style="margin-left:185px;margin-top:-30px">
        <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;บิดาถึงแก่กรรม มารดาแต่งงานใหม่
        <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;มารดาถึงแก่กรรม บิดาแต่งงานใหม่
      </div>
    </div>
    <dl>
      <dt style="width:80px;">จำนวนพี่น้อง</dt>
      <dd class="noborder" style="width:70px;">
        <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;พี่ชาย
      </dd>
      <dd style="width:80px;"><?php echo $profile['elderBrother'] ?></dd>
      <dt style="width:100px;">คน</dt>
      <dd class="noborder" style="width:80px;">
        <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;น้องชาย
      </dd>
      <dd style="width:80px;"><?php echo $profile['youngerBrother'] ?></dd>
      <dt style="width:40px;">คน</dt>
      <dt style="width:80px;"></dt>
      <dt style="width:80px;"></dt>
      <dd class="noborder" style="width:70px;">
        <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;พี่สาว
      </dd>
      <dd style="width:80px;"><?php echo $profile['elderSister'] ?></dd>
      <dt style="width:100px;">คน</dt>
      <dd class="noborder" style="width:80px;">
        <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;น้องสาว
      <dd style="width:80px;"><?php echo $profile['youngerSister'] ?></dd>
      <dt style="width:40px;">คน</dt>
      <dt style="width:80px;"></dt>
      <dt style="width:80px;"></dt>
      <dt style="width:105px;">รวมพี่น้องทั้งหมด</dt>
      <dd style="width:50px;"><?php echo $profile['siblings'] ?></dd>
      <dt style="width:115px;">คน (ไม่รวมนักเรียน)</dt>
      <dt style="width:170px;">จำนวนพี่น้องที่กำลังศึกษาอยู่</dt>
      <dd style="width:50px;"><?php echo $profile['childInSchool'] ?></dd>
      <dt style="width:30px;">คน</dt>
      <dt style="width:130px;">ชื่อ-นามสกุลผู้ปกครอง</dt>
      <dd style="width:500px;"><?php echo $parent['title'] . $parent['firstname'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $parent['lastname'] ?></dd>
      <br />
      <dt style="width:190px;">เลขประจำตัวประชาชนผู้ปกครอง</dt>
      <dd style="width:440px;">
        <strong><?php echo citizenWithSpaceGlobal($parent['citizen'], "-") ?></strong>
      </dd>
      <br />
      <dt style="width:140px;">เกี่ยวข้องกับนักเรียนเป็น</dt>
      <dd style="width:155px;"><?php echo $parent['relative'] ?></dd>
      <dt style="width:170px;">เบอร์โทรศัพท์ของผู้ปกครอง</dt>
      <dd style="width:155px;"><?php echo $parent['phone'] ?></dd>
      <br />
      <dt style="width:120px;">อาชีพของผู้ปกครอง</dt>
      <dd style="width:220px;"><?php echo $parent['job'] ?></dd>
      <dt style="width:90px;">รายได้ประมาณ</dt>
      <dd style="width:118px;"><?php echo $parent['income'] ?></dd>
      <dt style="width:90px;">บาท/เดือน</dt>
    </dl>
    <br />
    <div style="margin-left:100px;margin-right:100px;line-height:5px;margin-top:10px;font-size:14pt">
      <p style="text-align:center;line-height:5px"><strong><u>สำหรับครูผู้รับมอบตัว</u> (นักเรียนใหม่)</strong>
      <p>
      <p style="text-align:left;line-height:5px"><strong>เอกสารประกอบการรับมอบตัว</strong>
      <p>
      <div style="margin-left:50px;padding-top:-10px;line-height:20px">
        <span style="font-family: fontawesome; font-size:75%;">&#xf111;</span>&nbsp;เอกสารมอบตัวนักเรียนที่กรอกข้อมูลครบถ้วน&nbsp;
        <br />
        <span style="font-family: fontawesome; font-size:75%;">&#xf111;</span>&nbsp;รูปถ่ายนักเรียน ขนาด 1.5 นิ้ว จำนวน 1 รูป (ติดในเอกสารมอบตัวให้เรียบร้อย)&nbsp;
        <br />
        <span style="font-family: fontawesome; font-size:75%;">&#xf111;</span>&nbsp;ตัวจริง พร้อมสำเนาบัตรประจำตัวประชาชนของนักเรียนที่รับรองสำเนาถูกต้อง&nbsp;
        <br />
        <span style="font-family: fontawesome; font-size:75%;">&#xf111;</span>&nbsp;สำเนาสูติบัตรของนักเรียนที่รับรองสำเนาถูกต้อง&nbsp;
        <br />
        <span style="font-family: fontawesome; font-size:75%;">&#xf111;</span>&nbsp;ตัวจริง พร้อมสำเนาระเบียนแสดงผลการเรียน (ปพ.1) ที่รับรองสำเนาถูกต้อง&nbsp;
        <br />
        <span style="font-family: fontawesome; font-size:75%;">&#xf111;</span>&nbsp;ตัวจริง พร้อมสำเนาทะเบียนบ้านของนักเรียนที่รับรองสำเนาถูกต้อง&nbsp;
        <br />
        <span style="font-family: fontawesome; font-size:75%;">&#xf111;</span>&nbsp;ตัวจริง พร้อมสำเนาทะเบียนบ้านของบิดาที่รับรองสำเนาถูกต้อง&nbsp;
        <br />
        <span style="font-family: fontawesome; font-size:75%;">&#xf111;</span>&nbsp;ตัวจริง พร้อมสำเนาทะเบียนบ้านของมารดาที่รับรองสำเนาถูกต้อง&nbsp;
        <br />
        <span style="font-family: fontawesome; font-size:75%;">&#xf111;</span>&nbsp;อื่นๆ ......................................................................&nbsp;
        <br />
        <p style="margin-left:20px;text-align:left;">(เช่น เอกสารการเปลี่ยนชื่อ-สกุล เป็นต้น)
        <p>
        <div style="margin-left:-35px;text-align:center;">
          <p style="line-height:10px">ลายมือชื่อ ......................................................... ครูผู้รับมอบตัว
          <p>
          <p style="line-height:10px">วันที่ ......... เดือน ......................... พ.ศ. ................
          <p>
        </div>
      </div>
      <div id="siblings" class="overmask" style="font-size:150%;margin-top:-577px;padding-left:-5px"><strong><?php echo $profile['elderBrother'] >= 1 ? "/" : "" ?></strong></div>
      <div id="siblings" class="overmask" style="font-size:150%;margin-top:-195px;padding-left:-5px"><strong><?php echo $profile['elderSister'] >= 1 ? "/" : "" ?></strong></div>
      <div id="siblings" class="overmask" style="font-size:150%;margin-top:-230px;padding-left:250px"><strong><?php echo $profile['youngerBrother'] >= 1 ? "/" : "" ?></strong></div>
      <div id="siblings" class="overmask" style="font-size:150%;margin-top:-195px;padding-left:255px"><strong><?php echo $profile['youngerSister'] >= 1 ? "/" : "" ?></strong></div>

    </div>
  </div>
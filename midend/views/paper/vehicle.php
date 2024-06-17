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
  <div class="col-1" style="width:3cm;height:2.5cm;float:right;">
          <h3>เลขที่......./2567</h3>
  </div>
  <div class="col-1" style="border-width: 12px;margin-left:105px;width:60%;float:left;font-size:16pt;">
    <h3 style="text-align:center;font-size:20pt">แบบขอรับสติ๊กเกอร์ติดรถผ่านเข้า-ออก</h3>
    <h3 style="text-align:center;font-size:20pt">โรงเรียนหนองกี่พิทยาคม</h3>
  </div>
</div>

<div style="margin-left:0px;margin-right:0px;padding-top:0px;">
    <div class="col-1" style="width:250px;height:1cm;float:right;">
            <p style="font-size:16pt;">วันที่................เดือน...............พ.ศ................</p>
    </div>
</div>

<div class="row" style="margin-left:15px;margin-right:0px;padding-top:10px;line-height:15px;font-size:16pt;">

<dl>
    <dt style="width:60px;">ข้าพเจ้า </dt>
    <dd style="width:586px;"><?php echo $profile['title'] . $profile['firstname'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $profile['lastname'] ?></dd>
    <br />
</dl>

<dl>
    <dt style="width:65px;">บ้านเลขที่</dt>
    <dd style="width:65px;"><?php echo $address['no'] ?></dd>
    <dt style="width:30px;">หมู่ที่</dt>
    <dd style="width:65px;"><?php echo $address['moo'] ?></dd>
    <dt style="width:100px;">ถนน/ตรอก/ซอย</dt>
    <dd style="width:303px;"><?php echo $address['street'] . '&nbsp;' . $address['soi'] ?></dd>
    <br />
    <dt style="width:75px;">ตำบล/แขวง</dt>
    <dd style="width:144px;"><?php echo $address['sub_district'] ?></dd>
    <dt style="width:75px;">อำเภอ/เขต</dt>
    <dd style="width:144px;"><?php echo $address['district'] ?></dd>
    <dt style="width:45px;">จังหวัด</dt>
    <dd style="width:144px;"><?php echo $address['province'] ?></dd>
    <br/>
    <dt style="width:115px;">หมายเลขโทรศัพท์</dt>
    <dd style="width:530px;"><?php echo $profile['mobile_no'] ?></dd>
    <br/>
    <dt style="width:75px;">ประเภท</dt>
    <div class="col-1" style="margin-top:12px;">
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;นักเรียน
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;ครูและบุคลากรทางการศึกษา
      <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;ผู้ประกอบการร้านค้า
    </div>
    <br/>
    <dt>
        <strong>มีความประสงค์ จะขอรับสติ๊กเกอร์ติดรถประเภท</strong>
        <div class="col-1" style="margin-top:12px;">
          <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;รถยนต์
        </div>
        <dt style="width:35px;">ยี่ห้อ</dt>
        <dd style="width:178px;"><?php echo $address['sub_district'] ?></dd>
        <dt style="width:30px;">รุ่น</dt>
        <dd style="width:180px;"><?php echo $address['district'] ?></dd>
        <dt style="width:28px;">สี</dt>
        <dd style="width:173px;"><?php echo $address['province'] ?></dd>
        <dt style="width:115px;">หมายเลขทะเบียน</dt>
        <dd style="width:235px;"><?php echo $address['district'] ?></dd>
        <dt style="width:50px;">จังหวัด</dt>
        <dd style="width:235px;"><?php echo $address['province'] ?></dd>
    </dt>
    <dt>
        <div class="col-1" style="margin-top:12px;">
          <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;รถจักรยานยนต์
        </div>
        <dt style="width:35px;">ยี่ห้อ</dt>
        <dd style="width:175px;"><?php echo $address['sub_district'] ?></dd>
        <dt style="width:30px;">รุ่น</dt>
        <dd style="width:175px;"><?php echo $address['district'] ?></dd>
        <dt style="width:28px;">สี</dt>
        <dd style="width:175px;"><?php echo $address['province'] ?></dd>
        <dt style="width:115px;">หมายเลขทะเบียน</dt>
        <dd style="width:235px;"><?php echo $address['district'] ?></dd>
        <dt style="width:50px;">จังหวัด</dt>
        <dd style="width:235px;"><?php echo $address['province'] ?></dd>
    </dt>
    
    <dt>
    <strong>หลักฐานสำหรับการยื่นคำขอ</strong>
        <ul>
            <li>
                <span>แนบภาพถ่ายด้านข้างตัวรถให้เห็นโครงสร้างตัวรถชัดเจน</span>
            </li>
            <li>
                <span>แนบภาพถ่ายทะเบียนรถจากด้านท้ายตัวรถ</span>
            </li>
        </ul>
        <dt>*&nbsp;หมายเหตุ&nbsp;ข้าพเจ้าจะปฏิบัติตาม&nbsp;พรบ.&nbsp;จราจรทางบกและตามคำแนะนำของพนักงานเจ้าหน้าที่อย่างเคร่งครัด&nbsp;หากฝ่าฝืนหรือกระทำการผิดร้ายแรง&nbsp;ยินยอมให้เพิกถอนและชดใช้ค่าเสียหายให้กับทางราชการโดยทันที</dt>
    </dt>
    <br>
    <br>

    <div>
        <div style="float:left;text-align:center;width:50%">
            <div style="item-align:center;width:100%;height:180px;border:solid 2px black;"></div>
            <br>
            <span>ภาพถ่ายข้างตัวรถ</span>
        </div>
        <div style="float:left;text-align:center;width:50%;padding-top:5px;">
        <p>ขอรับรองว่าข้อความข้างต้นเป็นจริง</p>
        <p style="margin-top:40px">ลงชื่อ .....................................................</p>
        <p  style="margin-left:0px;padding-top:10px;padding-bottom:-5px;">( ................................................. )</p>
        <p style="margin-left:0px">ผู้ขอ</p>
        </div>
    </div>

    <p style="font-size:14pt;float:right;margin-left:620px;padding-top:10px;">หน้า 1/2</p>
    <pagebreak/>

    <div style="margin-top:50px;">
        <div style="float:left;text-align:center;width:50%">
            <div style="item-align:center;width:100%;height:180px;border:solid 2px black;"></div>
            <br>
            <span>ภาพถ่ายทะเบียนรถ</span>
        </div>
        <div style="float:left;text-align:center;width:50%;padding-top:5px;">
            <div class="col-1" style="margin-top:12px;">
            <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;อนุญาต
            <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;ไม่อนุญาต
            </div>
        
        <p style="margin-top:40px">เนื่องจาก .......................................................</p>
        <p style="margin-top:40px">ลงชื่อ .........................................................</p>
        <p style="margin-top:20px">ตำแหน่ง .....................................................</p>
        <p style="margin-left:0px">ผู้อนุญาต</p>
        </div>
    </div>

</dl>
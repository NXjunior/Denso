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

$imageSource1 = $image['img'];
if (!empty($img)) {
    $img = '<img src="' . $imageSource1 . '" alt="School icon" style="width:337.5px;height: 176px;margin-top:0px;
    object-fit: cover;">';
} else {
    $img = "";
}
$imageSource2 = $image['plate_img'];
if (!empty($imageSource1)) {
    $plate_img = '<img src="' . $imageSource1 . '" alt="School icon" style="width:337.5px;height: 176px;margin-top:0px">';
} else {
    $plate_img = "";
}
?>

<div style="font-size:19;">
    <div style="margin-left:40px;margin-right:0px;padding-top:10px;">
        <div class="col-1" style="width:3cm;height:1.5cm;float:right;">
            <h3>เลขที่......./2567</h3>
        </div>
        <div class="col-1" style="border-width: 12px;margin-left:105px;width:60%;float:left;font-size:16pt;">
            <h3 style="text-align:center;font-size:20pt">แบบขอรับสติ๊กเกอร์ติดรถผ่านเข้า-ออก</h3>
            <h3 style="text-align:center;font-size:20pt">โรงเรียนหนองกี่พิทยาคม</h3>
        </div>
    </div>
    <div style="margin-left:0px;margin-right:0px;padding-top:8px;">
        <div class="col-1" style="width:250px;height:0.1cm;float:right;">
            <dl>
                <dt style="width:30px;">วันที่</dt>
                <dd style="width:30px;"><?php echo $profile['day'] ?></dd>
                <dt style="width:30px;">เดือน</dt>
                <dd style="width:60px;"><?php echo $profile['month'] ?></dd>
                <dt style="width:30px;">พ.ศ.</dt>
                <dd style="width:40px;"><?php echo $profile['year'] ?></dd>
            </dl>
        </div>
    </div>

    <br>
    <dl>
        <dt style="width:54px;">ข้าพเจ้า</dt>
        <dd style="width:606px;"><?php //echo $profile['title'] . $profile['firstname'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $profile['lastname'] 
                                    echo $profile['fullname']; ?></dd>
    </dl>

    <dl>
        <dt style="width:65px;">บ้านเลขที่</dt>
        <dd style="width:48px;"><?php echo $address['no'] ?></dd>
        <dt style="width:30px;">หมู่ที่</dt>
        <dd style="width:48px;"><?php echo $address['moo'] ?></dd>
        <dt style="width:100px;">ถนน/ตรอก/ซอย</dt>
        <dd style="width:145px;"><?php echo $address['street'] . '&nbsp;' . $address['soi'] ?></dd>
        <dt style="width:75px;">ตำบล/แขวง</dt>
        <dd style="width:118px;"><?php echo $address['sub_district'] ?></dd>
        <dt style="width:70px;">อำเภอ/เขต</dt>
        <dd style="width:150px;"><?php echo $address['district'] ?></dd>
        <dt style="width:45px;">จังหวัด</dt>
        <dd style="width:155px;"><?php echo $address['province'] ?></dd>
        <dt style="width:105px;">หมายเลขโทรศัพท์</dt>
        <dd style="width:113px;"><?php echo $profile['mobile_no'] ?></dd>

        <dt style="width:75px;">ประเภท</dt>
        <div class="col-1" style="margin-top:12px;">
            <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;นักเรียน
            <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;ครูและบุคลากรทางการศึกษา
            <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;ผู้ประกอบการร้านค้า
        </div>

        <?php if ($profile['role'] == 10) { ?>
            <div id="type" class="overmask" style="font-size:150%;padding-top:-19px;padding-left:90px"><strong>/</strong></div>
        <?php } ?>
        <?php if ($profile['role'] == 20) { ?>
            <div id="type" class="overmask" style="font-size:150%;padding-top:-19px;padding-left:154px"><strong>/</strong></div>
        <?php } ?>
        <?php if ($profile['role'] == 30) { ?>
            <div id="type" class="overmask" style="font-size:150%;padding-top:-19px;padding-left:323px"><strong>/</strong></div>
        <?php } ?>
        <br />
        <dt>
            <strong>มีความประสงค์ จะขอรับสติ๊กเกอร์ติดรถประเภท</strong>
            <div class="col-1" style="margin-top:0px;">
                <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;รถยนต์
            </div>
            <?php if ($car['type'] == 20) { ?>
                <div id="vehicle_type" class="overmask" style="font-size:150%;padding-top:-38px;padding-left:5px;"><strong>/</strong></div>
            <?php } ?>
        <dt style="width:35px;">ยี่ห้อ</dt>
        <dd style="width:190px;"><?php echo $car['brand'] ?? "-" ?></dd>
        <dt style="width:30px;">รุ่น</dt>
        <dd style="width:190px;"><?php echo $car['model'] ?? "-" ?></dd>
        <dt style="width:25px;">สี</dt>
        <dd style="width:168px;"><?php echo $car['color'] ?? "-" ?></dd>
        <dt style="width:115px;">หมายเลขทะเบียน</dt>
        <dd style="width:242px;"><?php echo $car['plate'] ?? "-" ?></dd>
        <dt style="width:50px;">จังหวัด</dt>
        <dd style="width:242px;"><?php echo $car['province'] ?? "-" ?></dd>
        </dt>
        <dt>
            <div class="col-1" style="margin-top:0px;">
                <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;รถจักรยานยนต์
            </div>
            <?php if ($bike['type'] == 10) { ?>
                <div id="vehicle_type" class="overmask" style="font-size:150%;padding-top:-38px;padding-left:5px;"><strong>/</strong></div>
            <?php } ?>
        <dt style="width:35px;">ยี่ห้อ</dt>
        <dd style="width:190px;"><?php echo $bike['brand'] ?? "-" ?></dd>
        <dt style="width:30px;">รุ่น</dt>
        <dd style="width:190px;"><?php echo $bike['model'] ?? "-" ?></dd>
        <dt style="width:25px;">สี</dt>
        <dd style="width:168px;"><?php echo $bike['color'] ?? "-" ?></dd>
        <dt style="width:115px;">หมายเลขทะเบียน</dt>
        <dd style="width:242px;"><?php echo $bike['plate'] ?? "-" ?></dd>
        <dt style="width:50px;">จังหวัด</dt>
        <dd style="width:242px;"><?php echo $bike['province'] ?? "-" ?></dd>
        </dt>

        <dt style="font-size:18px;">
            <strong>หลักฐานสำหรับการยื่นคำขอ</strong>
            <ul>
                <li>
                    <span>แนบภาพถ่ายด้านข้างตัวรถให้เห็นโครงสร้างตัวรถชัดเจน</span>
                </li>
                <li>
                    <span>แนบภาพถ่ายทะเบียนรถจากด้านท้ายตัวรถ</span>
                </li>
            </ul>
            *&nbsp;หมายเหตุ&nbsp;ข้าพเจ้าจะปฏิบัติตาม&nbsp;พรบ.&nbsp;จราจรทางบกและตามคำแนะนำของพนักงานเจ้าหน้าที่อย่างเคร่งครัด&nbsp;หากฝ่าฝืนหรือกระทำการผิด ร้ายแรง&nbsp;ยินยอมให้เพิกถอนและชดใช้ค่าเสียหายให้กับทางราชการโดยทันที
        </dt>
        <br>

        <div>
            <div style="float:left;text-align:center;width:50%">
                <div style="item-align:center;width:100%;height:180px;border:solid 2px black;">
                    <?php echo $img; ?>
                </div>
                <br>
                <span>ภาพถ่ายข้างตัวรถ</span>
            </div>
            <div style="float:left;text-align:center;width:50%;padding-top:5px;">
                <p>ขอรับรองว่าข้อความข้างต้นเป็นจริง</p>
                <br>
                <br>
                <div>
                    <p>ลงชื่อ .........................................................</p>
                    <dt style="width:30px;padding-left:50px;">(</dt>
                    <dd style="width:170px;"><?php echo $profile['fullname'] ?></dd>
                    <dt style="width:30px;padding-left:-15px;">)</dt>
                </div>

                <dt>ผู้ขอ</dt>

            </div>
        </div>
        <br>

        <div>
            <div style="float:left;text-align:center;width:50%">
                <div style="item-align:center;width:100%;height:180px;border:solid 2px black;">
                    <?php echo $plate_img; ?>
                </div>
                <br>
                <span>ภาพถ่ายทะเบียนรถ</span>
            </div>
            <div style="float:left;text-align:center;width:50%;padding-top:5px;">
                <div class="col-1" style="margin-top:12px;">
                    <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;อนุญาต
                    <span style="font-family: fontawesome; font-size:80%;">&#xf111;</span>&nbsp;ไม่อนุญาต
                    <?php if ($approver['approved'] == 20) { ?>
                        <div id="action" class="overmask" style="font-size:150%;padding-top:-19px;padding-right:115px"><strong>/</strong></div>
                    <?php } ?>
                    <?php if ($approver['approved'] == -1) { ?>
                        <div id="action" class="overmask" style="font-size:150%;padding-top:-19px;padding-right:-10px"><strong>/</strong></div>
                    <?php } ?>
                </div>

                <p style="margin-top:28px">เนื่องจาก .......................................................</p>
                <!-- <div>
                    <dt style="width:35px;padding-left:40px;">ลงชื่อ</dt>
                    <dd style="width:190px;"><?php echo $approver['name'] ?></dd>
                </div> -->
                <br>
                <p>ลงชื่อ ............................................................</p>
                <p style="margin-top:20px">ตำแหน่ง .....................................................</p>
                <p style="margin-left:0px">ผู้อนุญาต</p>
            </div>
        </div>

    </dl>
</div>
<pagebreak />
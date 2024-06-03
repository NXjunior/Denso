<?php
use yii\helpers\Html;

$string = $model['name'];
$parts = explode('.', $string);
$modelname1 = $parts[0]; // ม.
$modelname2 = $parts[1]; // 6/6

$imageSource1 = $VisitInfoFiles['path']['image1']; // รูปแผนที่การเดินทางจากบ้านถึงโรงเรียน
if (!empty($imageSource1)) {
    $image1 = '<img src="' . $imageSource1 . '" alt="School icon" style="width:auto;height: 100%;margin-top:0px">';
} else {
  $image1 = "";
}

$imageSource2 = $VisitInfoFiles['path']['image2'];
if (!empty($imageSource2)) {
    $image2 = '<img src="' . $imageSource2 . '" alt="School icon" style="width:auto;height: 100%;margin-top:0px">';
} else {
  $image2 = "";
}

$Datetime = $model['date'];
$timestamp = strtotime($Datetime);
$thaiYear = date('Y', $timestamp) + 543;
$formattedDatetime = Yii::$app->date->date('j F', $timestamp) . ' ' . $thaiYear;

$Hour = $model['time'];
$timestamp = strtotime($Hour);
$formattedHour = Yii::$app->date->date('H:i น.', $timestamp);
?>
<div id="home_condition" class="overmask" style="font-size:150%;padding-top:365px;padding-left:30px"><strong><?php echo $VisitInfoPersonal['home_condition'] === 'ดี' ? "/" : "" ?></strong></div>
<div id="home_condition" class="overmask" style="font-size:150%;padding-top:395px;padding-left:30px"><strong><?php echo $VisitInfoPersonal['home_condition'] === 'พอใช้' ? "/" : "" ?></strong></div>
<div id="home_condition" class="overmask" style="font-size:150%;padding-top:425px;padding-left:30px"><strong><?php echo $VisitInfoPersonal['home_condition'] === 'ชุมชน / น่าห่วงใย' ? "/" : "" ?></strong></div>
<div id="home_condition" class="overmask" style="font-size:150%;padding-top:455px;padding-left:30px"><strong><?php echo $VisitInfoPersonal['home_condition'] === 'อื่นๆ' ? "/" : "" ?></strong></div>
<div id="living_environment" class="overmask" style="font-size:150%;padding-top:520px;padding-left:30px"><strong><?php echo $missing['living_environment'] === 'ดี' ? "/" : "" ?></strong></div>
<div id="living_environment" class="overmask" style="font-size:150%;padding-top:550px;padding-left:30px"><strong><?php echo $missing['living_environment'] === 'พอใช้' ? "/" : "" ?></strong></div>
<div id="living_environment" class="overmask" style="font-size:150%;padding-top:580px;padding-left:30px"><strong><?php echo $missing['living_environment'] === 'อื่นๆ' ? "/" : "" ?></strong></div>
<div id="relationship_level" class="overmask" style="font-size:150%;padding-top:645px;padding-left:30px"><strong><?php echo $VisitInfoMisc['relationship_level'] === 'ใกล้ชิด / อบอุ่น / มีเหตุผล' ? "/" : "" ?></strong></div>
<div id="relationship_level" class="overmask" style="font-size:150%;padding-top:675px;padding-left:30px"><strong><?php echo $VisitInfoMisc['relationship_level'] === 'สนใจ / เอาใจใส่' ? "/" : "" ?></strong></div>
<div id="relationship_level" class="overmask" style="font-size:150%;padding-top:705px;padding-left:30px"><strong><?php echo $VisitInfoMisc['relationship_level'] === 'ห่างเหิน / ให้อิสระ' ? "/" : "" ?></strong></div>
<div id="relationship_level" class="overmask" style="font-size:150%;padding-top:735px;padding-left:30px"><strong><?php echo $VisitInfoMisc['relationship_level'] === 'อื่นๆ' ? "/" : "" ?></strong></div>
<div id="family_care" class="overmask" style="font-size:150%;padding-top:798px;padding-left:30px"><strong><?php echo $missing['family_care'] === 'ครอบครัวเอาใจใส่ ดูแลด้านพฤติกรรมและการเรียน' ? "/" : "" ?></strong></div>
<div id="family_care" class="overmask" style="font-size:150%;padding-top:828px;padding-left:30px"><strong><?php echo $missing['family_care'] === 'ครอบครัวเอาใจใส่ (เล็กน้อย) ด้านพฤติกรรมและการเรียน' ? "/" : "" ?></strong></div>
<div id="family_care" class="overmask" style="font-size:150%;padding-top:858px;padding-left:30px"><strong><?php echo $missing['family_care'] === 'ครอบครัวให้อิสระ ไม่ใส่ใจติดตามด้านพฤติกรรมและการเรียน' ? "/" : "" ?></strong></div>
<div id="family_care" class="overmask" style="font-size:150%;padding-top:888px;padding-left:30px"><strong><?php echo $missing['family_care'] === 'อื่นๆ' ? "/" : "" ?></strong></div>
<div style="font-size:16pt;line-height:30px;">
    <p style="text-align:center;font-size:18pt;font-weight:bold">แบบบันทึกการเยี่ยมบ้าน</p>
    <p style="text-align:center;font-size:16pt;font-weight:bold;padding-top:-20px;"><?php for ($i = 0; $i < 78; $i++) {
    echo Html::tag('span', '&#9723;', ['style' => 'font-family: fontawesome; font-size:20%; background-color:black;']);
    echo '&nbsp;'; } ?></p>

    <dl>
    <dt style="width:140px;">วัน - เดือน - ปีที่ไปเยี่ยม</dt>
    <dd style="width:270px;"><?php echo empty($formattedDatetime) ? "&nbsp;" : $formattedDatetime; ?></dd>
    <dt style="width:40px;">เวลา</dt>
    <dd style="width:200px;"><?php echo empty($formattedHour) ? "&nbsp;" : $formattedHour; ?></dd>
    <dt style="width:130px;">ชื่อ - นามสกุลนักเรียน</dt>
    <dd style="width:320px;"><?php echo empty($profile['fullname']) ? "&nbsp;" : $profile['fullname']; ?></dd>
    <dt style="width:40px;">ชั้น ม.</dt>
    <dd style="width:60px;"><?php echo empty($modelname2) ? "&nbsp;" : $modelname2; ?></dd>
    <dt style="width:40px;">เลขที่</dt>
    <dd style="width:50px;"><?php echo empty($missing['student_no']) ? "&nbsp;" : $missing['student_no']; ?></dd>
    <dt style="width:112px;">ชื่อ - นามสกุล บิดา</dt>
    <dd style="width:290px;"><?php echo empty($dad['fullname']) ? "&nbsp;" : $dad['fullname']; ?></dd>
    <dt style="width:80px;">เบอร์โทรศัพท์</dt>
    <dd style="width:167px;"><?php echo empty($dad['phone']) ? "&nbsp;" : $dad['phone']; ?></dd>
    <dt style="width:125px;">ชื่อ - นามสกุล มารดา</dt>
    <dd style="width:280px;"><?php echo empty($mom['fullname']) ? "&nbsp;" : $mom['fullname']; ?></dd>
    <dt style="width:80px;">เบอร์โทรศัพท์</dt>
    <dd style="width:164px;"><?php echo empty($mom['phone']) ? "&nbsp;" : $mom['phone']; ?></dd>
    <dt style="width:142px;">ชื่อ - นามสกุล ผู้ปกครอง</dt>
    <dd style="width:263px;"><?php echo empty($parent['fullname']) ? "&nbsp;" : $parent['fullname']; ?></dd>
    <dt style="width:80px;">เบอร์โทรศัพท์</dt>
    <dd style="width:164px;"><?php echo empty($parent['phone']) ? "&nbsp;" : $parent['phone']; ?></dd>
</dl>
<p>ที่อยู่ปัจจุบัน</p>
<div style="margin-left:25px;padding-top:-5px;">
<dl>
    <dt style="width:105px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;บ้านเลขที่</dt>
    <dd style="width:330px;"><?php echo empty($address['no']) ? "&nbsp;" : $address['no']; ?></dd>
    <dt style="width:50px;">หมู่บ้าน</dt>
    <dd style="width:140px;"><?php echo empty($address['village']) ? "&nbsp;" : $address['village']; ?></dd>
    <dt style="width:30px;">ซอย</dt>
    <dd style="width:86px;"><?php echo empty($address['soi']) ? "&nbsp;" :$address['soi']; ?></dd>
    <dt style="width:30px;">ถนน</dt>
    <dd style="width:86px;"><?php echo empty($address['street']) ? "&nbsp;" : $address['street']; ?></dd>
    <dt style="width:35px;">แขวง</dt>
    <dd style="width:86px;"><?php echo empty($address['sub_district']) ? "&nbsp;" : $address['sub_district']; ?></dd>
    <dt style="width:30px;">เขต</dt>
    <dd style="width:86px;"><?php echo empty($address['district']) ? "&nbsp;" : $address['district']; ?></dd>
    <dt style="width:40px;">จังหวัด</dt>
    <dd style="width:86px;"><?php echo empty($address['province']) ? "&nbsp;" : $address['province']; ?></dd>
</dl>
<p style="padding-bottom:-6px;">1. สภาพแวดล้อมที่อยู่อาศัย</p>
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ดี เอื้อต่อการดำรงชีวิต<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;พอใช้<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ชุมชน / น่าห่วงใย<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;อื่นๆ.........................................................................................................................................................................
<p style="padding-bottom:-6px;">2. ลักษณะของสภาพแวดล้อม(ชุมชน/สังคม)ที่นักเรียนอาศัยอยู่</p>
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ดี เอื้อต่อการดำรงชีวิต<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;พอใช้<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;อื่นๆ.........................................................................................................................................................................
<p style="padding-bottom:-6px;">3. สัมพันธภาพของครอบครัว</p>
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ใกล้ชิด / อบอุ่น / มีเหตุผล<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;สนใจ / เอาใจใส่<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ห่างเหิน / ให้อิสระ<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;อื่นๆ.........................................................................................................................................................................
<p style="padding-bottom:-6px;">4. การเอาใจใส่ของครอบครัว</p>
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ครอบครัวเอาใจใส่ ดูแลด้านพฤติกรรมและการเรียน<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ครอบครัวเอาใจใส่ (เล็กน้อย) ด้านพฤติกรรมและการเรียน<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ครอบครัวให้อิสระ ไม่ใส่ใจติดตามด้านพฤติกรรมและการเรียน<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;อื่นๆ.........................................................................................................................................................................
<p style="padding-bottom:-6px;">5. ข้อเสนอแนะ / ความคิดเห็นของผู้ปกครอง</p>
<div style="margin-left:10px;margin-right:10px;">
<dl>
    <dd style="width:800px;text-align:left;padding-left:10px;"><?php echo empty($VisitInfoOpinion['remark']) ? "&nbsp;" : $VisitInfoOpinion['remark']; ?></dd>
</dl>
</div>
</div>
</div>
<pagebreak/>

<div style="line-height:30px;padding-top: 50px;">
<div style="text-align:center;font-size:14pt;">
<strong style="font-size:18pt;">แผนที่บ้านของนักเรียน</strong> (แผนที่การเดินทางจากบ้านถึงโรงเรียน)
</div>
<div style="text-align:center;border: 2px solid;width: 100%;max-height: 100%;">
<?php echo $image1 ?>
</div>
<br />
<div style="text-align:center;font-size:18pt;">
<strong>ภาพถ่ายกิจกรรมการเยี่ยมบ้าน</strong>
</div>
<div style="text-align:center;border: 2px solid;width: 100%;max-height: 100%;">
<?php echo $image2 ?>
</div>
</div>
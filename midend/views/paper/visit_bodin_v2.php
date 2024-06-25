<?php

use PhpParser\Node\Stmt\TraitUseAdaptation\Alias;
use yii\helpers\Html;

$string = $model['name'];
$parts = explode('.', $string);
$modelname1 = $parts[0]; // ม.
$modelname2 = $parts[1]; // 6/6

$imageSource1 = $VisitInfoFiles['path']['image1']; // รูปแผนที่การเดินทางจากบ้านถึงโรงเรียน
if (!empty($imageSource1)) {
    $image1 = '<img src="' . $imageSource1 . '" alt="School icon" style="width:672px;height: 330px;margin-top:0px">';
} else {
    $image1 = "";
}

$imageSource2 = $VisitInfoFiles['path']['image2'];
if (!empty($imageSource2)) {
    $image2 = '<img src="' . $imageSource2 . '" alt="School icon" style="width:672px;height: 330px;margin-top:0px">';
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

<div style="font-size:16pt;line-height:28px;padding-top:-20px">
    <div style="text-align:center;width: auto;max-height: 100%;">
        <?php $logo = Yii::getAlias('@midend/web/img/bodin_logo.jpeg') ?>
        <img src="<?php echo $logo; ?>" alt="logo">
    </div>
    <p style="text-align:center;font-size:18pt;font-weight:bold">แบบบันทึกการเยี่ยมบ้าน</p>
    <p style="text-align:center;font-size:16pt;font-weight:bold;padding-top:-20px;">
        <?php for ($i = 0; $i < 78; $i++) {
            echo Html::tag('span', '&#9723;', ['style' => 'font-family: fontawesome; font-size:20%; background-color:black;']);
            echo '&nbsp;';
        } ?></p>
    <dl>
        <dt style="width:140px;">วัน - เดือน - ปีที่ไปเยี่ยม</dt>
        <dd style="width:270px;"><?php echo isset($formattedDatetime) ? "&nbsp;" : $formattedDatetime; ?></dd>
        <dt style="width:40px;">เวลา</dt>
        <dd style="width:200px;"><?php echo isset($formattedHour) ? "&nbsp;" : $formattedHour; ?></dd>
        <dt style="width:130px;">ชื่อ - นามสกุลนักเรียน</dt>
        <dd style="width:320px;"><?php echo isset($profile['fullname']) ? "&nbsp;" : $profile['fullname']; ?></dd>
        <dt style="width:40px;">ชั้น ม.</dt>
        <dd style="width:60px;"><?php echo isset($modelname2) ? "&nbsp;" : $modelname2; ?></dd>
        <dt style="width:40px;">เลขที่</dt>
        <dd style="width:50px;"><?php echo isset($missing['student_no']) ? "&nbsp;" : $missing['student_no']; ?></dd>
        <dt style="width:112px;">ชื่อ - นามสกุล บิดา</dt>
        <dd style="width:290px;"><?php echo isset($dad['fullname']) ? "&nbsp;" : $dad['fullname']; ?></dd>
        <dt style="width:80px;">เบอร์โทรศัพท์</dt>
        <dd style="width:167px;"><?php echo isset($dad['phone']) ? "&nbsp;" : $dad['phone']; ?></dd>
        <dt style="width:125px;">ชื่อ - นามสกุล มารดา</dt>
        <dd style="width:280px;"><?php echo isset($mom['fullname']) ? "&nbsp;" : $mom['fullname']; ?></dd>
        <dt style="width:80px;">เบอร์โทรศัพท์</dt>
        <dd style="width:164px;"><?php echo isset($mom['phone']) ? "&nbsp;" : $mom['phone']; ?></dd>
        <dt style="width:142px;">ชื่อ - นามสกุล ผู้ปกครอง</dt>
        <dd style="width:263px;"><?php echo isset($parent['fullname']) ? "&nbsp;" : $parent['fullname']; ?></dd>
        <dt style="width:80px;">เบอร์โทรศัพท์</dt>
        <dd style="width:164px;"><?php echo isset($parent['phone']) ? "&nbsp;" : $parent['phone']; ?></dd>
    </dl>
    <p>ที่อยู่ปัจจุบัน</p>
    <div style="margin-left:25px;padding-top:-5px;">
        <div style="height:100px;">
            <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;บ้านเลขที่&nbsp;
                <span style="border-bottom: dotted 1px black;"><?php echo empty($address['no']) ? "&nbsp;" : $address['no']; ?></span>
                &nbsp;&nbsp;หมู่บ้าน&nbsp;
                <span style="border-bottom: dotted 1px black;"><?php echo empty($address['village']) ? "&nbsp;" : $address['village']; ?></span>
                &nbsp;&nbsp;ซอย&nbsp;
                <span style="border-bottom: dotted 1px black;"><?php echo empty($address['soi']) ? "&nbsp;" : $address['soi']; ?></span>
                &nbsp;&nbsp;ถนน&nbsp;
                <span style="border-bottom: dotted 1px black;"><?php echo empty($address['street']) ? "&nbsp;" : $address['street']; ?></span>
                &nbsp;&nbsp;แขวง&nbsp;
                <span style="border-bottom: dotted 1px black;"><?php echo empty($address['sub_district']) ? "&nbsp;" : $address['sub_district']; ?></span>
                &nbsp;&nbsp;เขต&nbsp;
                <span style="border-bottom: dotted 1px black;"><?php echo empty($address['district']) ? "&nbsp;" : $address['district']; ?></span>
                &nbsp;&nbsp;จังหวัด&nbsp;
                <span style="border-bottom: dotted 1px black;"><?php echo empty($address['province']) ? "&nbsp;" : $address['province']; ?></span>
            </p>
        </div>
        <p style="padding-bottom:-6px;">1. สภาพแวดล้อมที่อยู่อาศัย</p>
        <span style="font-family: fontawesome; font-size:80%;"><?php echo $VisitInfoPersonal['home_condition'] === 'ดี' ? "&#xf14a;" : "&#9723;" ?></span>&nbsp;&nbsp;ดี เอื้อต่อการดำรงชีวิต<br />
        <span style="font-family: fontawesome; font-size:80%;"><?php echo $VisitInfoPersonal['home_condition'] === 'พอใช้' ? "&#xf14a;" : "&#9723;" ?></span>&nbsp;&nbsp;พอใช้<br />
        <span style="font-family: fontawesome; font-size:80%;"><?php echo $VisitInfoPersonal['home_condition'] === 'น่าห่วงใย' ? "&#xf14a;" : "&#9723;" ?></span>&nbsp;&nbsp;ชุมชน / น่าห่วงใย<br />
        <span style="font-family: fontawesome; font-size:80%;"><?php echo $VisitInfoPersonal['home_condition'] === 'อื่นๆ' ? "&#xf14a;" : "&#9723;" ?></span>&nbsp;&nbsp;อื่นๆ.........................................................................................................................................................................
        <p style="padding-bottom:-6px;">2. ลักษณะของสภาพแวดล้อม(ชุมชน/สังคม)ที่นักเรียนอาศัยอยู่</p>
        <span style="font-family: fontawesome; font-size:80%;"><?php echo $missing['living_environment'] === 'ดี' ? "&#xf14a;" : "&#9723;" ?></span>&nbsp;&nbsp;ดี เอื้อต่อการดำรงชีวิต<br />
        <span style="font-family: fontawesome; font-size:80%;"><?php echo $missing['living_environment'] === 'พอใช้' ? "&#xf14a;" : "&#9723;" ?></span>&nbsp;&nbsp;พอใช้<br />
        <span style="font-family: fontawesome; font-size:80%;"><?php echo $missing['living_environment'] === 'อื่นๆ' ? "&#xf14a;" : "&#9723;" ?></span>&nbsp;&nbsp;อื่นๆ.........................................................................................................................................................................
        <p style="padding-bottom:-6px;">3. สัมพันธภาพของครอบครัว</p>
        <span style="font-family: fontawesome; font-size:80%;"><?php echo $VisitInfoMisc['relationship_level'] === 'ใกล้ชิด / อบอุ่น / มีเหตุผล' ? "&#xf14a;" : "&#9723;" ?></span>&nbsp;&nbsp;ใกล้ชิด / อบอุ่น / มีเหตุผล<br />
        <span style="font-family: fontawesome; font-size:80%;"><?php echo $VisitInfoMisc['relationship_level'] === 'สนใจ / เอาใจใส่' ? "&#xf14a;" : "&#9723;" ?></span>&nbsp;&nbsp;สนใจ / เอาใจใส่<br />
        <span style="font-family: fontawesome; font-size:80%;"><?php echo $VisitInfoMisc['relationship_level'] === 'ห่างเหิน / ให้อิสระ' ? "&#xf14a;" : "&#9723;" ?></span>&nbsp;&nbsp;ห่างเหิน / ให้อิสระ<br />
        <span style="font-family: fontawesome; font-size:80%;"><?php echo $VisitInfoMisc['relationship_level'] === 'อื่นๆ' ? "&#xf14a;" : "&#9723;" ?></span>&nbsp;&nbsp;อื่นๆ.........................................................................................................................................................................
        <p style="padding-bottom:-6px;">4. การเอาใจใส่ของครอบครัว</p>
        <span style="font-family: fontawesome; font-size:80%;"><?php echo $missing['family_care'] === 'ครอบครัวเอาใจใส่ ดูแลด้านพฤติกรรมและการเรียน' ? "&#xf14a;" : "&#9723;" ?></span>&nbsp;&nbsp;ครอบครัวเอาใจใส่ ดูแลด้านพฤติกรรมและการเรียน<br />
        <span style="font-family: fontawesome; font-size:80%;"><?php echo $missing['family_care'] === 'ครอบครัวเอาใจใส่ (เล็กน้อย) ด้านพฤติกรรมและการเรียน' ? "&#xf14a;" : "&#9723;" ?></span>&nbsp;&nbsp;ครอบครัวเอาใจใส่ (เล็กน้อย) ด้านพฤติกรรมและการเรียน<br />
        <span style="font-family: fontawesome; font-size:80%;"><?php echo $missing['family_care'] === 'ครอบครัวให้อิสระ ไม่ใส่ใจติดตามด้านพฤติกรรมและการเรียน' ? "&#xf14a;" : "&#9723;" ?></span>&nbsp;&nbsp;ครอบครัวให้อิสระ ไม่ใส่ใจติดตามด้านพฤติกรรมและการเรียน<br />
        <span style="font-family: fontawesome; font-size:80%;"><?php echo $missing['family_care'] === 'อื่นๆ' ? "&#xf14a;" : "&#9723;" ?></span>&nbsp;&nbsp;อื่นๆ.........................................................................................................................................................................
        <p style="padding-bottom:-6px;">5. ข้อเสนอแนะ / ความคิดเห็นของผู้ปกครอง</p>
        <div style="margin-left:10px;margin-right:10px;">
            <dl>
                <dd style="width:800px;text-align:left;padding-left:10px;"><?php echo empty($VisitInfoOpinion['remark']) ? "&nbsp;" : $VisitInfoOpinion['remark']; ?></dd>
            </dl>
        </div>
    </div>
</div>
<pagebreak />
<div style="font-size:16pt;">
    <div style="line-height:30px;padding-top: 35px;">
        <div style="text-align:center;font-size:14pt;">
            <strong style="font-size:18pt;">แผนที่บ้านของนักเรียน</strong> (แผนที่การเดินทางจากบ้านถึงโรงเรียน)
        </div>
        <div style="text-align:center;border: 2px solid;width: auto;max-height: 100%;">
            <?php echo $image1 ?>
        </div>
        <br />
        <div style="text-align:center;font-size:18pt;">
            <strong>ภาพถ่ายกิจกรรมการเยี่ยมบ้าน</strong>
        </div>
        <div style="text-align:center;border: 2px solid;width: auto;max-height: 100%;">
            <?php echo $image2 ?>
        </div>
    </div>

    <div style="margin-top: 30px;">
        <div style="float:left;text-align:center;width:50%">
            <p>ลงชื่อ ......................................................นักเรียน</p>
            <dl>
                <dt style="width:30px;padding-left:50px;">(</dt>
                <dd style="width:170px;"><?php echo $profile['fullname'] ?></dd>
                <dt style="width:30px;padding-left:-15px;">)</dt>
            </dl>
        </div>
        <div style="float:left;text-align:center;width:50%;padding-top:5px;">
            <p>ลงชื่อ ......................................................ผู้ปกครอง</p>
            <p style="margin-top:20px">( ................................................. )</p>
        </div>
    </div>
    <div style="margin-top: 15px;">
        <div style="float:left;text-align:center;width:50%">
            <p>ลงชื่อ ......................................................ครูที่ปรึกษา</p>
            <p style="margin-top:20px">( ................................................. )</p>
        </div>
        <div style="float:left;text-align:center;width:50%;padding-top:5px;">
            <p>ลงชื่อ ......................................................ครูที่ปรึกษา</p>
            <p style="margin-top:20px">( ................................................. )</p>
        </div>
    </div>
    <div style="margin-top: 15px;">
        <div style="float:left;text-align:center;width:100%">
            <p>ลงชื่อ ......................................................ครูที่ปรึกษา</p>
            <p style="margin-top:20px">( ................................................. )</p>
        </div>
    </div>
</div>
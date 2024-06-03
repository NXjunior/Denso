<?php
$dtime = \DateTime::createFromFormat("Y-m-d", date('Y-m-d'));
$timestamp = $dtime->getTimestamp();
$thaiYear = date('Y', $timestamp) + 543;
$DateTime = Yii::$app->date->date('วันlที่ j F พ.ศ. Y เวลา H:i:s', $timestamp);
$DateTime = str_replace(date('Y', $timestamp), $thaiYear, $DateTime);

$examDatetime = $exam['datetime'];
$timestamp = strtotime($examDatetime);
$thaiYear = date('Y', $timestamp) + 543;
$formattedDatetime = Yii::$app->date->date('j F', $timestamp) . ' ' . $thaiYear . Yii::$app->date->date(' เวลา H:i น.', $timestamp);

$imageSource = $registrant['image'];
if (!empty($imageSource)) {
    $image = '<img src="' . $imageSource . '" alt="School icon" style="width:3cm;height:4cm;margin-top:0px;">';
} else {
  $image = '<p style="text-align:center;margin-top:65px;font-size:16px">รูปถ่าย 1-1.5 นิ่้ว</p>';
}
?>
<div style="width:100%;padding-top:30px">
<div style="margin-right:-3px;width:8.8cm;height:6cm;border: 3px solid;border-color: #737E9A;border-right-style: dotted;float:left;">
<p style="font-size:22px;font-weight:bold;margin-top:10px;margin-left:10px">บัตรประจำตัวผู้เข้าห้องสอบ</p>
<div class="col-1" style="margin-top:-5px;margin-left:10px;float:left;width:37%;">
<div style="width:3cm;height:4cm;border: 2px solid;border-color: #737E9A;">
<?php echo $image ?><br />
</div>
</div>

<div class="col-1" style="margin-top:5px;margin-left:10px;float:left;width:55%;">
<p style="font-size:18px;font-weight:bold;margin-top:10px;line-height:20px">ชื่อ <?php echo $profile['fullname']?><br />
เลขประจำตัวประชาชน<br />
<?php echo $profile['personal_id']?><br />
<?php echo $old_school['name']?><br />
จังหวัด <?php echo $old_school['province']?>
</p>
  </div>
  <p style="font-size:14px;margin-top:5px;margin-left:10px;">
  วันที่จัดทำเอกสาร: <?php echo $DateTime?>
  </p>
  </div>
  <div style="margin-left:-3px;width:8.8cm;height:6cm;border: 3px solid;border-color: #737E9A;border-left:0px solid;float:left;">
  <p style="font-size:18px;font-weight:bold;margin-top:20px;margin-left:20px;color: #737E9A;">เลขที่นั่งสอบ <b style="font-size:22px"><?php echo $exam['seat_name']?></b>
</p>
    <div style="margin-left:20px;margin-top:10px;margin-right:40px">
    <dl>
  <dt style="width:45px;line-height:18px">ระดับชั้น</dt>
  <dd style="width:215px;line-height:18px">มัธยมศึกษาปีที่ <?php echo $profile['grade'] . '&nbsp;ปีการศึกษา&nbsp;' . $profile['year'] ?></dd>
        <dt style="width:120px;line-height:18px">ประเภท / แผนการเรียน</dt>
        <br />
        <dt style="width:340px;line-height:18px"><?php echo $targets[0] ?></dt>
        <dt style="width:70px;line-height:18px">วันเวลาที่สอบ</dt>
        <dd style="width:190px;line-height:18px"><?php echo $formattedDatetime ?></dd>
        <dt style="width:305px;line-height:18px">เวลา 8.00 - 12.00 น.</dt>
        <dt style="width:305px;line-height:18px">สนามสอบ โรงเรียนนิคมวิทยา</dt>
        <dt style="width:35px;line-height:18px">อาคาร</dt>
        <dd style="width:223px;line-height:18px"><?php echo $exam['location_name'] ?></dd>
</dl>
</div>
</div>
</div>
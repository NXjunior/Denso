<?php
$string = $model['name'];
$parts = explode('.', $string);
$modelname1 = $parts[0]; // ม.
$modelname2 = $parts[1]; // 6/6

$semesterNo = $semester['name'];
$dateComponentsSem = explode(' ', $semesterNo);
$semText = $dateComponentsSem[0];
$semNo = $dateComponentsSem[1];

$travelDuration = $profile['travelDuration'];
$dateComponentsTralvel = explode(' ', $travelDuration);
$travel = $dateComponentsTralvel[0];
$minute = $dateComponentsTralvel[1];
?>
<div id="home_kind_siyanusorn" class="overmask" style="font-size:150%;padding-top:302px;padding-left:105px"><strong><?php echo $missing['home_kind_siyanusorn'] === 'บ้านของตัวเอง' ? "/" : "" ?></strong></div>
<div id="home_kind_siyanusorn" class="overmask" style="font-size:150%;padding-top:302px;padding-left:240px"><strong><?php echo $missing['home_kind_siyanusorn'] === 'บ้านเช่า' ? "/" : "" ?></strong></div>
<div id="home_kind_siyanusorn" class="overmask" style="font-size:150%;padding-top:302px;padding-left:335px"><strong><?php echo $missing['home_kind_siyanusorn'] === 'อาศัยอยู่กับผู้อื่น' ? "/" : "" ?></strong></div>
<div id="home_kind_siyanusorn" class="overmask" style="font-size:150%;padding-top:302px;padding-left:477px"><strong><?php echo $missing['home_kind_siyanusorn'] === 'บ้านญาติ' ? "/" : "" ?></strong></div>
<div id="home_kind_siyanusorn" class="overmask" style="font-size:150%;padding-top:328px;padding-left:145px"><strong><?php echo $missing['home_kind_siyanusorn'] === 'หอพักอาศัยอยู่กับ' ? "/" : "" ?></strong></div>
<div id="home_kind_siyanusorn" class="overmask" style="font-size:150%;padding-top:355px;padding-left:145px"><strong><?php echo $missing['home_kind_siyanusorn'] === 'อื่นๆ' ? "/" : "" ?></strong></div>
<div id="method" class="overmask" style="font-size:150%;padding-top:440px;padding-left:105px"><strong><?php echo $VisitInfoTransport['method'] === 'ผู้ปกครองมาส่ง' ? "/" : "" ?></strong></div>
<div id="method" class="overmask" style="font-size:150%;padding-top:465px;padding-left:105px"><strong><?php echo $VisitInfoTransport['method'] === 'รถโรงเรียน' ? "/" : "" ?></strong></div>
<div id="method" class="overmask" style="font-size:150%;padding-top:490px;padding-left:105px"><strong><?php echo $VisitInfoTransport['method'] === 'รถจักรยาน' ? "/" : "" ?></strong></div>
<div id="method" class="overmask" style="font-size:150%;padding-top:440px;padding-left:223px"><strong><?php echo $VisitInfoTransport['method'] === 'เดินทางมาเอง' ? "/" : "" ?></strong></div>
<div id="method" class="overmask" style="font-size:150%;padding-top:465px;padding-left:223px"><strong><?php echo $VisitInfoTransport['method'] === 'รถโดยสารประจำทาง' ? "/" : "" ?></strong></div>
<div id="method" class="overmask" style="font-size:150%;padding-top:490px;padding-left:223px"><strong><?php echo $VisitInfoTransport['method'] === 'เดิน' ? "/" : "" ?></strong></div>
<div id="method" class="overmask" style="font-size:150%;padding-top:490px;padding-left:303px"><strong><?php echo $VisitInfoTransport['method'] === 'อื่นๆ' ? "/" : "" ?></strong></div>
<div id="method" class="overmask" style="font-size:150%;padding-top:465px;padding-left:398px"><strong><?php echo $VisitInfoTransport['method'] === 'รถยนต์ส่วนตัว' ? "/" : "" ?></strong></div>
<div id="method" class="overmask" style="font-size:150%;padding-top:465px;padding-left:530px"><strong><?php echo $VisitInfoTransport['method'] === 'รถจักรยานยนต์' ? "/" : "" ?></strong></div>
<div id="home_condition" class="overmask" style="font-size:150%;padding-top:545px;padding-left:195px"><strong><?php echo $VisitInfoPersonal['home_condition'] === 'ดี' ? "/" : "" ?></strong></div>
<div id="home_condition" class="overmask" style="font-size:150%;padding-top:545px;padding-left:237px"><strong><?php echo $VisitInfoPersonal['home_condition'] === 'พอใช้' ? "/" : "" ?></strong></div>
<div id="home_condition" class="overmask" style="font-size:150%;padding-top:545px;padding-left:302px"><strong><?php echo $VisitInfoPersonal['home_condition'] === 'เก่าทรุดโทรม' ? "/" : "" ?></strong></div>
<div id="home_condition" class="overmask" style="font-size:150%;padding-top:545px;padding-left:407px"><strong><?php echo $VisitInfoPersonal['home_condition'] === 'พื้นที่คับแคบ' ? "/" : "" ?></strong></div>
<div id="home_condition" class="overmask" style="font-size:150%;padding-top:545px;padding-left:513px"><strong><?php echo $VisitInfoPersonal['home_condition'] === 'ไม่มีความเป็นสัดส่วน' ? "/" : "" ?></strong></div>
<div id="home_tidy" class="overmask" style="font-size:150%;padding-top:570px;padding-left:213px"><strong><?php echo $missing['home_tidy'] === 'สะอาดเรียบร้อย' ? "/" : "" ?></strong></div>
<div id="home_tidy" class="overmask" style="font-size:150%;padding-top:570px;padding-left:338px"><strong><?php echo $missing['home_tidy'] === 'ไม่ค่อยสะอาด' ? "/" : "" ?></strong></div>
<div id="home_tidy" class="overmask" style="font-size:150%;padding-top:570px;padding-left:448px"><strong><?php echo $missing['home_tidy'] === 'สกปรกไม่มีระเบียบ' ? "/" : "" ?></strong></div>
<div id="hasElectricity" class="overmask" style="font-size:150%;padding-top:595px;padding-left:382px"><strong><?php echo $missing['hasElectricity'] === true ? "/" : "" ?></strong></div>
<div id="hasElectricity" class="overmask" style="font-size:150%;padding-top:595px;padding-left:502px"><strong><?php echo $missing['hasElectricity'] === false ? "/" : "" ?></strong></div>
<div id="hasWater" class="overmask" style="font-size:150%;padding-top:622px;padding-left:382px"><strong><?php echo $missing['hasWater'] === true ? "/" : "" ?></strong></div>
<div id="hasWater" class="overmask" style="font-size:150%;padding-top:622px;padding-left:502px"><strong><?php echo $missing['hasWater'] === false ? "/" : "" ?></strong></div>
<div id="hasBathroom" class="overmask" style="font-size:150%;padding-top:648px;padding-left:382px"><strong><?php echo $missing['hasBathroom'] === true ? "/" : "" ?></strong></div>
<div id="hasBathroom" class="overmask" style="font-size:150%;padding-top:188px;padding-left:115px"><strong><?php echo $missing['visit_count'] > 0 ? "/" : "" ?></strong></div>
<div id="hasBathroom" class="overmask" style="font-size:150%;padding-top:188px;padding-left:440px"><strong><?php echo $missing['visit_count'] === 0 ? "/" : "" ?></strong></div>
<div style="font-size:16pt;line-height:26px;">
<div style="padding-top:40px;padding-bottom:20px">
    <p style="text-align:center;font-size:20pt;font-weight:bold;border:1px solid #43729B;border-radius: 10px;background-color:#F2F2F2;width:210px;height:35px;padding-top:10px;margin-left:250px;">แบบบันทึกการเยี่ยมบ้าน</p>
</div>

<dl>
    <dt style="width:60px;"><strong>ชื่อ - สกุล</strong></dt>
    <dd style="width:380px;"><?php echo empty($profile['fullname']) ? "&nbsp;" : $profile['fullname']; ?></dd>
    <dt style="width:40px;"><strong>ชื่อเล่น</strong></dt>
    <dd style="width:180px;"><?php echo empty($missing['nickname']) ? "&nbsp;" : $missing['nickname']; ?></dd>
    <dt style="width:30px;"><strong>ชั้น</strong></dt>
    <dd style="width:60px;"><?php echo empty($model['name']) ? "&nbsp;" : $model['name']; ?></dd>
    <dt style="width:35px;">เลขที่</dt>
    <dd style="width:40px;"><?php echo empty($missing['student_no']) ? "&nbsp;" : $missing['student_no']; ?></dd>
    <dt style="width:55px;">โทรศัพท์</dt>
    <dd style="width:100px;"><?php echo empty($profile['mobile_no']) ? "&nbsp;" : $profile['mobile_no']; ?></dd>
    <dt style="width:45px;">id line</dt>
    <dd style="width:100px;"><?php echo empty($missing['line_id']) ? "&nbsp;" : $missing['line_id']; ?></dd>
    <dt style="width:65px;">Facebook</dt>
    <dd style="width:100px;"><?php echo empty($missing['facebook']) ? "&nbsp;" : $missing['facebook']; ?></dd>
    <dt style="width:225px;"><strong>สถานการณ์เยี่ยม :</strong> <span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;เยี่ยมแล้ว ครั้งที่</dt>
    <dd style="width:60px;"><?php echo empty($missing['visit_count']) ? "&nbsp;" : $missing['visit_count']; ?></dd>
    <dt style="width:70px;">ภาคเรียนที่</dt>
    <dd style="width:60px;"><?php echo empty($semNo) ? "&nbsp;" : $semNo; ?></dd>
    <dt style="width:100px;"><span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ยังไม่ได้เยี่ยม</dt>
    <dt style="width:500px;"><strong>ข้อมูลจากการสังเกตและสอบถาม :</strong> ให้ทำเครื่องหมาย <span style="font-family: fontawesome; font-size:80%;">&#x2713;</span> ถูกในช่องสี่เหลี่ยม</dt>
</dl>
<p style="font-weight:bold;">บ้านที่พักอาศัย</p>
<div style="margin-left:20px;padding-top:-10px;">
<p>๑. บ้านที่พักอาศัย</p>
<div style="margin-left:80px;padding-top:-10px;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;บ้านของตัวเอง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;บ้านเช่า&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;อาศัยอยู่กับผู้อื่น&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;บ้านญาติ
<div style="margin-left:40px;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;หอพักอาศัยอยู่กับ....................................................................<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;อื่นๆ.........................................................................................<br />
</div>
</div>
<dl>
    <dt style="width:250px;">๒. ระยะทางระหว่างบ้านไปโรงเรียนไป/กลับ</dt>
    <dd style="width:105px;"><?php echo empty($profile['distance']) ? "&nbsp;" : $profile['distance']; ?></dd>
    <dt style="width:140px;">กิโลเมตร ใช้เวลาเดินทาง</dt>
    <dd style="width:105px;"><?php echo empty($travel) ? "&nbsp;" : $travel; ?></dd>
    <dt style="width:35px;">นาที.</dt>
</dl>
<p>๓. การเดินทางของนักเรียนไปโรงเรียน</p>
<div style="margin-left:80px;padding-top:-10px;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ผู้ปกครองมาส่ง&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;เดินทางมาเอง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โดย............................<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;รถโรงเรียน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;รถโดยสารประจำทาง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;รถยนต์ส่วนตัว&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;รถจักรยานยนต์
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;รถจักรยาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;เดิน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;อื่นๆ.......................................................................
</div>
<p>๔. สภาพแวดล้อมที่อยู่อาศัย</p>
<div style="margin-left:60px;padding-top:-10px;">
๔.๑ สภาพตัวบ้าน&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ดี&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;พอใช้&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;เก่าทรุดโทรม&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;พื้นที่คับแคบ&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ไม่มีความเป็นสัดส่วน
๔.๒ สะอาดมีระเบียบ&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;สะอาดเรียบร้อย&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ไม่ค่อยสะอาด&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;สกปรกไม่มีระเบียบ
<div class="col-1" style="float:left;width:20%">
๔.๓ สาธารณูปโภค
</div>
<div class="col-1" style="float:left;width:30%">
ไฟฟ้า<br />
น้ำเพื่อให้อุปโภค/บริโภค<br />
ห้องสุขา
</div>
<div class="col-1" style="float:left;width:20%">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;มี<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;มี<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;มี
</div>
<div class="col-1" style="float:left;width:20%">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ไม่มี<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ไม่มี<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ไม่มี
</div>
๔.๔ โปรดระบุสภาพแวดล้อมที่อยู่อาศัย เช่น ใกล้แหล่งมั่วสุม ใกล้สถานบันเทิง ชุมชนแออัด เป็นต้น
</div>
<div style="margin-left:20px;">
<p>.......................................................................................................................................................................................</p>
<p>.......................................................................................................................................................................................</p>
<p>.......................................................................................................................................................................................</p>
</div>
</div>
<p style="font-weight:bold;">ข้อมูลครอบครัว</p>
<div style="margin-left:20px;">
<dl>
    <dt style="width:235px;">๑. สมาชิกในครอบครัวนักเรียน&nbsp;&nbsp;&nbsp;&nbsp;จำนวน</dt>
    <dd style="width:60px;"><?php echo empty($missing['totalFamilyMember']) ? "&nbsp;" : $missing['totalFamilyMember']; ?></dd>
    <dt style="width:30px;">คน</dt>
    <dt style="width:35px;">ชาย</dt>
    <dd style="width:60px;"><?php echo empty($missing['familyMemberMale']) ? "&nbsp;" : $missing['familyMemberMale']; ?></dd>
    <dt style="width:30px;">คน</dt>
    <dt style="width:35px;">หญิง</dt>
    <dd style="width:60px;"><?php echo empty($missing['familyMemberFemale']) ? "&nbsp;" : $missing['familyMemberFemale']; ?></dd>
    <dt style="width:30px;">คน</dt>
    <dt style="width:245px;">๒. พี่น้องที่เกิดจากบิดามารดาเดียวกัน&nbsp;&nbsp;ชาย</dt>
    <dd style="width:60px;"><?php echo empty($missing['bloodRelatedSon']) ? "&nbsp;" : $missing['bloodRelatedSon']; ?></dd>
    <dt style="width:30px;">คน</dt>
    <dt style="width:35px;">หญิง</dt>
    <dd style="width:60px;"><?php echo empty($missing['bloodRelatedDaughter']) ? "&nbsp;" : $missing['bloodRelatedDaughter']; ?></dd>
    <dt style="width:30px;">คน</dt>
    <dt style="width:35px;">รวม</dt>
    <dd style="width:60px;"><?php echo empty($missing['bloodRelatedSibling']) ? "&nbsp;" : $missing['bloodRelatedSibling']; ?></dd>
    <dt style="width:30px;">คน</dt>
    <dt style="width:230px;">๓. พี่น้องที่เกิดจากต่างบิดามารดา&nbsp;&nbsp;ชาย</dt>
    <dd style="width:60px;"><?php echo empty($missing['nonBloodRelatedSon']) ? "&nbsp;" : $missing['nonBloodRelatedSon']; ?></dd>
    <dt style="width:30px;">คน</dt>
    <dt style="width:35px;">หญิง</dt>
    <dd style="width:60px;"><?php echo empty($missing['nonBloodRelatedDaughter']) ? "&nbsp;" : $missing['nonBloodRelatedDaughter']; ?></dd>
    <dt style="width:30px;">คน</dt>
    <dt style="width:35px;">รวม</dt>
    <dd style="width:60px;"><?php echo empty($missing['nonBloodRelatedSibling']) ? "&nbsp;" : $missing['nonBloodRelatedSibling']; ?></dd>
    <dt style="width:30px;">คน</dt>
    <dt style="width:345px;">&nbsp;&nbsp;&nbsp;&nbsp;กรณีในครอบครัวมีผู้ที่ต้องการการช่วยเหลือเป็นกรณีพิเศษ&nbsp;</dt>
    <dt style="width:35px;">รวม</dt>
    <dd style="width:60px;"><?php echo empty($missing['familyMemberNeedHelp']) ? "&nbsp;" :$missing['familyMemberNeedHelp']; ?></dd>
    <dt style="width:30px;">คน</dt>
</dl>
</div>
</div>

<pagebreak />

<div id="familyRelationship" class="overmask" style="font-size:150%;padding-top:65px;padding-left:45px"><strong><?php echo $missing['familyRelationship'] === 'รักใคร่กันดี' ? "/" : "" ?></strong></div>
<div id="familyRelationship" class="overmask" style="font-size:150%;padding-top:65px;padding-left:150px"><strong><?php echo $missing['familyRelationship'] === 'ขัดแย้งทะเลาะกันบางครั้ง' ? "/" : "" ?></strong></div>
<div id="familyRelationship" class="overmask" style="font-size:150%;padding-top:65px;padding-left:335px"><strong><?php echo $missing['familyRelationship'] === 'ขัดแย้งทะเลาะกันบ่อยครั้ง' ? "/" : "" ?></strong></div>
<div id="familyRelationship" class="overmask" style="font-size:150%;padding-top:65px;padding-left:525px"><strong><?php echo $missing['familyRelationship'] === 'ห่างเหิน' ? "/" : "" ?></strong></div>
<div id="familyRelationship" class="overmask" style="font-size:150%;padding-top:92px;padding-left:45px"><strong><?php echo $missing['familyRelationship'] === 'ขัดแย้งและทำร้ายร่างกายบางครั้ง' ? "/" : "" ?></strong></div>
<div id="familyRelationship" class="overmask" style="font-size:150%;padding-top:92px;padding-left:275px"><strong><?php echo $missing['familyRelationship'] === 'ขัดแย้งและทำร้ายร่างกายบ่อยครั้ง' ? "/" : "" ?></strong></div>
<div id="familyRelationship" class="overmask" style="font-size:150%;padding-top:92px;padding-left:507px"><strong><?php echo $missing['familyRelationship'] === 'อื่นๆ' ? "/" : "" ?></strong></div>
<div id="relationshipWithDad" class="overmask" style="font-size:150%;padding-top:180px;padding-left:290px"><strong><?php echo $missing['relationshipWithDad'] === 'สนิทสนม' ? "/" : "" ?></strong></div>
<div id="relationshipWithDad" class="overmask" style="font-size:150%;padding-top:180px;padding-left:380px"><strong><?php echo $missing['relationshipWithDad'] === 'เฉยๆ' ? "/" : "" ?></strong></div>
<div id="relationshipWithDad" class="overmask" style="font-size:150%;padding-top:180px;padding-left:470px"><strong><?php echo $missing['relationshipWithDad'] === 'ห่างเหิน' ? "/" : "" ?></strong></div>
<div id="relationshipWithDad" class="overmask" style="font-size:150%;padding-top:180px;padding-left:565px"><strong><?php echo $missing['relationshipWithDad'] === 'ขัดแย้ง' ? "/" : "" ?></strong></div>
<div id="relationshipWithMom" class="overmask" style="font-size:150%;padding-top:210px;padding-left:290px"><strong><?php echo $missing['relationshipWithMom'] === 'สนิทสนม' ? "/" : "" ?></strong></div>
<div id="relationshipWithMom" class="overmask" style="font-size:150%;padding-top:210px;padding-left:380px"><strong><?php echo $missing['relationshipWithMom'] === 'เฉยๆ' ? "/" : "" ?></strong></div>
<div id="relationshipWithMom" class="overmask" style="font-size:150%;padding-top:210px;padding-left:470px"><strong><?php echo $missing['relationshipWithMom'] === 'ห่างเหิน' ? "/" : "" ?></strong></div>
<div id="relationshipWithMom" class="overmask" style="font-size:150%;padding-top:210px;padding-left:565px"><strong><?php echo $missing['relationshipWithMom'] === 'ขัดแย้ง' ? "/" : "" ?></strong></div>
<div id="relationshipWithBrother" class="overmask" style="font-size:150%;padding-top:236px;padding-left:290px"><strong><?php echo $missing['relationshipWithBrother'] === 'สนิทสนม' ? "/" : "" ?></strong></div>
<div id="relationshipWithBrother" class="overmask" style="font-size:150%;padding-top:236px;padding-left:380px"><strong><?php echo $missing['relationshipWithBrother'] === 'เฉยๆ' ? "/" : "" ?></strong></div>
<div id="relationshipWithBrother" class="overmask" style="font-size:150%;padding-top:236px;padding-left:470px"><strong><?php echo $missing['relationshipWithBrother'] === 'ห่างเหิน' ? "/" : "" ?></strong></div>
<div id="relationshipWithBrother" class="overmask" style="font-size:150%;padding-top:236px;padding-left:565px"><strong><?php echo $missing['relationshipWithBrother'] === 'ขัดแย้ง' ? "/" : "" ?></strong></div>
<div id="relationshipWithSister" class="overmask" style="font-size:150%;padding-top:265px;padding-left:290px"><strong><?php echo $missing['relationshipWithSister'] === 'สนิทสนม' ? "/" : "" ?></strong></div>
<div id="relationshipWithSister" class="overmask" style="font-size:150%;padding-top:265px;padding-left:380px"><strong><?php echo $missing['relationshipWithSister'] === 'เฉยๆ' ? "/" : "" ?></strong></div>
<div id="relationshipWithSister" class="overmask" style="font-size:150%;padding-top:265px;padding-left:470px"><strong><?php echo $missing['relationshipWithSister'] === 'ห่างเหิน' ? "/" : "" ?></strong></div>
<div id="relationshipWithSister" class="overmask" style="font-size:150%;padding-top:265px;padding-left:565px"><strong><?php echo $missing['relationshipWithSister'] === 'ขัดแย้ง' ? "/" : "" ?></strong></div>
<div id="relationshipWithElder" class="overmask" style="font-size:150%;padding-top:294px;padding-left:290px"><strong><?php echo $missing['relationshipWithElder'] === 'สนิทสนม' ? "/" : "" ?></strong></div>
<div id="relationshipWithElder" class="overmask" style="font-size:150%;padding-top:294px;padding-left:380px"><strong><?php echo $missing['relationshipWithElder'] === 'เฉยๆ' ? "/" : "" ?></strong></div>
<div id="relationshipWithElder" class="overmask" style="font-size:150%;padding-top:294px;padding-left:470px"><strong><?php echo $missing['relationshipWithElder'] === 'ห่างเหิน' ? "/" : "" ?></strong></div>
<div id="relationshipWithElder" class="overmask" style="font-size:150%;padding-top:294px;padding-left:565px"><strong><?php echo $missing['relationshipWithElder'] === 'ขัดแย้ง' ? "/" : "" ?></strong></div>
<div id="relationshipWithRelative" class="overmask" style="font-size:150%;padding-top:323px;padding-left:290px"><strong><?php echo $missing['relationshipWithRelative'] === 'สนิทสนม' ? "/" : "" ?></strong></div>
<div id="relationshipWithRelative" class="overmask" style="font-size:150%;padding-top:323px;padding-left:380px"><strong><?php echo $missing['relationshipWithRelative'] === 'เฉยๆ' ? "/" : "" ?></strong></div>
<div id="relationshipWithRelative" class="overmask" style="font-size:150%;padding-top:323px;padding-left:470px"><strong><?php echo $missing['relationshipWithRelative'] === 'ห่างเหิน' ? "/" : "" ?></strong></div>
<div id="relationshipWithRelative" class="overmask" style="font-size:150%;padding-top:323px;padding-left:565px"><strong><?php echo $missing['relationshipWithRelative'] === 'ขัดแย้ง' ? "/" : "" ?></strong></div>
<div id="relationshipWithOther" class="overmask" style="font-size:150%;padding-top:353px;padding-left:290px"><strong><?php echo $missing['relationshipWithOther'] === 'สนิทสนม' ? "/" : "" ?></strong></div>
<div id="relationshipWithOther" class="overmask" style="font-size:150%;padding-top:353px;padding-left:380px"><strong><?php echo $missing['relationshipWithOther'] === 'เฉยๆ' ? "/" : "" ?></strong></div>
<div id="relationshipWithOther" class="overmask" style="font-size:150%;padding-top:353px;padding-left:470px"><strong><?php echo $missing['relationshipWithOther'] === 'ห่างเหิน' ? "/" : "" ?></strong></div>
<div id="relationshipWithOther" class="overmask" style="font-size:150%;padding-top:353px;padding-left:565px"><strong><?php echo $missing['relationshipWithOther'] === 'ขัดแย้ง' ? "/" : "" ?></strong></div>
<div id="studentHealth" class="overmask" style="font-size:150%;padding-top:680px;padding-left:45px"><strong><?php foreach ($missing['studentHealth'] as $value){ if ($value === 'ร่างกายไม่แข็งแรง') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentHealth" class="overmask" style="font-size:150%;padding-top:680px;padding-left:188px"><strong><?php foreach ($missing['studentHealth'] as $value){ if ($value === 'มีโรคประจำตัวหรือเจ็บป่วยบ่อย') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentHealth" class="overmask" style="font-size:150%;padding-top:680px;padding-left:408px"><strong><?php foreach ($missing['studentHealth'] as $value){ if ($value === 'มีภาวะทุพโภชนาการ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentHealth" class="overmask" style="font-size:150%;padding-top:706px;padding-left:45px"><strong><?php foreach ($missing['studentHealth'] as $value){ if ($value === 'ป่วยเป็นโรคร้ายแรง/เรื้อรัง') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentHealth" class="overmask" style="font-size:150%;padding-top:706px;padding-left:235px"><strong><?php foreach ($missing['studentHealth'] as $value){ if ($value === 'สมรรถภาพทางกายต่ำ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentSafety" class="overmask" style="font-size:150%;padding-top:756px;padding-left:45px"><strong><?php foreach ($missing['studentSafety'] as $value){ if ($value === 'พ่อแม่แยกทางกันหรือแต่งงานใหม่') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentSafety" class="overmask" style="font-size:150%;padding-top:783px;padding-left:45px"><strong><?php foreach ($missing['studentSafety'] as $value){ if ($value === 'มีบุคคลในครอบครัวเจ็บป่วยด้วยโรคร้ายแรง/เรื้อรัง/ติดต่อ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentSafety" class="overmask" style="font-size:150%;padding-top:810px;padding-left:45px"><strong><?php foreach ($missing['studentSafety'] as $value){ if ($value === 'บุคคลในครอบครัวเล่นการพนัน') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentSafety" class="overmask" style="font-size:150%;padding-top:835px;padding-left:45px"><strong><?php foreach ($missing['studentSafety'] as $value){ if ($value === 'ความขัดแย้งและมีการใช้ความรุนแรงในครอบครัว') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentSafety" class="overmask" style="font-size:150%;padding-top:860px;padding-left:45px"><strong><?php foreach ($missing['studentSafety'] as $value){ if ($value === 'ถูกทารุณ/ทำร้ายจากบุคคลในครอบครัว/เพื่อนบ้าน') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentSafety" class="overmask" style="font-size:150%;padding-top:756px;padding-left:413px"><strong><?php foreach ($missing['studentSafety'] as $value){ if ($value === 'เล่นการพนัน') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentSafety" class="overmask" style="font-size:150%;padding-top:783px;padding-left:413px"><strong><?php foreach ($missing['studentSafety'] as $value){ if ($value === 'บุคคลในครอบครัวติดสารเสพติด') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentSafety" class="overmask" style="font-size:150%;padding-top:810px;padding-left:413px"><strong><?php foreach ($missing['studentSafety'] as $value){ if ($value === 'มีความขัดแย้ง/ทะเลาะกันในครอบครัว') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentSafety" class="overmask" style="font-size:150%;padding-top:835px;padding-left:413px"><strong><?php foreach ($missing['studentSafety'] as $value){ if ($value === 'ไม่มีผู้ดูแล') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentSafety" class="overmask" style="font-size:150%;padding-top:860px;padding-left:413px"><strong><?php foreach ($missing['studentSafety'] as $value){ if ($value === 'ถูกล่วงละเมิดทางเพศ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="method" class="overmask" style="font-size:150%;padding-top:947px;padding-left:45px"><strong><?php foreach ($missing['method'] as $value){ if ($value === 'ผู้ปกครองมาส่ง') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="method" class="overmask" style="font-size:150%;padding-top:947px;padding-left:173px"><strong><?php foreach ($missing['method'] as $value){ if ($value === 'รถโดยสารประจำทาง') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="method" class="overmask" style="font-size:150%;padding-top:947px;padding-left:334px"><strong><?php foreach ($missing['method'] as $value){ if ($value === 'รถจักรยานยนต์') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="method" class="overmask" style="font-size:150%;padding-top:947px;padding-left:463px"><strong><?php foreach ($missing['method'] as $value){ if ($value === 'รถโรงเรียน') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="method" class="overmask" style="font-size:150%;padding-top:972px;padding-left:45px"><strong><?php foreach ($missing['method'] as $value){ if ($value === 'รถยนต์') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="method" class="overmask" style="font-size:150%;padding-top:972px;padding-left:173px"><strong><?php foreach ($missing['method'] as $value){ if ($value === 'รถจักรยาน') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="method" class="overmask" style="font-size:150%;padding-top:972px;padding-left:334px"><strong><?php foreach ($missing['method'] as $value){ if ($value === 'เดิน') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="method" class="overmask" style="font-size:150%;padding-top:972px;padding-left:463px"><strong><?php foreach ($missing['method'] as $value){ if ($value === 'อื่นๆ') { echo "/"; } else { echo ""; }} ?></strong></div>

<div style="font-size:16pt;line-height:26px;">
<div style="padding-top:40px;">
<div style="margin-left:40px;">
ความสัมพันธ์ของสมาชิกในครอบครัว
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;รักใคร่กันดี&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ขัดแย้งทะเลาะกันบางครั้ง&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ขัดแย้งทะเลาะกันบ่อยครั้ง&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ห่างเหิน<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ขัดแย้งและทำร้ายร่างกายบางครั้ง&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ขัดแย้งและทำร้ายร่างกายบ่อยครั้ง&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;อื่นๆ............................<br />
๓.๑ ความสัมพันธ์ระหว่างนักเรียนกับสมาชิกในครอบครัว
<div style="margin-left:20px;margin-right:60px;">
<table class="table table-bordered table-sm table-collapse">
      <tr>
        <td style="border: 1px solid;text-align:center;width:180px;font-size:16pt;height:26px;padding-bottom:-2px">
          สมาชิก
        </td>
        <td style="border: 1px solid;text-align:center;font-size:16pt;height:26px;padding-bottom:-2px">
          สนิทสนม
        </td>
        <td style="border: 1px solid;text-align:center;font-size:16pt;height:26px;padding-bottom:-2px">
          เฉยๆ
        </td>
        <td style="border: 1px solid;text-align:center;font-size:16pt;height:26px;padding-bottom:-2px">
          ห่างเหิน
        </td>
        <td style="border: 1px solid;text-align:center;font-size:16pt;height:26px;padding-bottom:-2px">
          ขัดแย้ง
        </td>
      </tr>
      <tr>
        <td style="border: 1px solid;width:180px;font-size:16pt;height:26px;padding-bottom:-2px">
        บิดา
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
        
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
        
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
          
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
          
        </td>
      </tr>
      <tr>
        <td style="border: 1px solid;width:180px;font-size:16pt;height:26px;padding-bottom:-2px">
        มารดา
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
        
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
        
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
          
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
          
        </td>
      </tr>
      <tr>
        <td style="border: 1px solid;width:180px;font-size:16pt;height:26px;padding-bottom:-2px">
        พี่/น้องชาย
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
        
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
        
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
          
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
          
        </td>
      </tr>
      <tr>
        <td style="border: 1px solid;width:180px;font-size:16pt;height:26px;padding-bottom:-2px">
        พี่/น้องสาว
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
        
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
        
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
          
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
          
        </td>
      </tr>
      <tr>
        <td style="border: 1px solid;width:180px;font-size:16pt;height:26px;padding-bottom:-2px">
        ปู่/ย่า/ตา/ยาย
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
        
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
        
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
          
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
          
        </td>
      </tr>
      <tr>
        <td style="border: 1px solid;width:180px;font-size:16pt;height:26px;padding-bottom:-2px">
        ญาติ
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
        
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
        
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
          
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
          
        </td>
      </tr>
      <tr>
        <td style="border: 1px solid;width:180px;font-size:16pt;height:26px;padding-bottom:-2px">
        อื่นๆ.......
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
        
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
        
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
          
        </td>
        <td style="border: 1px solid;font-size:16pt;height:26px;padding-bottom:-2px">
          
        </td>
      </tr>
    </table>
</div>
<dl>
    <dt style="width:200px;">๓.๒ มีเวลาอยู่ร่วมกันกี่ชั่วโมงต่อวัน</dt>
    <dd style="width:400px;"><?php echo empty($missing['beingTogether']) ? "&nbsp;" : $missing['beingTogether']; ?></dd>
</dl>
<dl>
    <dt style="width:330px;">๓.๓ ภาระงานความรับผิดชอบของนักเรียนที่มีต่อครอบครัว</dt>
    <dd style="width:270px;"><?php echo empty($missing['student_responsibility']) ? "&nbsp;" : $missing['student_responsibility']; ?></dd>
</dl>
<dl>
    <dt style="width:200px;">๓.๔ กิจกรรมยามว่างหรืองานอดิเรก</dt>
    <dd style="width:400px;"><?php echo empty($missing['hobby']) ? "&nbsp;" : $missing['hobby']; ?></dd>
</dl>
<dl>
    <dt style="width:350px;">๓.๕ กรณีที่ผู้ปกครองไม่อยู่บ้านฝากเด็กนักเรียนอยู่บ้านกับใคร</dt>
    <dd style="width:250px;"><?php echo empty($missing['whenParentNotHome']) ? "&nbsp;" : $missing['whenParentNotHome']; ?></dd>
</dl>
<div style="margin-left:-20px;">
<dl>
    <dt style="width:210px;">๔. รายได้เฉลี่ยของครอบครัวต่อเดือน</dt>
    <dd style="width:100px;"><?php echo empty($VisitInfoPersonal['income']) ? "&nbsp;" : $VisitInfoPersonal['income']; ?></dd>
    <dt style="width:30px;">บาท</dt>
    <dt style="width:150px;">นักเรียนได้รับค่าใช้จ่ายจาก</dt>
    <dd style="width:110px;"><?php echo empty($missing['getLivingCostFrom']) ? "&nbsp;" : $missing['getLivingCostFrom']; ?></dd>
</dl>
</div>
<dl>
    <dt style="width:175px;">นักเรียนทำงานหารายได้ อาชีพ</dt>
    <dd style="width:170px;"><?php echo empty($missing['studentPartTime']) ? "&nbsp;" : $missing['studentPartTime']; ?></dd>
    <dt style="width:70px;">รายได้วันละ</dt>
    <dd style="width:140px;"><?php echo empty($missing['studentPartTimeIncome']) ? "&nbsp;" : $missing['studentPartTimeIncome']; ?></dd>
    <dt style="width:30px;">บาท</dt>
</dl>
<dl>
    <dt style="width:175px;">นักเรียนได้เงินมาโรงเรียนวันละ</dt>
    <dd style="width:120px;"><?php echo empty($missing['studentGetMoney']) ? "&nbsp;" : $missing['studentGetMoney']; ?></dd>
    <dt style="width:30px;">บาท</dt>
</dl>
<div style="margin-left:-10px;">
<p style="margin-left:-10px">๕. พฤติกรรมความเสี่ยง (ตอบได้มากกว่า ๑ ข้อ)</p>
<div style="margin-left:10px;padding-top:-10px;">
<p style="margin-left:20px;padding-bottom:-10px;">๕.๑ สุขภาพ</p>
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ร่างกายไม่แข็งแรง&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;มีโรคประจำตัวหรือเจ็บป่วยบ่อย&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;มีภาวะทุพโภชนาการ<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ป่วยเป็นโรคร้ายแรง/เรื้อรัง&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;สมรรถภาพทางกายต่ำ
<p style="margin-left:20px;padding-bottom:-10px;">๕.๒ สวัสดิการหรือความปลอดภัย (ตอบได้มากกว่า ๑ ข้อ)</p>
<div class="col-1" style="width:58%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;พ่อแม่แยกทางกันหรือแต่งงานใหม่<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;มีบุคคลในครอบครัวเจ็บป่วยด้วยโรคร้ายแรง/เรื้อรัง/ติดต่อ<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;บุคคลในครอบครัวเล่นการพนัน<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ความขัดแย้งและมีการใช้ความรุนแรงในครอบครัว<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ถูกทารุณ/ทำร้ายจากบุคคลในครอบครัว/เพื่อนบ้าน<br />
</div>
<div class="col-1" style="width:39%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;เล่นการพนัน<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;บุคคลในครอบครัวติดสารเสพติด<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;มีความขัดแย้ง/ทะเลาะกันในครอบครัว<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ไม่มีผู้ดูแล<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ถูกล่วงละเมิดทางเพศ
</div>
<div style="margin-left:20px">
<dl>
    <dt style="width:215px;">๕.๓ ระยะทางระหว่างบ้านไปโรงเรียน</dt>
    <dd style="width:60px;"><?php echo empty($VisitInfoTransport['distance']) ? "&nbsp;" : $VisitInfoTransport['distance']; ?></dd>
    <dt style="width:145px;">กิโลเมตร ใช้เวลาเดินทาง</dt>
    <dd style="width:50px;"><?php echo empty($travel) ? "&nbsp;" : $travel; ?></dd>
    <dt style="width:30px;">นาที</dt>
</dl>
</div>
<p style="margin-left:20px;padding-bottom:-10px;">๕.๔ การเดินทางของนักเรียน (ตอบได้มากกว่า ๑ ข้อ)</p>
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ผู้ปกครองมาส่ง&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;รถโดยสารประจำทาง&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;รถจักรยานยนต์&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;รถโรงเรียน<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;รถยนต์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;รถจักรยาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;เดิน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;อื่นๆ.....................
</div>
</div>
</div>
</div>
</div>

<pagebreak />

<div style="font-size:16pt;line-height:26px;">
<div style="padding-top:20px;">
<div style="margin-left:40px;margin-right:10px">
<p style="margin-left:20px;padding-bottom:-10px;">๕.๕ ภาระงานความรับผิดชอบของนักเรียนที่มีต่อครอบครัว (ตอบได้มากกว่า ๑ ข้อ)</p>
<div class="col-1" style="width:45%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ช่วยงานบ้าน<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ช่วยค้าขายเล็กๆน้อยๆ<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ช่วยงานในนาไร่
</div>
<div class="col-1" style="width:55%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ช่วยดูแลคนเจ็บป่วย/พิการ<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ทำงานพิเศษแถวบ้าน<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;อื่นๆ.........................................................
</div>
<p style="margin-left:20px;padding-bottom:-10px;">๕.๖ กิจกรรมยามว่างหรืองานอดิเรก (ตอบได้มากกว่า ๑ ข้อ)</p>
<div class="col-1" style="width:45%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ดูทีวี/ฟังเพลง<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;อ่านหนังสือ<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;แว้น/สก๊อย<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ไปสวนสาธารณะ<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;อื่นๆ.........................................................
</div>
<div class="col-1" style="width:55%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ไปเที่ยวห้าง/ดูหนัง<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ไปหาเพื่อน/เพื่อน<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;เล่นเกม คอมพิวเตอร์/มือถือ<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;เล่นดนตรี
</div>
<p style="margin-left:20px;padding-bottom:-10px;">๕.๗ พฤติกรรมการใช้สารเสพติด (ตอบได้มากกว่า ๑ ข้อ)</p>
<div class="col-1" style="width:45%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;คบเพื่อนในกลุ่มที่ใช้สารเสพติด<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;อยู่ในสภาพแวดล้อมที่ใช้สารเสพติด<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;เป็นผู้ติดบุหรี่ สุรา หรือการใช้สารเสพติดอื่นๆ
</div>
<div class="col-1" style="width:55%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;สมาชิกในครอบครัวข้องเกี่ยวกับสารเสพติด<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ปัจจุบันเกี่ยวข้องกับสารเสพติด
</div>
<p style="margin-left:20px;padding-bottom:-10px;">๕.๘ พฤติกรรมการใช้ความรุนแรง (ตอบได้มากกว่า ๑ ข้อ)</p>
<div class="col-1" style="width:33%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;มีการทะเลาะวิวาท<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ทำร้ายร่างกายผู้อื่น
</div>
<div class="col-1" style="width:33%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ก้าวร้าว เกเร<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ทำร้ายร่างกายตนเอง
</div>
<div class="col-1" style="width:34%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ทะเลาะวิวาทเป็นประจำ<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;อื่นๆ....................................
</div>
<p style="margin-left:20px;padding-bottom:-10px;">๕.๙ พฤติกรรมทางเพศ (ตอบได้มากกว่า ๑ ข้อ)</p>
<div class="col-1" style="width:30%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;อยู่ในกลุ่มขายบริการ<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ขายบริการทางเพศ<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;มีการมั่วสุมทางเพศ
</div>
<div class="col-1" style="width:70%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ใช้เครื่องมือสื่อสารที่เกี่ยวข้องกับด้านเพศเป็นเวลานานและบ่อยครั้ง<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;หมกมุ่นในการใช้เครื่องมือสื่อสารที่เกี่ยวข้องทางเพศ<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ตั้งครรภ์
</div>
<p style="margin-left:20px;padding-bottom:-10px;">๕.๑๐ การติดเกม (ตอบได้มากกว่า ๑ ข้อ)</p>
<div class="col-1" style="width:47%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;เล่นเกมเกินวันละ ๑ ชั่วโมง<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;เก็บตัว แยกตัวจากกลุ่มเพื่อน<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;อยู่ในกลุ่มเพื่อนติดเกม<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;เล่นเกมเกินวันละ ๒ ชั่วโมง<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ใช้เงินสิ้นเปลือง โกหก ลักขโมยเงินเพื่อเล่นเกม
</div>
<div class="col-1" style="width:53%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ขาดจินตนาการและความคิดสร้างสรรค์<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ใช่จ่ายเงินผิดปกติ<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ร้านเกมอยู่ใกล้บ้านหรือโรงเรียน<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;หมกมุ่น จริงจังในการเล่นเกม<br />
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;อื่นๆ.........................................................
</div>
<p style="margin-left:20px;padding-bottom:-10px;">๕.๑๑ การเข้าถึงสื่อคอมพิวเตอร์และอินเตอร์เน็ตได้จากที่อยู่อาศัย</p>
<div class="col-1" style="width:46%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;สามารถเข้าถึงอินเตอร์เน็ตได้จากที่อยู่อาศัย
</div>
<div class="col-1" style="width:54%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ไม่สามารถเข้าถึงอินเตอร์เน็ตได้จากที่อยู่อาศัย
</div>
<p style="margin-left:20px;padding-bottom:-10px;">๕.๑๒ การใช้เครื่องมือสื่อสารอิเล็กทรอนิกส์</p>
<div class="col-1" style="width:46%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ใช้โซเชียลมีเดีย/เกม (ไม่เกินวันละ ๓ ชั่วโมง)
</div>
<div class="col-1" style="width:54%;float:left;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ใช้โซเชียลมีเดีย/เกม (วันละ ๓ ชั่วโมงขึ้นไป)
</div>
</div>
<p style="margin-left:20px">๖. ข้อห่วงใยของผู้ปกครองที่มีต่อนักเรียน</p>
<p style="margin-left:20px">........................................................................................................................................................................................</p>
<p style="margin-left:20px">........................................................................................................................................................................................</p>
</div>
</div>

<div id="student_responsibilityChoice" class="overmask" style="font-size:150%;padding-top:-888px;padding-left:45px;"><strong><?php foreach ($missing['student_responsibilityChoice'] as $value){ if ($value === 'ช่วยงานบ้าน') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="student_responsibilityChoice" class="overmask" style="font-size:150%;padding-top:-862px;padding-left:45px;"><strong><?php foreach ($missing['student_responsibilityChoice'] as $value){ if ($value === 'ช่วยค้าขายเล็กๆน้อยๆ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="student_responsibilityChoice" class="overmask" style="font-size:150%;padding-top:-836px;padding-left:45px;"><strong><?php foreach ($missing['student_responsibilityChoice'] as $value){ if ($value === 'ช่วยงานในนาไร่') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="student_responsibilityChoice" class="overmask" style="font-size:150%;padding-top:-888px;padding-left:325px;"><strong><?php foreach ($missing['student_responsibilityChoice'] as $value){ if ($value === 'ช่วยดูแลคนเจ็บป่วย/พิการ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="student_responsibilityChoice" class="overmask" style="font-size:150%;padding-top:-862px;padding-left:325px;"><strong><?php foreach ($missing['student_responsibilityChoice'] as $value){ if ($value === 'ทำงานพิเศษแถวบ้าน') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="student_responsibilityChoice" class="overmask" style="font-size:150%;padding-top:-836px;padding-left:325px;"><strong><?php foreach ($missing['student_responsibilityChoice'] as $value){ if ($value === 'อื่นๆ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="hobbyChoice" class="overmask" style="font-size:150%;padding-top:-783px;padding-left:45px;"><strong><?php foreach ($missing['hobbyChoice'] as $value){ if ($value === 'ดูทีวี/ฟังเพลง') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="hobbyChoice" class="overmask" style="font-size:150%;padding-top:-756px;padding-left:45px;"><strong><?php foreach ($missing['hobbyChoice'] as $value){ if ($value === 'อ่านหนังสือ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="hobbyChoice" class="overmask" style="font-size:150%;padding-top:-730px;padding-left:45px;"><strong><?php foreach ($missing['hobbyChoice'] as $value){ if ($value === 'แว้น/สก๊อย') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="hobbyChoice" class="overmask" style="font-size:150%;padding-top:-704px;padding-left:45px;"><strong><?php foreach ($missing['hobbyChoice'] as $value){ if ($value === 'ไปสวนสาธารณะ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="hobbyChoice" class="overmask" style="font-size:150%;padding-top:-678px;padding-left:45px;"><strong><?php foreach ($missing['hobbyChoice'] as $value){ if ($value === 'อื่นๆ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="hobbyChoice" class="overmask" style="font-size:150%;padding-top:-783pxpx;padding-left:325px;"><strong><?php foreach ($missing['hobbyChoice'] as $value){ if ($value === 'ไปเที่ยวห้าง/ดูหนัง') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="hobbyChoice" class="overmask" style="font-size:150%;padding-top:-756pxpx;padding-left:325px;"><strong><?php foreach ($missing['hobbyChoice'] as $value){ if ($value === 'ไปหาเพื่อน/เพื่อน') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="hobbyChoice" class="overmask" style="font-size:150%;padding-top:-730pxpx;padding-left:325px;"><strong><?php foreach ($missing['hobbyChoice'] as $value){ if ($value === 'เล่นเกม คอมพิวเตอร์/มือถือ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="hobbyChoice" class="overmask" style="font-size:150%;padding-top:-704pxpx;padding-left:325px;"><strong><?php foreach ($missing['hobbyChoice'] as $value){ if ($value === 'เล่นดนตรี') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="drugBehavior" class="overmask" style="font-size:150%;padding-top:-626px;padding-left:45px;"><strong><?php foreach ($missing['drugBehavior'] as $value){ if ($value === 'คบเพื่อนในกลุ่มที่ใช้สารเสพติด') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="drugBehavior" class="overmask" style="font-size:150%;padding-top:-600px;padding-left:45px;"><strong><?php foreach ($missing['drugBehavior'] as $value){ if ($value === 'อยู่ในสภาพแวดล้อมที่ใช้สารเสพติด') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="drugBehavior" class="overmask" style="font-size:150%;padding-top:-574px;padding-left:45px;"><strong><?php foreach ($missing['drugBehavior'] as $value){ if ($value === 'เป็นผู้ติดบุหรี่ สุรา หรือการใช้สารเสพติดอื่นๆ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="drugBehavior" class="overmask" style="font-size:150%;padding-top:-626px;padding-left:325px;"><strong><?php foreach ($missing['drugBehavior'] as $value){ if ($value === 'สมาชิกในครอบครัวข้องเกี่ยวกับสารเสพติด') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="drugBehavior" class="overmask" style="font-size:150%;padding-top:-600px;padding-left:325px;"><strong><?php foreach ($missing['drugBehavior'] as $value){ if ($value === 'ปัจจุบันเกี่ยวข้องกับสารเสพติด') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentViolent" class="overmask" style="font-size:150%;padding-top:-523px;padding-left:45px;"><strong><?php foreach ($missing['studentViolent'] as $value){ if ($value === 'มีการทะเลาะวิวาท') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentViolent" class="overmask" style="font-size:150%;padding-top:-523px;padding-left:252px;"><strong><?php foreach ($missing['studentViolent'] as $value){ if ($value === 'ก้าวร้าว เกเร') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentViolent" class="overmask" style="font-size:150%;padding-top:-523px;padding-left:458px;"><strong><?php foreach ($missing['studentViolent'] as $value){ if ($value === 'ทะเลาะวิวาทเป็นประจำ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentViolent" class="overmask" style="font-size:150%;padding-top:-498px;padding-left:45px;"><strong><?php foreach ($missing['studentViolent'] as $value){ if ($value === 'ทำร้ายร่างกายผู้อื่น') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentViolent" class="overmask" style="font-size:150%;padding-top:-498px;padding-left:252px;"><strong><?php foreach ($missing['studentViolent'] as $value){ if ($value === 'ทำร้ายร่างกายตนเอง') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="studentViolent" class="overmask" style="font-size:150%;padding-top:-498px;padding-left:458px;"><strong><?php foreach ($missing['studentViolent'] as $value){ if ($value === 'อื่นๆ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="sexualBehavior" class="overmask" style="font-size:150%;padding-top:-445px;padding-left:45px;"><strong><?php foreach ($missing['sexualBehavior'] as $value){ if ($value === 'อยู่ในกลุ่มขายบริการ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="sexualBehavior" class="overmask" style="font-size:150%;padding-top:-420px;padding-left:45px;"><strong><?php foreach ($missing['sexualBehavior'] as $value){ if ($value === 'ขายบริการทางเพศ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="sexualBehavior" class="overmask" style="font-size:150%;padding-top:-395px;padding-left:45px;"><strong><?php foreach ($missing['sexualBehavior'] as $value){ if ($value === 'มีการมั่วสุมทางเพศ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="sexualBehavior" class="overmask" style="font-size:150%;padding-top:-445px;padding-left:232px;"><strong><?php foreach ($missing['sexualBehavior'] as $value){ if ($value === 'ใช้เครื่องมือสื่อสารที่เกี่ยวข้องกับด้านเพศเป็นเวลานานและบ่อยครั้ง') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="sexualBehavior" class="overmask" style="font-size:150%;padding-top:-420px;padding-left:232px;"><strong><?php foreach ($missing['sexualBehavior'] as $value){ if ($value === 'หมกมุ่นในการใช้เครื่องมือสื่อสารที่เกี่ยวข้องทางเพศ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="sexualBehavior" class="overmask" style="font-size:150%;padding-top:-395px;padding-left:232px;"><strong><?php foreach ($missing['sexualBehavior'] as $value){ if ($value === 'ตั้งครรภ์') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="gameAddictive" class="overmask" style="font-size:150%;padding-top:-340px;padding-left:45px;"><strong><?php foreach ($missing['gameAddictive'] as $value){ if ($value === 'เล่นเกมเกินวันละ 1 ชั่วโมง') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="gameAddictive" class="overmask" style="font-size:150%;padding-top:-315px;padding-left:45px;"><strong><?php foreach ($missing['gameAddictive'] as $value){ if ($value === 'เก็บตัว แยกตัวจากกลุ่มเพื่อน') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="gameAddictive" class="overmask" style="font-size:150%;padding-top:-290px;padding-left:45px;"><strong><?php foreach ($missing['gameAddictive'] as $value){ if ($value === 'อยู่ในกลุ่มเพื่อนติดเกม') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="gameAddictive" class="overmask" style="font-size:150%;padding-top:-264px;padding-left:45px;"><strong><?php foreach ($missing['gameAddictive'] as $value){ if ($value === 'เล่นเกมเกินวันละ 2 ชั่วโมง') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="gameAddictive" class="overmask" style="font-size:150%;padding-top:-239px;padding-left:45px;"><strong><?php foreach ($missing['gameAddictive'] as $value){ if ($value === 'ใช้เงินสิ้นเปลือง โกหก ลักขโมยเงินเพื่อเล่นเกม') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="gameAddictive" class="overmask" style="font-size:150%;padding-top:-340px;padding-left:339px;"><strong><?php foreach ($missing['gameAddictive'] as $value){ if ($value === 'ขาดจินตนาการและความคิดสร้างสรรค์') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="gameAddictive" class="overmask" style="font-size:150%;padding-top:-315px;padding-left:339px;"><strong><?php foreach ($missing['gameAddictive'] as $value){ if ($value === 'ใช่จ่ายเงินผิดปกติ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="gameAddictive" class="overmask" style="font-size:150%;padding-top:-290px;padding-left:339px;"><strong><?php foreach ($missing['gameAddictive'] as $value){ if ($value === 'ร้านเกมอยู่ใกล้บ้านหรือโรงเรียน') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="gameAddictive" class="overmask" style="font-size:150%;padding-top:-264px;padding-left:339px;"><strong><?php foreach ($missing['gameAddictive'] as $value){ if ($value === 'หมกมุ่น จริงจังในการเล่นเกม') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="gameAddictive" class="overmask" style="font-size:150%;padding-top:-239px;padding-left:339px;"><strong><?php foreach ($missing['gameAddictive'] as $value){ if ($value === 'อื่นๆ') { echo "/"; } else { echo ""; }} ?></strong></div>
<div id="computerInternetAccessible" class="overmask" style="font-size:150%;padding-top:-185px;padding-left:45px"><strong><?php echo $missing['computerInternetAccessible'] === true ? "/" : "" ?></strong></div>
<div id="computerInternetAccessible" class="overmask" style="font-size:150%;padding-top:-185px;padding-left:333px"><strong><?php echo $missing['computerInternetAccessible'] === false ? "/" : "" ?></strong></div>
<div id="socialMediaAddictive" class="overmask" style="font-size:150%;padding-top:-133px;padding-left:45px"><strong><?php echo $missing['socialMediaAddictive'] === 'ใช้โซเชียลมีเดีย/เกม (ไม่เกินวันละ 3 ชั่วโมง)' ? "/" : "" ?></strong></div>
<div id="socialMediaAddictive" class="overmask" style="font-size:150%;padding-top:-133px;padding-left:333px"><strong><?php echo $missing['socialMediaAddictive'] === 'ใช้โซเชียลมีเดีย/เกม (วันละ 3 ชั่วโมงขึ้นไป)' ? "/" : "" ?></strong></div>

<pagebreak />

<div id="assist" class="overmask" style="font-size:150%;padding-top:45px;padding-left:45px"><strong><?php echo $missing['assist'] === 'ด้านการเรียน' ? "/" : "" ?></strong></div>
<div id="assist" class="overmask" style="font-size:150%;padding-top:45px;padding-left:162px"><strong><?php echo $missing['assist'] === 'ด้านพฤติกรรม' ? "/" : "" ?></strong></div>
<div id="assist" class="overmask" style="font-size:150%;padding-top:45px;padding-left:285px"><strong><?php echo $missing['assist'] === 'ด้านเศรษฐกิจ' ? "/" : "" ?></strong></div>
<div id="need_assist" class="overmask" style="font-size:150%;padding-top:175px;padding-left:45px"><strong><?php echo $missing['need_assist'] === 'มากที่สุด' ? "/" : "" ?></strong></div>
<div id="need_assist" class="overmask" style="font-size:150%;padding-top:175px;padding-left:137px"><strong><?php echo $missing['need_assist'] === 'มาก' ? "/" : "" ?></strong></div>
<div id="need_assist" class="overmask" style="font-size:150%;padding-top:175px;padding-left:204px"><strong><?php echo $missing['need_assist'] === 'ปานกลาง' ? "/" : "" ?></strong></div>
<div id="need_assist" class="overmask" style="font-size:150%;padding-top:175px;padding-left:300px"><strong><?php echo $missing['need_assist'] === 'น้อย' ? "/" : "" ?></strong></div>
<div id="need_assist" class="overmask" style="font-size:150%;padding-top:175px;padding-left:368px"><strong><?php echo $missing['need_assist'] === 'ไม่จำเป็น' ? "/" : "" ?></strong></div>
<div style="font-size:16pt;line-height:26px;margin-left:30px">
<div style="padding-top:20px;">
<p style="margin-left:-10px;padding-bottom:-10px;">๗. สิ่งที่ผู้ปกครองต้องการให้โรงเรียนช่วยเหลือนักเรียน</p>
<div style="margin-left:10px;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ด้านการเรียน&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ด้านพฤติกรรม&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ด้านเศรษฐกิจ (เช่น ขอรับทุน) อื่นๆ.................................................
<p style="padding-top:5px;">......................................................................................................................................................................................</p>
<p>......................................................................................................................................................................................</p>
</div>

<p style="margin-left:-10px;padding-bottom:-10px;">๘. ความช่วยเหลือที่ครอบครัวเคยได้รับจากหน่วยงานหรือต้องการได้รับการช่วยเหลือ</p>
<div style="margin-left:10px;">
<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;มากที่สุด&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;มาก&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ปานกลาง&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;น้อย&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#9723;</span>&nbsp;&nbsp;ไม่จำเป็น
<p style="padding-top:5px;">......................................................................................................................................................................................</p>
<p>......................................................................................................................................................................................</p>
</div>
<p style="text-align:center;">******************************<br /><br />วันที่บันทึกข้อมูล............/............/............<br /><br /><br />
ผู้ให้ข้อมูลนักเรียน....................................................<br />เกี่ยวข้องกับนักเรียนเป็น (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br /><br /><br />
ผู้บันทึกข้อมูลนักเรียน....................................................<br />(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br />
ตำแหน่ง/หน้าที่...................................................................</p>
</div>

</div>
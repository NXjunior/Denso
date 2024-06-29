<?php

use PhpParser\Node\Stmt\TraitUseAdaptation\Alias;
use yii\helpers\Html;




$Datetime = $model['date'];
$timestamp = strtotime($Datetime);
$thaiYear = date('Y', $timestamp) + 543;
$formattedDatetime = Yii::$app->date->date('j F', $timestamp) . ' ' . $thaiYear;

$Hour = $model['time'];
$timestamp = strtotime($Hour);
$formattedHour = Yii::$app->date->date('H:i น.', $timestamp);

class VisitInfo
{
    public $social;
    public $residences;
    public $traveling;
    public $residential_house;
    public $residential_clean;
    public $residential_utilities;
    public $residential_specify;
    public $family_same_parents;
    public $family_different_parents;
    public $family_assistances;
    public $family_relationship;
    public $family_not_home;
    public $family_income;
    public $risk_health;
    public $risk_welfare;
    public $risk_hobbys;
    public $risk_drugs;
    public $risk_assualt;
    public $risk_sexual;
    public $risk_games;
    public $risk_com_internet;
    public $risk_phone;
    public $parental_concern;
    public $parental_requests_school;
    public $parental_requests_organization;
    public $risk_responsibility;
    public $informant;
    public $family_member;
    public $family_time_together;
    public $family_closeness;
}
$visitInfo67 = new VisitInfo();

$visitInfo67->social = [
    "line" => "lineeeeeeeee",
    "facebook" => "facebookkkkkkkkkk"
];

$visitInfo67->residences = [
    "own_house" => false,
    "rented_house" => true,
    "others_house" => false,
    "relatives_house" => false,
    "rented_dormitory_with" => "sad;vij;dsoicj",
    "other" => null
];

$visitInfo67->traveling = [
    "parent" => true,
    "self" => false,
    "scholl_bus" => false,
    "bus" => false,
    "private_car" => true,
    "private_bike" => true,
    "bike" => false,
    "walk" => true,
    "other" => ""
];

$visitInfo67->residential_house = [
    "good" => true,
    "fair" => false,
    "dilapidated" => false,
    "narrow" => false,
    "no_private_space" => false
];
$visitInfo67->residential_clean = [
    "good" => true,
    "fair" => false,
    "bad" => false,
    "other" => ""
];
$visitInfo67->residential_utilities = [
    "electricity" => true,
    "water_consumption" => true,
    "toilet" => true
];
$visitInfo67->residential_specify = ""; //ยังไม่ทำ
$visitInfo67->family_member = [
    "men" => 1,
    "women" => 2
];
$visitInfo67->family_same_parents = [
    "son" => 3,
    "daughter" => 4
];
$visitInfo67->family_different_parents = [
    "son" => 5,
    "daughter" => 6
];
$visitInfo67->family_assistances = [
    "sum" => 2
];
$visitInfo67->family_relationship = [
    "harmonious" => true,
    "occasional_conflict" => false,
    "frequent_conflict" => false,
    "distant" => false,
    "occasional_assualt" => false,
    "frequent_assualt" => false,
    "other" => ""
];
$visitInfo67->family_closeness = [
    "dad" => 20,
    "mom" => 10,
    "brother" => 10,
    "sister" => 0,
    "grandf_m" => -1,
    "relative" => 0,
    "other" => 10
];
// "สนิทสนม": 20
// "เฉยๆ": 10
// "ห่างเหิน": 0
// "ขัดแย้ง": -1
$visitInfo67->family_time_together = "2.10";
$visitInfo67->family_not_home = "พ่อแม่ไม่อยู่ฝากเด็กไว้กับใคร";
$visitInfo67->family_income = [
    "parent_income" => 50000,
    "student_income_with" => "ได้เงินจาก",
    "student_income_career" => "เด็กทำงานอะไร",
    "student_income_per_day" => 300,
    "student_school_per_day" => 100
];
$visitInfo67->risk_health = [
    "bad_health" => true,
    "congenital" => false,
    "malnutrition" => false,
    "chronically_ill" => true,
    "low_physical" => false
];
$visitInfo67->risk_welfare = [
    "parent_separated" => false,
    "gambling" => false,
    "fam_has_illness" => true,
    "fam_addicted_drugs" => false,
    "fam_addicted_gambling" => true,
    "fam_conflict" => false,
    "fam_assualt" => true,
    "no_caregiver" => true,
    "abused" => false,
    "sexual_harassment" => true
];
$visitInfo67->risk_responsibility = [
    "housework" => true,
    "intensive_care" => false,
    "trade" => true,
    "parttime" => true,
    "agriculture" => false,
    "other" => "dsa"
];
$visitInfo67->risk_hobbys = [
    "talevision" => true,
    "mall" => true,
    "book" => true,
    "friend" => true,
    "motopunk" => false,
    "game" => true,
    "park" => false,
    "music" => true,
    "other" => ""
];
$visitInfo67->risk_drugs = [
    "friend_use" => true,
    "fam_use" => true,
    "env_use" => true,
    "current_use" => true,
    "drug_addict" => true
];
$visitInfo67->risk_assualt = [
    "quarrel_sometimes" => true,
    "quarrel_regular" => false,
    "aggressive" => true,
    "harm_others" => true,
    "harm_self" => false,
    "other" => ""
];
$visitInfo67->risk_sexual = [
    "prostitution" => true,
    "long_term_sexual_commu" => false,
    "sexual_services" => true,
    "obsessed_sexual_media" => false,
    "sexual_group_activity" => true,
    "pregnancy" => false
];
$visitInfo67->risk_games = [
    "plays_than_1hr" => true,
    "lacks_creativity" => false,
    "isolated" => true,
    "abnormal_spending" => false,
    "friends_game_addicts" => true,
    "gamestore_near_home" => false,
    "plays_than_2hr" => true,
    "obsessed_game" => false,
    "misbehaves_for_games" => true,
    "other" => ""
];
$visitInfo67->risk_com_internet = false;
$visitInfo67->risk_phone = "เกิน 3 ชม";
$visitInfo67->parental_concern = "ความห่วงใยของผปค.ถึงนร.fdsak;vlfmvkl;aerv;kljerjkq;kejr;ofwejfdo;mcdowEkcmoerivo[coweif;oermvoevoovwe;oicoewicoecvoeivoeinneovioiewvcoieavev'qweoimfcoiqwemco[iqewnv[oievoiwev[owief[oiecdojW[fjc[ewofjioejcoisDJ[cpidjsv[iopcji[orjv[e'orjv'[oiejmc[ioasdj[cjdsocm'owicm[o'erijv[ioj[iojk";

$visitInfo67->parental_requests_school = [
    "academic_support" => false,
    "behavioral_support" => false,
    "economic_support" => false,
    "other" => false,
    "details" => ""
];
$visitInfo67->parental_requests_organization = [
    "priority" => 40,
    "detail" => ""
];
// "most": 40
// "very": 30
// "mid": 20
// "less": 10
// "not": 0
$visitInfo67->informant = [
    "name" => "",
    "relation" => ""
];




?>

<div style="font-size:14pt;line-height:23px;padding-top:0px">

    <div class="row" style="width: 100%;">
        <div class="col-xs-3" style="border: 2px solid white;"></div>
        <div class="col-xs-3" style="border: 2px solid black;border-radius:7px;text-align:center;padding:8px 0">
            แบบบันทึกการเยี่ยมบ้าน
        </div>
        <div class="col-xs-3" style="border: 2px solid white;"></div>
    </div>
    <br>
    <dl>
        <div>
            <dt style="width:75px;">ชื่อ - นามสกุล</dt>
            <dd style="width:360px;"><?php echo $visit->studentInfo->fullName; ?></dd>
            <dt style="width:40px">ชื่อเล่น</dt>
            <dd style="width:175px;"><?php echo $visit->studentInfo["nickname"]; ?></dd>
        </div>

        <div>
            <dt style="width:35px;">ชั้น </dt>
            <dd style="width:50px;"><?php echo $classroomName; ?></dd>
            <dt style="width:33px;">เลขที่</dt>
            <dd style="width:50px;"><?php echo $studentOrderNumber; ?></dd>
            <dt style="width:42px;">id line</dt>
            <dd style="width:165px;"><?php echo isset($visitInfo67->social['line']) ? $visitInfo67->social['line'] : "&nbsp;" ?></dd>
            <dt style="width:58px;">facebook</dt>
            <dd style="width:199px;"><?php echo isset($visitInfo67->social['facebook']) ? $visitInfo67->social['facebook'] : "&nbsp;" ?></dd>
        </div>
        <div>
            <dt style="width: 180px;">สถานะการเยี่ยม : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: fontawesome; font-size:80%;">&#xf14a;</span> เยี่ยมแล้ว</dt>
            <dt style="width: 35px;">ครั้งที่</dt>
            <dd style="width:63px;"><?php echo isset($missing['student_no']) ? "&nbsp;" : $missing['student_no']; ?></dd>
            <dt style="width: 60px;">ภาคเรียนที่</dt>
            <dd style="width:73px;"><?php echo isset($missing['student_no']) ? "&nbsp;" : $missing['student_no']; ?></dd>
            <dt style="width: 88px;"><span style="font-family: fontawesome; font-size:80%;">&#9723;</span> ยังไม่ได้เยี่ยม</dt>
            <dd style="width: 132px;">-</dd>
        </div>
        <dt style="width:700px"><strong>ข้อมูลจากการสังเกตุและสอบถาม :</strong> ให้ทำเครื่องหมาย <span style="font-family: fontawesome; font-size:80%;">&#10003;</span> ถูกในช่องสีเหลี่ยม</dt>
        <dt style="width:max-content;"><strong>บ้านที่พักอาศัย</strong></dt>

        <div style="padding-left: 25px;">
            <dt>๑. บ้านที่อาศัย</dt>
            <div class="row">
                <div class="col-xs-2"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residences["own_house"] ? "&#xf14a;" : "&#9723;"; ?></span> บ้านของตัวเอง</div>
                <div class="col-xs-2"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residences["rented_house"] ? "&#xf14a;" : "&#9723;"; ?></span> บ้านเช่า</div>
                <div class="col-xs-2"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residences["others_house"] ? "&#xf14a;" : "&#9723;"; ?></span> อาศัยกับผู้อื่น</div>
                <div class="col-xs-2"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residences["relatives_house"] ? "&#xf14a;" : "&#9723;"; ?></span> บ้านญาติ</div>
                <div class="col-xs-9">
                    <dt style="width: 112px;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residences["rented_dormitory_with"] ? "&#xf14a;" : "&#9723;"; ?></span> หอพักอาศัยอยู่กับ</dt>
                    <dd style="width: 338px;"><?php echo $visitInfo67->residences["rented_dormitory_with"] ? $visitInfo67->residences["rented_dormitory_with"] : "-"; ?></dd>
                </div>
                <div class="col-xs-9">
                    <dt style="width: 112px;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residences["other"] ? "&#xf14a;" : "&#9723;"; ?></span> อื่นๆ</dt>
                    <dd style="width: 338px;"><?php echo $visitInfo67->residences["other"] ? $visitInfo67->residences["other"] : "-"; ?></dd>
                </div>
            </div>
            <div>
                <dt style="width: 220px;">๒. ระยะทางระหว่างบ้านไปโรงเรียนไป/กลับ</dt>
                <dd style="width: 100px;">-</dd>
                <dt style="width: 55px;">กิโลเมตร</dt>
                <dt style="width: 80px;">ใช้เวลาเดินทาง</dt>
                <dd style="width: 117px">-</dd>
                <dt style="width: 40px">ชั่วโมง</dt>
            </div>
            <dt style="width: max-content;">๓. การเดินทางของนักเรียนไปโรงเรียน</dt>
            <div class="row">
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->traveling["parent"] ? "&#xf14a;" : "&#9723;"; ?></span> ผู้ปกครองมาส่ง</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->traveling["self"] ? "&#xf14a;" : "&#9723;"; ?></span> เดินทางมาเอง</div>
            </div>
            <div class="row">
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->traveling["scholl_bus"] ? "&#xf14a;" : "&#9723;"; ?></span> รถโรงเรียน</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->traveling["bus"] ? "&#xf14a;" : "&#9723;"; ?></span> รถโดยสารประจำทาง</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->traveling["private_car"] ? "&#xf14a;" : "&#9723;"; ?></span> รถยนต์ส่วนตัว</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->traveling["private_bike"] ? "&#xf14a;" : "&#9723;"; ?></span> รถจักรยานยนต์</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->traveling["bike"] ? "&#xf14a;" : "&#9723;"; ?></span> รถจักรยาน</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->traveling["walk"] ? "&#xf14a;" : "&#9723;"; ?></span> เดิน</div>
            </div>
            <div>
                <dt style="width: 45px;padding-left:65px"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->traveling["other"] ? "&#xf14a;" : "&#9723;"; ?></span> อื่นๆ</dt>
                <dd style="width: 415px;;"><?php echo $visitInfo67->traveling["other"] ? $visitInfo67->traveling["other"] : "-"; ?></dd>
            </div>
            <dt style="width: max-content">๔. สภาพแวดล้อมที่อยู่อาศัย</dt>
            <dt style="width: max-content;padding-left:20px">๔.๑ สภาพตัวบ้าน</dt>
            <div class="row">
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residential_house["good"] ? "&#xf14a;" : "&#9723;"; ?></span> ดี</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residential_house["fair"] ? "&#xf14a;" : "&#9723;"; ?></span> พอใช้</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residential_house["dilapidated"] ? "&#xf14a;" : "&#9723;"; ?></span> เก่าทรุดโทรม</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residential_house["narrow"] ? "&#xf14a;" : "&#9723;"; ?></span> พื้นที่คับแคบ</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residential_house["no_private_space"] ? "&#xf14a;" : "&#9723;"; ?></span> ไม่มีความเป็นสัดส่วน</div>
            </div>
            <dt style="width: max-content;padding-left:20px">๔.๒ ความสะอาด</dt>
            <div class="row">
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residential_clean["good"] ? "&#xf14a;" : "&#9723;"; ?></span> สะอาดมีระเบียบ</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residential_clean["fair"] ? "&#xf14a;" : "&#9723;"; ?></span> ไม่ค่อยสะอาด</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residential_clean["bad"] ? "&#xf14a;" : "&#9723;"; ?></span> สกปรกไม่มีระเบียบ</div>
                <br>
                <dt style="width: 45px;padding-left:4.5px"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residential_clean["other"] ? "&#xf14a;" : "&#9723;"; ?></span> อื่นๆ</dt>
                <dd style="width: 415px;"><?php echo $visitInfo67->residential_clean["other"] ? $visitInfo67->residential_clean["other"] : "-"; ?></dd>
            </div>
            <dt style="width: max-content;padding-left:20px">๔.๓ สาธารณูปโภค</dt>
            <div class="row">
                <div class="col-xs-3">ไฟฟ้า</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residential_utilities["electricity"] ? "&#xf14a;" : "&#9723;" ?></span> มี</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo !$visitInfo67->residential_utilities["electricity"] ? "&#xf14a;" : "&#9723;"; ?></span> ไม่มี</div>
            </div>
            <div class="row">
                <div class="col-xs-3">น้ำเพื่อให้อุปโภค/บริโภค</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residential_utilities["water_consumption"] ? "&#xf14a;" : "&#9723;" ?></span> มี</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo !$visitInfo67->residential_utilities["water_consumption"] ? "&#xf14a;" : "&#9723;" ?></span> ไม่มี</div>
            </div>
            <div class="row">
                <div class="col-xs-3">ห้องสุขา</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->residential_utilities["toilet"] ? "&#xf14a;" : "&#9723;" ?></span> มี</div>
                <div class="col-xs-3"><span style="font-family: fontawesome; font-size:80%;"><?php echo !$visitInfo67->residential_utilities["toilet"] ? "&#xf14a;" : "&#9723;" ?></span> ไม่มี</div>
            </div>
            <dt style="width: max-content;padding-left:20px">๔.๔ โปรดระบุสภาพแวดล้อมที่อยู่อาศัย เช่น ใกล้แหล่งมั่วสุม ใกล้สถานบันเทิง ชุมชนแออัด เป็นต้น</dt>
            <dd style="width: 642px;"><?php echo $visitInfo67->residential_specify ? $visitInfo67->residential_specify : "-" ?></dd>
        </div>
        <dt style="width:max-content;"><strong>ข้อมูลครอบครัว</strong></dt>
        <div style="padding-left: 25px;">
            <dt style="width: 223px;">๑. สมาชิกในครอบครัวนักเรียน</dt>
            <dt style="width: 50px;">จำนวน</dt>
            <dd style="width: 50px;"><?php echo $visitInfo67->family_member["men"] + $visitInfo67->family_member["women"] ?></dd>
            <dt style="width: 30px;">คน</dt>
            <dt style="width: 33px;">ชาย</dt>
            <dd style="width: 50px;"><?php echo $visitInfo67->family_member["men"] ? $visitInfo67->family_member["men"] : "-" ?></dd>
            <dt style="width: 30px;">คน</dt>
            <dt style="width: 35px;">หญิง</dt>
            <dd style="width: 50px;"><?php echo $visitInfo67->family_member["women"] ? $visitInfo67->family_member["women"] : "-" ?></dd>
            <dt style="width: 30px;">คน</dt>

            <dt style="width: 223px;">๒. พี่น้องที่เกิดจากบิดามารดาเดียวกัน</dt>
            <dt style="width: 50px;">จำนวน</dt>
            <dd style="width: 50px;"><?php echo $visitInfo67->family_same_parents["son"] + $visitInfo67->family_same_parents["daughter"] ?></dd>
            <dt style="width: 30px;">คน</dt>
            <dt style="width: 33px;">ชาย</dt>
            <dd style="width: 50px;"><?php echo $visitInfo67->family_same_parents["son"] ? $visitInfo67->family_same_parents["son"] : "-" ?></dd>
            <dt style="width: 30px;">คน</dt>
            <dt style="width: 35px;">หญิง</dt>
            <dd style="width: 50px;"><?php echo $visitInfo67->family_same_parents["daughter"] ? $visitInfo67->family_same_parents["daughter"] : "-" ?></dd>
            <dt style="width: 30px;">คน</dt>

            <dt style="width: 223px;">๓. พี่น้องที่เกิดจากต่างบิดามารดา</dt>
            <dt style="width: 50px;">จำนวน</dt>
            <dd style="width: 50px;"><?php echo $visitInfo67->family_different_parents["son"] + $visitInfo67->family_different_parents["daughter"] ?></dd>
            <dt style="width: 30px;">คน</dt>
            <dt style="width: 33px;">ชาย</dt>
            <dd style="width: 50px;"><?php echo $visitInfo67->family_different_parents["son"] ? $visitInfo67->family_different_parents["son"] : "-" ?></dd>
            <dt style="width: 30px;">คน</dt>
            <dt style="width: 35px;">หญิง</dt>
            <dd style="width: 50px;"><?php echo $visitInfo67->family_different_parents["daughter"] ? $visitInfo67->family_different_parents["daughter"] : "-" ?></dd>
            <dt style="width: 30px;">คน</dt>

            <dt style="width: 292px;">กรณีในครอบครัวมีผู้ที่ต้องการการช่วยเหลือเป็นกรณีพิเศษ</dt>
            <dd style="width: 218px;">-</dd>
            <dt style="width: 30px;">รวม</dt>
            <dd style="width: 50px;"><?php echo $visitInfo67->family_assistances["sum"] ? $visitInfo67->family_assistances["sum"] : "-" ?></dd>
            <dt style="width: 30px;">คน</dt>
        </div>
    </dl>
</div>

<pagebreak />
<div style="font-size:14pt;line-height:23px;padding-top:0px">

    <dl>
        <dt style="width: max-content;padding-left:20px">ความสัมพันธ์ของสมาชิกในครอบครัว</dt>
        <div class="row">
            <div class="col-xs-4"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_relationship["harmonious"] ? "&#xf14a;" : "&#9723;" ?></span> รักใคร่</div>
            <div class="col-xs-4"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_relationship["occasional_conflict"] ? "&#xf14a;" : "&#9723;" ?></span> ขัดแย้งทะเลาะกันบางครั้ง</div>
            <div class="col-xs-4"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_relationship["frequent_conflict"] ? "&#xf14a;" : "&#9723;" ?></span> ขัดแย้งทะเลาะกันบ่อยครั้ง</div>
            <div class="col-xs-4"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_relationship["distant"] ? "&#xf14a;" : "&#9723;" ?></span> ห่างเหิน</div>
            <div class="col-xs-4"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_relationship["occasional_assualt"] ? "&#xf14a;" : "&#9723;" ?></span> ขัดแย้งและทำร้ายร่างกายบางครั้ง</div>
            <div class="col-xs-4"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_relationship["frequent_assualt"] ? "&#xf14a;" : "&#9723;" ?></span> ขัดแย้งและทำร้ายร่างกายบ่อยครั้ง</div>
            <div class="col-xs-12">
                <dt style="width:45px;padding-left:-10px"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_relationship["other"] ? "&#xf14a;" : "&#9723;" ?></span> อื่นๆ </dt>
                <dd style="width: 415px;"><?php echo $visitInfo67->family_relationship["other"] ? $visitInfo67->family_relationship["other"] : "-" ?></dd>
            </div>
        </div>
        <dt style="width: max-content;padding-left:20px">๓.๑ ความสัมพันธ์ระหว่างนักเรียนกับสมาชิกในครอบครัว</dt>
        <table style="border: 1px solid black;width:100%">
            <thead>
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black;text-align:center;">สมาชิก</td>
                    <td style="border: 1px solid black;text-align:center;">สนิทสนม</td>
                    <td style="border: 1px solid black;text-align:center;">เฉยๆ</td>
                    <td style="border: 1px solid black;text-align:center;">ห่างเหิน</td>
                    <td style="border: 1px solid black;text-align:center;">ขัดแย้ง</td>
                </tr>
            </thead>
            <tbody>
                <tr style="border: 1px solid black;">
                    <td style="padding-left:10px;">บิดา</td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["dad"] == 20 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["dad"] == 10 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["dad"] == 0 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["dad"] == -1 ? "&#xf14a;" : "&#9723;" ?></span></td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="padding-left:10px;">มารดา</td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["mom"] == 20 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["mom"] == 10 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["mom"] == 0 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["mom"] == -1 ? "&#xf14a;" : "&#9723;" ?></span></td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="padding-left:10px;">พี่/น้องชาย</td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["brother"] == 20 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["brother"] == 10 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["brother"] == 0 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["brother"] == -1 ? "&#xf14a;" : "&#9723;" ?></span></td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="padding-left:10px;">พี่/น้องสาว</td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["sister"] == 20 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["sister"] == 10 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["sister"] == 0 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["sister"] == -1 ? "&#xf14a;" : "&#9723;" ?></span></td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="padding-left:10px;">ปู่/ย่า/ตา/ยาย</td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["grandf_m"] == 20 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["grandf_m"] == 10 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["grandf_m"] == 0 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["grandf_m"] == -1 ? "&#xf14a;" : "&#9723;" ?></span></td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="padding-left:10px;">ญาติ</td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["relative"] == 20 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["relative"] == 10 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["relative"] == 0 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["relative"] == -1 ? "&#xf14a;" : "&#9723;" ?></span></td>
                </tr>
                <tr style="border: 1px solid black;">
                    <td style="padding-left:10px;">อื่นๆ</td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["other"] == 20 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["other"] == 10 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["other"] == 0 ? "&#xf14a;" : "&#9723;" ?></span></td>
                    <td style="border: 1px solid black;text-align:center;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->family_closeness["other"] == -1 ? "&#xf14a;" : "&#9723;" ?></span></td>
                </tr>
            </tbody>
        </table>
        <dt style="width: 150px;padding-left:20px;margin-top:14px">๓.๒ มีเวลาอยู่ร่วมกันกี่ชั่วโมง</dt>
        <dd style="width: 483px;"><?php echo $visitInfo67->family_time_together ? $visitInfo67->family_time_together : "-" ?></dd>
        <dt style="width: 290px;padding-left:20px">๓.๓ ภาระงานความรับผิดชอบของนักเรียนที่มีต่อครอบครัว</dt>
        <dd style="width: 343px;">-</dd>
        <dt style="width: 178px;padding-left:20px;">๓.๔ กิจกรรมยามว่างหรืองานอดิเรก</dt>
        <dd style="width: 453px;">-</dd>
        <dt style="width: 294px;padding-left:20px">๓.๕ กรณีผู้ปกครองไม่อยู่บ้านฝากเด็กนักเรียนอยู่บ้านกับใคร</dt>
        <dd style="width: 338px;"><?php echo $visitInfo67->family_not_home ? $visitInfo67->family_not_home : "-" ?></dd>
        <dt style="width:185px">๔. รายได้เฉลี่ยของครอบครัวต่อเดือน</dt>
        <dd style="width: 100px;"><?php echo $visitInfo67->family_income["parent_income"] ? $visitInfo67->family_income["parent_income"] : "-" ?></dd>
        <dt style="width: 23px;">บาท</dt>
        <dt style="width: 135px;">นักเรียนได้รับค่าใช้จ่ายจาก</dt>
        <dd style="width: 189px"><?php echo $visitInfo67->family_income["student_income_with"] ? $visitInfo67->family_income["student_income_with"] : "-" ?></dd>
        <div style="padding-left: 16px;">
            <dt style="width: 157px;">นักเรียนทำงานหารายได้ อาชีพ</dt>
            <dd style="width: 230px;"><?php echo $visitInfo67->family_income["student_income_career"] ? $visitInfo67->family_income["student_income_career"] : "-" ?></dd>
            <dt style="width: 64px;">รายได้วันละ</dt>
            <dd style="width: 144px;"><?php echo $visitInfo67->family_income["student_income_per_day"] ? $visitInfo67->family_income["student_income_per_day"] : "-" ?></dd>
            <dt style="width: 23px;">บาท</dt>
            <dt style="width: 157px;">นักเรียนได้เงินมาโรงเรียนวันละ</dt>
            <dd style="width: 144px;"><?php echo $visitInfo67->family_income["student_school_per_day"] ? $visitInfo67->family_income["student_school_per_day"] : "-" ?></dd>
            <dt style="width: 23px;">บาท</dt>
        </div>
        <dt style="width: max-content;">๕. พฤติกรรมความเสี่ยง (ตอบได้มากกว่า ๑ ข้อ)</dt>
        <div style="padding-left: 20px;">
            <dt style="width: max-content;">๕.๑ สุขภาพ</dt>
            <div class="row">
                <div class="col-xs-3">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_health["bad_health"] ? "&#xf14a;" : "&#9723;" ?></span>
                    ร่างกายไม่แข็งแรง
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_health["congenital"] ? "&#xf14a;" : "&#9723;" ?></span>
                    มีโรคประจำตัวหรือเจ็บป่วยบ่อย
                </div>
                <div class="col-xs-3">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_health["malnutrition"] ? "&#xf14a;" : "&#9723;" ?></span>
                    ร่างกายไม่แข็งแรง
                </div>
                <div class="col-xs-3">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_health["chronically_ill"] ? "&#xf14a;" : "&#9723;" ?></span>
                    ป่วยเป็นโรคร้ายแรง/เรื้อรัง
                </div>
                <div class="col-xs-3">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_health["low_physical"] ? "&#xf14a;" : "&#9723;" ?></span>
                    สมรรถภาพทางร่างกายต่ำ
                </div>
            </div>
            <dt style="width: max-content;">๕.๒ สวัสดิการหรือความปลอดภัย (ตอบได้มากกว่า ๑ ข้อ)</dt>
            <table style="width: 100%;">
                <tr>
                    <td style="padding-left: 75px;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_welfare["parent_separated"] ? "&#xf14a;" : "&#9723;" ?></span>
                        พ่อแม่แยกทางกันหรือแต่งงานใหม่</td>
                    <td style="width:45%"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_welfare["gambling"] ? "&#xf14a;" : "&#9723;" ?></span>
                        เล่นการพนัน</td>
                </tr>
                <tr>
                    <td style="padding-left: 75px;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_welfare["fam_has_illness"] ? "&#xf14a;" : "&#9723;" ?></span>
                        มีบุคคลในครอบครัวเจ็บป่วยด้วยโรคร้าย/เรื้อรัง/ติดต่อ</td>
                    <td style=""><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_welfare["fam_addicted_drugs"] ? "&#xf14a;" : "&#9723;" ?></span>
                        บุคคลในครอบครัวติดสารเสพติด</td>
                </tr>
                <tr>
                    <td style="padding-left: 75px;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_welfare["fam_addicted_gambling"] ? "&#xf14a;" : "&#9723;" ?></span>
                        บุคคลในครอบครัวเล่นการพนัน</td>
                    <td style=""><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_welfare["fam_conflict"] ? "&#xf14a;" : "&#9723;" ?></span>
                        มีความขัดดแย้ง/ทะเลาะกันในครอบครัว</td>
                </tr>
                <tr>
                    <td style="padding-left: 75px;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_welfare["fam_assualt"] ? "&#xf14a;" : "&#9723;" ?></span>
                        ความขัดแย้งและมีการใช้ความรุนแรงในครอบครัว</td>
                    <td style=""><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_welfare["no_caregiver"] ? "&#xf14a;" : "&#9723;" ?></span>
                        ไม่มีผู้ดูแล</td>
                </tr>
                <tr>
                    <td style="padding-left: 75px;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_welfare["abused"] ? "&#xf14a;" : "&#9723;" ?></span>
                        ถูกทารุณ/ทำร้ายจากบุคคลในครอบครัว/เพื่อนบ้าน</td>
                    <td style=""><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_welfare["sexual_harassment"] ? "&#xf14a;" : "&#9723;" ?></span>
                        ถูกล่วงละเมิดทางเพศ</td>
                </tr>

            </table>
            <!-- ยังไม่ทำ -->
            <dt style="width:200px">๕.๓ ระยะทางระหว่างบ้านไปโรงเรียนไป</dt>
            <dd style="width: 80px;">-</dd>
            <dt style="width: 53px;">กิโลเมตร</dt>
            <dt style="width: 75px;">ใช้เวลาเดินทาง</dt>
            <dd style="width: 80px">-</dd>
            <dt style="width: 23px;">ชม.</dt>
            <dd style="width: 60px;">-</dd>
            <dt style="width: 23px;">นาที</dt>
            <br>
            <dt style="width:max-content;padding-left:1px;">๕.๔ การเดินทางของนักเรียน (ตอบได้มากกว่า ๑ ข้อ)</dt>
            <table style="width: 100%;">
                <tr>
                    <td style="padding-left: 74px;width:180px"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->traveling["parent"] ? "&#xf14a;" : "&#9723;" ?></span> ผู้ปกครองมาส่ง</td>
                    <td><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->traveling["bus"] ? "&#xf14a;" : "&#9723;" ?></span> รถโดยสารประจำทาง</td>
                    <td style="padding-left: -40px;width: 70px;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->traveling["private_bike"] ? "&#xf14a;" : "&#9723;" ?></span> รถจักรยานยนต์</td>
                    <td><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->traveling["scholl_bus"] ? "&#xf14a;" : "&#9723;" ?></span> รถโรงเรียน</td>
                </tr>
                <tr>
                    <td style="padding-left: 74px;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->traveling["private_car"] ? "&#xf14a;" : "&#9723;" ?></span> รถยนต์</td>
                    <td style="width:180px"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->traveling["bike"] ? "&#xf14a;" : "&#9723;" ?></span> รถจักรยาน</td>
                    <td style="padding-left: -40px;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->traveling["walk"] ? "&#xf14a;" : "&#9723;" ?></span> เดิน</td>
                    <td>
                        <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->traveling["other"] ? "&#xf14a;" : "&#9723;" ?></span> <?php echo $visitInfo67->traveling["other"] ? $visitInfo67->traveling["other"] : "อื่นๆ" ?>
                    </td>
                </tr>
            </table>
        </div>
    </dl>
</div>

<pagebreak />

<div style="font-size:14pt;line-height:23px;padding-top:0px">
    <dl>
        <div style="padding-left: 20px;">
            <dt style="width:max-content;padding-left:1px;">๕.๕ ภาระงานความรับผิดชอบของนักเรียนที่มีต่อครอบครัว (ตอบได้มากกว่า ๑ ข้อ)
            </dt>
            <div class="row">
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_responsibility["housework"] ? "&#xf14a;" : "&#9723;" ?></span> ช่วยงานบ้าน
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_responsibility["intensive_care"] ? "&#xf14a;" : "&#9723;" ?></span> ช่วยดูแลคนเจ็บป่วย/พิการ
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_responsibility["trade"] ? "&#xf14a;" : "&#9723;" ?></span> ช่วยค้าขายเล็กๆน้อยๆ
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_responsibility["parttime"] ? "&#xf14a;" : "&#9723;" ?></span> ทำงานพิเศษแถวบ้าน
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_responsibility["agriculture"] ? "&#xf14a;" : "&#9723;" ?></span> ช่วยทำงานในนาไร่
                </div>
            </div>
            <div style="padding-left: 65px;">
                <dt style="width: 45px;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_responsibility["other"] ? "&#xf14a;" : "&#9723;" ?></span> อื่นๆ</dt>
                <dd style="width: 419px;"><?php echo $visitInfo67->risk_responsibility["other"] ? $visitInfo67->risk_responsibility["other"] : "-" ?></dd>
            </div>
        </div>
        <div style="padding-left: 20px;">
            <dt style="width:max-content;padding-left:1px;">๕.๖ กิจกรรมยามว่างหรืองานอดิเรก (ตอบได้มากกว่า ๑ ข้อ)
            </dt>
            <div class="row">
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_hobbys["talevision"] ? "&#xf14a;" : "&#9723;" ?></span> ดูทีวี/ฟังเพลง
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_hobbys["mall"] ? "&#xf14a;" : "&#9723;" ?></span> ไปเที่ยวห้าง/ดูหนัง
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_hobbys["book"] ? "&#xf14a;" : "&#9723;" ?></span> อ่านหนังสือ
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_hobbys["friend"] ? "&#xf14a;" : "&#9723;" ?></span> ไปหาเพื่อน/เพื่อน
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_hobbys["motopunk"] ? "&#xf14a;" : "&#9723;" ?></span> แว้น/สก๊อย
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_hobbys["game"] ? "&#xf14a;" : "&#9723;" ?></span> เล่นเกม คอมพิวเตอร์/มือถือ
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_hobbys["park"] ? "&#xf14a;" : "&#9723;" ?></span> ไปสวนสาธารณะ
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_hobbys["music"] ? "&#xf14a;" : "&#9723;" ?></span> เล่นดนตรี
                </div>

            </div>
            <div style="padding-left: 65px;">
                <dt style="width: 45px;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_hobbys["other"] ? "&#xf14a;" : "&#9723;" ?></span> อื่นๆ</dt>
                <dd style="width: 419px;"><?php echo $visitInfo67->risk_hobbys["other"] ? $visitInfo67->risk_hobbys["other"] : "-" ?></dd>
            </div>
        </div>
        <div style="padding-left: 20px;">
            <dt style="width:max-content;padding-left:1px;">๕.๗ พฤติกรรมการใช้สารเสพติด (ตอบได้มากกว่า ๑ ข้อ)
            </dt>
            <div class="row">
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_drugs["friend_use"] ? "&#xf14a;" : "&#9723;" ?></span> คบเพื่อนในกลุ่มที่ใช้สารเสพติด
                </div>
                <div class="col-xs-5">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_drugs["fam_use"] ? "&#xf14a;" : "&#9723;" ?></span> สมาชิกในครอบครัวข้องเกี่ยวกับสารเสพติด
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_drugs["env_use"] ? "&#xf14a;" : "&#9723;" ?></span> อยู่ในสภาพแวดล้อมที่ใช้สารเสพติด
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_drugs["current_use"] ? "&#xf14a;" : "&#9723;" ?></span> ปัจจุบันเกี่ยวข้องกับสารเสพติด
                </div>
                <div class="col-xs-5">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_drugs["drug_addict"] ? "&#xf14a;" : "&#9723;" ?></span> เป็นผู้ติดบุหรี่ สุรา หรือการใช้สารเสพติดอื่นๆ
                </div>
            </div>
        </div>
        <div style="padding-left: 20px;">
            <dt style="width:max-content;padding-left:1px;">๕.๘ พฤติกรรมการใช้ความรุนแรง (ตอบได้มากกว่า ๑ ข้อ)
            </dt>
            <div class="row">
                <div class="col-xs-3">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_assualt["quarrel_sometimes"] ? "&#xf14a;" : "&#9723;" ?></span> มีการทะเลาะวิวาท
                </div>
                <div class="col-xs-3">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_assualt["quarrel_regular"] ? "&#xf14a;" : "&#9723;" ?></span> ก้าวร้าว/เกเร
                </div>
                <div class="col-xs-3">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_assualt["aggressive"] ? "&#xf14a;" : "&#9723;" ?></span> ทะเลาะวิวาทเป็นประจำ
                </div>
                <div class="col-xs-3">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_assualt["harm_others"] ? "&#xf14a;" : "&#9723;" ?></span> ทำร้ายร่างกายผู้อื่น
                </div>
                <div class="col-xs-3">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_assualt["harm_self"] ? "&#xf14a;" : "&#9723;" ?></span> ทำร้ายร่างกายตนเอง
                </div>
            </div>
            <div style="padding-left: 65px;">
                <dt style="width: 45px;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_assualt["other"] ? "&#xf14a;" : "&#9723;" ?></span> อื่นๆ</dt>
                <dd style="width: 419px;"><?php echo $visitInfo67->risk_assualt["other"] ? $visitInfo67->risk_assualt["other"] : "-" ?></dd>
            </div>
        </div>
        <div style="padding-left: 20px;">
            <dt style="width:max-content;padding-left:1px;">๕.๙ พฤติกรรมทางเพศ (ตอบได้มากกว่า ๑ ข้อ)
            </dt>
            <div class="row">
                <div class="col-xs-3">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_sexual["prostitution"] ? "&#xf14a;" : "&#9723;" ?></span> อยู่ในกลุ่มขายบริการ
                </div>
                <div class="col-xs-7">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_sexual["long_term_sexual_commu"] ? "&#xf14a;" : "&#9723;" ?></span> ใช้เครื่องมือสื่อสารที่เกี่ยวข้องกับด้านเพศเป็นเวลานานและบ่อยครั้ง
                </div>
                <div class="col-xs-3">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_sexual["sexual_services"] ? "&#xf14a;" : "&#9723;" ?></span> ขายบริการทางเพศ
                </div>
                <div class="col-xs-7">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_sexual["obsessed_sexual_media"] ? "&#xf14a;" : "&#9723;" ?></span> หมกมุ่นในการใช้เครื่องมือสื่อสารที่เกี่ยวข้องทางเพศ
                </div>
                <div class="col-xs-3">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_sexual["sexual_group_activity"] ? "&#xf14a;" : "&#9723;" ?></span> มีการมั่วสุมทางเพศ
                </div>
                <div class="col-xs-7">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_sexual["pregnancy"] ? "&#xf14a;" : "&#9723;" ?></span> ตั้งครรภ์
                </div>
            </div>
        </div>
        <div style="padding-left: 20px;">
            <dt style="width:max-content;padding-left:1px;">๕.๑๐ การติดเกม (ตอบได้มากกว่า ๑ ข้อ)
            </dt>
            <div class="row">
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_games["plays_than_1hr"] ? "&#xf14a;" : "&#9723;" ?></span> เล่นเกมเกินวันละ ๑ ชั่วโมง
                </div>
                <div class="col-xs-5">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_games["lacks_creativity"] ? "&#xf14a;" : "&#9723;" ?></span> ขาดจินตนาการและความคิดสร้างสรรค์
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_games["isolated"] ? "&#xf14a;" : "&#9723;" ?></span> เก็บตัว แยกตัวจากกลุ่มเพื่อน
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_games["abnormal_spending"] ? "&#xf14a;" : "&#9723;" ?></span> ใช้จ่ายเงินผิดปกติ
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_games["friends_game_addicts"] ? "&#xf14a;" : "&#9723;" ?></span> อยู่ในกลุ่มเพื่อนติดเกม
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_games["gamestore_near_home"] ? "&#xf14a;" : "&#9723;" ?></span> ร้านเกมอยู่ใกล้บ้านหรือโรงเรียน
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_games["plays_than_2hr"] ? "&#xf14a;" : "&#9723;" ?></span> เล่นเกมเกินวันละ ๒ ชั่วโมง
                </div>
                <div class="col-xs-4">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_games["obsessed_game"] ? "&#xf14a;" : "&#9723;" ?></span> หมกมุ่น จริงจังในการเล่นเกม
                </div>
                <div class="col-xs-5">
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_games["misbehaves_for_games"] ? "&#xf14a;" : "&#9723;" ?></span> ใช้เงินสิ้นเปลือง โกหก ลักขโมยเงินเพื่อเล่นเกม
                </div>
            </div>
            <div style="padding-left: 65px;">
                <dt style="width: 45px;"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_games["other"] ? "&#xf14a;" : "&#9723;" ?></span> อื่นๆ</dt>
                <dd style="width: 419px;"><?php echo $visitInfo67->risk_games["other"] ? $visitInfo67->risk_games["other"] : "-" ?></dd>
            </div>
        </div>
        <div style="padding-left: 20px;">
            <dt style="width:max-content;padding-left:1px;">๕.๑๑ การเข้าถึงสื่อคอมพิวเตอร์และอินเตอร์เน็ตได้จากที่อยู่อาศัย</dt>
            <div class="row">
                <div class="col-xs-5"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_com_internet ? "&#xf14a;" : "&#9723;" ?></span> สามารถเข้าถึงอินเตอร์เน็ตได้จากที่อยู่อาศัย</div>
                <div class="col-xs-5"><span style="font-family: fontawesome; font-size:80%;"><?php echo !$visitInfo67->risk_com_internet ? "&#xf14a;" : "&#9723;" ?></span> ไม่สามารถเข้าถึงอินเตอร์เน็ตได้จากที่อยู่อาศัย</div>
            </div>
        </div>
        <div style="padding-left: 20px;">
            <dt style="width:max-content;padding-left:1px;">๕.๑๒ การใช้เครื่องมือสื่อสารอิเล็กทรอนิกส์</dt>
            <div class="row">
                <div class="col-xs-5"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_phone == "ไม่เกิน 3 ชม" ? "&#xf14a;" : "&#9723;" ?></span> ใช้โซเชียลมีเดีย/เกม (ไม่เกินวันละ ๓ ชั่วโมง)</div>
                <div class="col-xs-5"><span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->risk_phone == "เกิน 3 ชม" ? "&#xf14a;" : "&#9723;" ?></span> ใช้โซเชียลมีเดีย/เกม (เกินวันละ ๓ ชั่วโมง)</div>
            </div>
        </div>
        <dt style="width: max-content;">๖. ข้อห่วงใยของผู้ปกครองที่มีต่อนักเรียน</dt>
        <dd style="width: max-content;"><?php echo $visitInfo67->parental_concern ? $visitInfo67->parental_concern : "-" ?></dd>
    </dl>
</div>

<pagebreak />
<div style="font-size:14pt;line-height:23px;padding-top:0px">
    <dl>
        <dt style="width: max-content;">๗. สิ่งที่ผู้ปกครองต้องการให้โรงเรียนช่วยเหลือนักเรียน</dt>
        <div class="row">
            <div class="col-xs-2">
                <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->parental_requests_school["academic_support"] ? "&#xf14a;" : "&#9723;" ?></span> ด้านการเรียน
            </div>
            <div class="col-xs-2">
                <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->parental_requests_school["behavioral_support"] ? "&#xf14a;" : "&#9723;" ?></span> ด้านพฤติกรรม
            </div>
            <div class="col-xs-2">
                <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->parental_requests_school["economic_support"] ? "&#xf14a;" : "&#9723;" ?></span> ด้านเศรษฐกิจ
            </div>
            <div class="col-xs-2">
                <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->parental_requests_school["other"] ? "&#xf14a;" : "&#9723;" ?></span> อื่นๆ
            </div>
        </div>
        <dd style="width: max-content;"><?php echo $visitInfo67->parental_requests_school["details"] ? $visitInfo67->parental_requests_school["details"] : "-" ?></dd>


        <br>
        <dt style="width: max-content;">๘. ความช่วยเหลือที่ครอบครัวเคยได้รับจากหน่วยงานหรือต้องการได้รับการช่วยเหลือ</dt>

        <table style="width: 100%;text-align:center;">
            <tr>
                <td>
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->parental_requests_organization["priority"] == 40 ? "&#xf14a;" : "&#9723;" ?></span> มากที่สุด
                </td>
                <td>
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->parental_requests_organization["priority"] == 30 ? "&#xf14a;" : "&#9723;" ?></span> มาก
                </td>
                <td>
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->parental_requests_organization["priority"] == 20 ? "&#xf14a;" : "&#9723;" ?></span> ปานกลาง
                </td>
                <td>
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->parental_requests_organization["priority"] == 10 ? "&#xf14a;" : "&#9723;" ?></span> น้อย
                </td>
                <td>
                    <span style="font-family: fontawesome; font-size:80%;"><?php echo $visitInfo67->parental_requests_organization["priority"] == 0 ? "&#xf14a;" : "&#9723;" ?></span> ไม่จำเป็น
                </td>
            </tr>
        </table>
        <dd style="width: max-content;"><?php echo $visitInfo67->parental_requests_organization["detail"] ? $visitInfo67->parental_requests_organization["detail"] : "-" ?></dd>
        <br>
        <br>
        <br>
        <p style="text-align:center;font-size:16pt;font-weight:bold;padding-top:-20px;">
            <?php for ($i = 0; $i < 78; $i++) {
                echo Html::tag('span', '&#9723;', ['style' => 'font-family: fontawesome; font-size:20%; background-color:black;']);
                echo '&nbsp;';
            } ?>
        </p>

        <div style="margin-top: 15px;">
            <div style="float:left;text-align:center;width:100%">
                <dt style="width: 100px;padding-left:200px;">วันที่บันทึกข้อมูล</dt>
                <dd style="width: 160px;">-</dd>
            </div>
            <br><br>
            <div style="float:left;text-align:center;width:100%">
                <p>ผู้ให้ข้อมูลนักเรียน ......................................................</p>
                <p style="margin-top:5px">เกี่ยวข้องกับนักเรียนเป็น ( ................................................. )</p>
            </div>
            <br><br>
            <div style="float:left;text-align:center;width:100%">
                <p>ผู้บันทึกข้อมูลนักเรียน ......................................................</p>
                <p style="margin-top:5px">( ................................................. )</p>
                <p style="margin-top:5px">ตำแหน่ง/หน้าที่ ...............................................................</p>
            </div>
        </div>

    </dl>
</div>
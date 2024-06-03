<?php

namespace midend\controllers;

use Yii;
use yii\web\Controller;
use common\components\NgMpdf;

class PaperController extends Controller
{

  private function getBasePdfCss()
  {
    return 'body {font-size: 13pt;line-height: 15px;} .border {border:1px solid #000000;} .border-top {border-top:1px solid #000000;} .border-left {border-left:1px solid #000000;} .border-right {border-right:1px solid #000000;} .border-bottom {border-bottom:1px solid #000000;} .title {line-height: -1px;} .bold {font-weight: bold;} .underline {text-decoration: underline} .content {text-indent: 20mm;  margin-left: 4mm;margin-right: 8mm;} .float-left {float: left;} .float-right {float: right;} .clear {clear: both;} .pad-left {padding-left: 5mm;} .pad-right {padding-right: 5mm;} h2,h3 {margin:0;} h3{font-weight: bold;}';
  }

  private function footer()
  {
    $dtime = \DateTime::createFromFormat("Y-m-d", date('Y-m-d'));
    $timestamp = $dtime->getTimestamp();
    $footer = array(
      'odd' => array(
        'L' => array(
          'content' => 'สร้างโดย: ' . Yii::$app->name . ' (' .  Yii::$app->date->date('วันlที่ j F พ.ศ.Y เวลา H:i:s', $timestamp) . ')',
          'font-size' => 10,
          'font-family' => 'garuda',
        ),
        'R' => array(
          'content' => "หน้า {PAGENO}/{nb}",
          'font-size' => 11,
          'font-family' => 'garuda',
        ),
        'line' => 1,
      ),
      'even' => array(
        'L' => array(
          'content' => 'สร้างโดย: ' . Yii::$app->name . ' (' .  Yii::$app->date->date('วันlที่ j F พ.ศ.Y เวลา H:i:s', $timestamp) . ')',
          'font-size' => 10,
          'font-family' => 'garuda',
        ),
        'R' => array(
          'content' => "หน้า {PAGENO}/{nb}",
          'font-size' => 11,
          'font-family' => 'garuda',
        ),
        'line' => 1,
      ),
    );

    return $footer;
  }

  private function outputPDF($fileName, $content, $cssFilePath, $overrideConfig = [], $additionals = [], $watermark = "", $orientation = "P")
  {

    $margin_left = $overrideConfig['margin_left'] ?? null;
    $margin_right = $overrideConfig['margin_right'] ?? null;
    $margin_top = $overrideConfig['margin_top'] ?? null;
    $margin_bottom = $overrideConfig['margin_bottom'] ?? null;

    $mpdf = new NgMpdf('utf-8', 'A4', 12, 'thsarabunnew', $left = 18, $right = 13, $top = 8, $bottom = 8, $mgh = 5, $mgf = 2, 'P');

    $mpdf->showWatermarkText = true;
    $mpdf->filename = $fileName . ".pdf";
    $mpdf->title = $fileName;

    $customCssContent = $this->getBasePdfCss();
    if (!empty($cssFilePath)) {
      $customCssContent .= file_get_contents($cssFilePath);
    }

    if ($margin_left !== null) {
      $customCssContent .= '@page { margin-left: ' . $margin_left . 'px; }';
    }
    if ($margin_right !== null) {
      $customCssContent .= '@page { margin-right: ' . $margin_right . 'px; }';
    }
    if ($margin_top !== null) {
      $customCssContent .= '@page { margin-top: ' . $margin_top . 'px; }';
    }
    if ($margin_bottom !== null) {
      $customCssContent .= '@page { margin-bottom: ' . $margin_bottom . 'px; }';
    }

    $mpdf->genPdf($content, $customCssContent, $this->footer(), $additionals, $watermark);
  }


  public function actionExamidcard()
  {
    $data = $this->dummyDataExamCard();
    $html = $this->renderPartial('examidcard', [...$data]);

    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

    $fileName =   'บัตรประจำตัวผู้เข้าสอบ_' . $data['register_number'];
    $extraCssPath = Yii::getAlias('@midend') . '/web/css/pdf/admission/base.css';
    $additionals = [];

    $this->outputPDF($fileName, $html, $extraCssPath, [
      'default_font_size' => 10,
    ], $additionals);
  }


  public function actionProfile()
  {
    $data = $this->dummyData();
    $html = $this->renderPartial('profile', [...$data]);

    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

    $fileName =   'ใบมอบตัว_' . $data['profile']['regis_id'] . '_' . $data['model']['firstname'] . '_' . $data['model']['lastname'];
    $extraCssPath = Yii::getAlias('@midend') . '/web/css/pdf/admission/base.css';
    $additionals = [];

    $this->outputPDF($fileName, $html, $extraCssPath, [
      'default_font_size' => 10,
    ], $additionals);
  }

  public function actionProfile_traimit()
  {
    $data = $this->dummyData();
    $html = $this->renderPartial('profile_traimit', [...$data]);

    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

    $fileName =   'ใบมอบตัว_' . $data['profile']['regis_id'] . '_' . $data['model']['firstname'] . '_' . $data['model']['lastname'];
    $extraCssPath = Yii::getAlias('@midend') . '/web/css/pdf/admission/base.css';
    $additionals = [];

    $this->outputPDF($fileName, $html, $extraCssPath, [
      'default_font_size' => 10,
    ], $additionals);
  }

  public function actionProfile_phanarai()
  {
    $data = $this->dummyData();
    $html = $this->renderPartial('profile_phanarai', [...$data]);

    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

    $fileName =   'ใบมอบตัว_' . $data['profile']['regis_id'] . '_' . $data['model']['firstname'] . '_' . $data['model']['lastname'];
    $extraCssPath = Yii::getAlias('@midend') . '/web/css/pdf/admission/base.css';
    $additionals = [];

    $this->outputPDF($fileName, $html, $extraCssPath, [
      'default_font_size' => 10,
    ], $additionals);
  }

  public function actionPayin_nikomwitthaya()
  {
    $data = $this->dummyDataNikomwitthaya();
    $html = $this->renderPartial('payin_nikomwitthaya', [...$data]);

    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

    $fileName =   'Payin';
    $extraCssPath = Yii::getAlias('@midend') . '/web/css/pdf/admission/base.css';
    $additionals = [];

    $this->outputPDF($fileName, $html, $extraCssPath, [
      'default_font_size' => 10,
    ], $additionals);
  }

  public function actionPutthaisong_transcript5()
  {
    $data = $this->dummyDataTranscript();
    $html = $this->renderPartial('putthaisong_transcript5', [...$data]);

    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

    $fileName = 'bp5-eva-cover';
    $extraCssPath = Yii::getAlias('@midend') . '/web/css/pdf/admission/base.css';
    $additionals = [];

    $overrideConfig = [
      'margin_left' => 80,
      'margin_right' => 20,
      'margin_top' => 40,
      'margin_bottom' => 40,
    ];

    $this->outputPDF($fileName, $html, $extraCssPath, $overrideConfig, $additionals);
  }

  public function actionPutthaisong_transcript_eva()
  {
    $data = $this->dummyDataTranscript();
    $html = $this->renderPartial('putthaisong_transcript_eva', [...$data]);

    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

    $fileName =   'bp5-eva';
    $extraCssPath = Yii::getAlias('@midend') . '/web/css/pdf/admission/base.css';
    $additionals = [];

    $overrideConfig = [
      'margin_left' => 80,
      'margin_right' => 20,
      'margin_top' => 40,
      'margin_bottom' => 40,
    ];

    $this->outputPDF($fileName, $html, $extraCssPath, $overrideConfig, $additionals);
  }

  public function actionPutthaisong_transcript_attendance()
  {
    $data = $this->dummyDataTranscript();
    $html = $this->renderPartial('putthaisong_transcript_attendance', [...$data]);

    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

    $fileName =   'bp5-attendance';
    $extraCssPath = Yii::getAlias('@midend') . '/web/css/pdf/admission/base.css';
    $additionals = [];

    $overrideConfig = [
      'margin_left' => 80,
      'margin_right' => 20,
      'margin_top' => 40,
      'margin_bottom' => 40,
    ];

    $this->outputPDF($fileName, $html, $extraCssPath, $overrideConfig, $additionals);
  }

  public function actionVisit_bodin_summary()
  {
    $data = $this->dummyDataVisitBodinSum();
    $html = $this->renderPartial('visit_bodin_summary', [...$data]);

    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

    $fileName =   'แบบสรุปการเยี่ยมบ้าน';
    $extraCssPath = Yii::getAlias('@midend') . '/web/css/pdf/admission/base.css';
    $additionals = [];

    $this->outputPDF($fileName, $html, $extraCssPath, [
      'default_font_size' => 10,
    ], $additionals);
  }

  public function actionVisit_bodin()
  {
    $data = $this->dummyDataVisit();
    $html = $this->renderPartial('visit_bodin', [...$data]);

    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

    $fileName =   'แบบบันทึกการเยี่ยมบ้าน';
    $extraCssPath = Yii::getAlias('@midend') . '/web/css/pdf/admission/base.css';
    $additionals = [];

    $this->outputPDF($fileName, $html, $extraCssPath, [
      'default_font_size' => 10,
    ], $additionals);
  }

  public function actionVisit_siyanuson()
  {
    $data = $this->dummyDataVisit();
    $html = $this->renderPartial('visit_siyanuson', [...$data]);

    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

    $fileName =   'แบบบันทึกการเยี่ยมบ้าน สพฐ ปี 66';
    $extraCssPath = Yii::getAlias('@midend') . '/web/css/pdf/admission/base.css';
    $additionals = [];

    $this->outputPDF($fileName, $html, $extraCssPath, [
      'default_font_size' => 10,
    ], $additionals);
  }

  public function actionNikom_print_profile()
  {
    $data = $this->dummyDataNikom_print_profile();
    $html = $this->renderPartial('nikom_print_profile', [...$data]);

    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

    $fileName =   'ทะเบียนประวัตินักเรียนรายบุคคล';
    $extraCssPath = Yii::getAlias('@midend') . '/web/css/pdf/admission/base.css';
    $additionals = [];

    $this->outputPDF($fileName, $html, $extraCssPath, [
      'default_font_size' => 10,
    ], $additionals);
  }

  public function actionBanbueng_staff_attendance()
  {
    $data = $this->dummyDataBanbueng_staff_attendance();
    $html = $this->renderPartial('banbueng_staff_attendance', [...$data]);

    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

    $fileName =   'สรุปรายงานขาดลามาสาย';
    $extraCssPath = Yii::getAlias('@midend') . '/web/css/pdf/admission/base.css';
    $additionals = [];

    $overrideConfig = [
      'margin_left' => 40,
      'margin_right' => 40,
      'margin_top' => 20,
    ];

    $this->outputPDF($fileName, $html, $extraCssPath, $overrideConfig, $additionals);
  }

  public function actionSiyanuson_student_behave()
  {
    $data = $this->dummyDataSiyanuson_student_behave();
    $html = $this->renderPartial('siyanuson_student_behave', [...$data]);

    $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');

    $fileName =   'รายงานความประพฤติรายบุคคล';
    $extraCssPath = Yii::getAlias('@midend') . '/web/css/pdf/admission/base.css';
    $additionals = [];

    $overrideConfig = [
      'margin_left' => 50,
      'margin_right' => 50,
      'margin_top' => 30,
      'margin_bottom' => 40,
    ];

    $this->outputPDF($fileName, $html, $extraCssPath, $overrideConfig, $additionals, "L");
  }

  private function dummyDataVisit()
  {
    return [
      'missing' => [
        'parent_remark' => 'ดี เอื้อต่อการดำรงชีวิต',
        'living_environment' => 'ดี เอื้อต่อการดำรงชีวิต',
        'environmentDetail' => '',
        'family_care' => 'ครอบครัวเอาใจใส่ ดูแลด้านพฤติกรรมและการเรียน',
        'student_no' => '1',
        'totalFamilyMember' => 5,
        'familyMemberMale' => 2,
        'familyMemberFemale' => 3,
        'bloodRelatedSibling' => 2,
        'bloodRelatedSon' => 1,
        'bloodRelatedDaughter' => 1,
        'nonBloodRelatedSibling' => 1,
        'nonBloodRelatedSon' => 0,
        'nonBloodRelatedDaughter' => 1,
        'familyMemberNeedHelp' => 1,
        'home_kind' => 'บ้านของตัวเอง',
        'home_tidy' => 'สกปรกไม่มีระเบียบ',
        'hasElectricity' => false,
        'hasWater' => false,
        'hasBathroom' => true,
        'familyRelationship' => 'อื่นๆ',
        'relationshipWithDad' => 'ขัดแย้ง',
        'relationshipWithMom' => 'ห่างเหิน',
        'relationshipWithBrother' => 'เฉยๆ',
        'relationshipWithSister' => 'สนิทสนม',
        'relationshipWithElder' => 'เฉยๆ',
        'relationshipWithRelative' => 'ห่างเหิน',
        'relationshipWithOther' => 'ไม่มี',
        'hobby' => 'ดูทีวี/ฟังเพลง',
        'hobbyChoice' => ['ดูทีวี/ฟังเพลง', 'อ่านหนังสือ', 'แว้น/สก๊อย', 'ไปสวนสาธารณะ', 'อื่นๆ', 'ไปเที่ยวห้าง/ดูหนัง', 'ไปหาเพื่อน/เพื่อน', 'เล่นเกม คอมพิวเตอร์/มือถือ', 'เล่นดนตรี'],
        'whenParentNotHome' => 'ป้า',
        'getLivingCostFrom' => 'พ่อ',
        'studentPartTime' => 'พนักงานเสริฟร้านอาหาร',
        'studentPartTimeIncome' => '10,500',
        'studentGetMoney' => '150',
        'studentHealth' => ['สมรรถภาพทางกายต่ำ', 'ร่างกายไม่แข็งแรง'],
        'studentSafety' => ['มีความขัดแย้ง/ทะเลาะกันในครอบครัว', 'ถูกล่วงละเมิดทางเพศ'],
        'drugBehavior' => ['คบเพื่อนในกลุ่มที่ใช้สารเสพติด', 'อยู่ในสภาพแวดล้อมที่ใช้สารเสพติด', 'เป็นผู้ติดบุหรี่ สุรา หรือการใช้สารเสพติดอื่นๆ', 'สมาชิกในครอบครัวข้องเกี่ยวกับสารเสพติด', 'ปัจจุบันเกี่ยวข้องกับสารเสพติด'],
        'sexualBehavior' => ['อยู่ในกลุ่มขายบริการ', 'ขายบริการทางเพศ', 'มีการมั่วสุมทางเพศ', 'ใช้เครื่องมือสื่อสารที่เกี่ยวข้องกับด้านเพศเป็นเวลานานและบ่อยครั้ง', 'หมกมุ่นในการใช้เครื่องมือสื่อสารที่เกี่ยวข้องทางเพศ', 'ตั้งครรภ์'],
        'gameAddictive' => ['เล่นเกมเกินวันละ 1 ชั่วโมง', 'เก็บตัว แยกตัวจากกลุ่มเพื่อน', 'อยู่ในกลุ่มเพื่อนติดเกม', 'เล่นเกมเกินวันละ 2 ชั่วโมง', 'ใช้เงินสิ้นเปลือง โกหก ลักขโมยเงินเพื่อเล่นเกม', 'ขาดจินตนาการและความคิดสร้างสรรค์', 'ใช่จ่ายเงินผิดปกติ', 'ร้านเกมอยู่ใกล้บ้านหรือโรงเรียน', 'หมกมุ่น จริงจังในการเล่นเกม', 'อื่นๆ'],
        'computerInternetAccessible' => false,
        'socialMediaAddictive' => 'ใช้โซเชียลมีเดีย/เกม (ไม่เกินวันละ 3 ชั่วโมง)',
        'line_id' => '123',
        'need_assist' => 'ไม่จำเป็น',
        'assist' => 'ด้านเศรษฐกิจ',
        'facebook' => '321',
        'visit_count' => 1,
        'beingTogether' => '6 ชั่วโมง',
        'studentViolent' => ['มีการทะเลาะวิวาท', 'ก้าวร้าว เกเร', 'ทะเลาะวิวาทเป็นประจำ', 'ทำร้ายร่างกายผู้อื่น', 'ทำร้ายร่างกายตนเอง', 'อื่นๆ'],
        'student_responsibility' => 'ช่วยงานบ้าน',
        'student_responsibilityChoice' => ['ช่วยงานบ้าน', 'ช่วยค้าขายเล็กๆน้อยๆ', 'ช่วยงานในนาไร่', 'ช่วยดูแลคนเจ็บป่วย/พิการ', 'ทำงานพิเศษแถวบ้าน', 'อื่นๆ'],
        'nickname' => 'เจม',
        'method' => ['ผู้ปกครองมาส่ง', 'รถโดยสารประจำทาง', 'รถจักรยานยนต์', 'รถยนต์', 'รถจักรยาน', 'รถโรงเรียน', 'เดิน', 'อื่นๆ'],
      ],
      'profile' => [
        'regis_id' => 293048,
        'seat_id' => '',
        'gender' => 0,
        'title' => 'ด.ช.',
        'firstname' => 'ฉัตรปรัชญา',
        'lastname' => 'มุ้งบัง',
        'mobile_no' => '0810548699',
        'fullname' => 'ด.ช. ฉัตรปรัชญา มุ้งบัง',
        'personal_id' => '1129902294330',
        'race' => 'ไทย',
        'nationality' => 'ไทย',
        'religion' => 'พุทธ',
        'dob' => '29 กันยายน 2554',
        'height' => 140,
        'weight' => 46,
        'ageYear' => '12',
        'ageMonth' => '4',
        'blood' => 'ไม่ทราบ',
        'email' => 'namotassa17@gmail.com',
        'hospital' => 'N/A',
        'born' => '-',
        'mainLang' => 'N/A',
        'graduate' => 'อนุบาลนนทบุรี',
        'graduateSubDistrict' => 'สวนใหญ่',
        'graduateDistrict' => 'เมืองนนทบุรี',
        'graduateProvince' => 'นนทบุรี',
        'elderBrother' => '0',
        'elderSister' => 1,
        'youngerBrother' => '0',
        'youngerSister' => '0',
        'birthOrder' => 1,
        'childInSchool' => 1,
        'distance' => '19',
        'travelDuration' => '25 นาที',
        'travelCost' => '.',
        'talent' => 'N/A',
        'familyStatus' => 'N/A',
        'familyStatusNo' => 0,
        'transport' => 'รถประจำทาง',
        'hasfee' => true,
        'livingType' => 'N/A',
        'siblings' => 1,
      ],
      'address' => [
        'no' => '49',
        'moo' => '4',
        'village' => '-',
        'soi' => 'เรวดี 27',
        'street' => 'ติวานนท์',
        'sub_district' => 'ตลาดขวัญ',
        'district' => 'เมืองนนทบุรี',
        'province' => 'นนทบุรี',
        'zip' => '11000',
        'tel' => '0810548699',
      ],
      'dad' => [
        'title' => 'นาย',
        'f_name' => 'ธรรมนูญ',
        'l_name' => 'มุ้งบัง',
        'fullname' => 'นาย ธรรมนูญ มุ้งบัง',
        'job' => 'รับราชการ',
        'phone' => '0881994519',
        'citizen' => '3250700112548',
        'age' => 50,
        'dob' => '10 ธันวาคม 2517',
        'blood' => 'ไม่ทราบ',
        'income' => '25,000',
        'occupation' => 'รับราชการ',
        'nationality' => 'ไทย',
        'race' => 'ไทย',
        'religion' => 'พุทธ',
      ],
      'mom' => [
        'title' => 'นางสาว',
        'f_name' => 'นิตญา',
        'l_name' => 'ราชบุตร',
        'fullname' => 'นางสาว นิตญา ราชบุตร',
        'job' => 'พนักงานราชการ',
        'phone' => '0999486517',
        'citizen' => '3250700142293',
        'age' => 44,
        'dob' => '14 เมษายน 2523',
        'blood' => 'ไม่ทราบ',
        'income' => '20,000',
        'occupation' => 'พนักงานราชการ',
        'nationality' => 'ไทย',
        'race' => 'ไทย',
        'religion' => 'พุทธ',
      ],
      'parent' => [
        'title' => 'นาย',
        'firstname' => 'ธรรมนูญ',
        'lastname' => 'มุ้งบัง',
        'fullname' => 'นาย ธรรมนูญ มุ้งบัง',
        'age' => 50,
        'job' => 'รับราชการ',
        'phone' => '0881994519',
        'citizen' => '3250700112548',
        'blood' => 'ไม่ทราบ',
        'income' => '25,000',
        'occupation' => 'รับราชการ',
        'patronize' => 'N/A',
        'relative' => 'บิดา',
        'relativeDad' => true,
        'relativeMom' => 'none',
        'relativeOther' => 'none',
        'nationality' => 'ไทย',
        'race' => 'ไทย',
        'religion' => '-',
      ],
      'semester' => [
        'name' => 'ภาคเรียนที่ 2',
      ],
      'model' => [
        'name' => 'ม.2/6',
        'date' => '2024-02-10',
        'time' => '11:09',
      ],
      'VisitInfoTransport' => [
        'distance' => '19',
        'method' => 'รถจักรยานยนต์',
      ],
      'VisitInfoPersonal' => [
        'home_kind' => 'บ้านของตัวเอง',
        'home_condition' => 'ดี เอื้อต่อการดำรงชีวิต',
        'income' => '40,000',
      ],
      'VisitInfoMisc' => [
        'relationship_level' => 'ใกล้ชิด / อบอุ่น / มีเหตุผล',
      ],
      'VisitInfoOpinion' => [
        'remark' => 'ข้อเสนอแนะ',
      ],
      'VisitInfoFiles' => [
        'path' => [
          'image1' => 'https://thumbor.forbes.com/thumbor/fit-in/900x510/https://www.forbes.com/home-improvement/wp-content/uploads/2022/07/download-23.jpg',
          'image2' => 'https://thumbor.forbes.com/thumbor/fit-in/900x510/https://www.forbes.com/home-improvement/wp-content/uploads/2022/07/download-23.jpg',
        ]
      ],
    ];
  }

  private function dummyDataVisitBodinSum()
  {
    return [
      'missing' => [
        'totalStudent' => 36,
        'totalMaleStudent' => 14,
        'totalFemaleStudent' => 12,
        'student_home_condition_good' => 20,
        'student_home_condition_normal' => 13,
        'student_home_condition_bad' => 0,
        'student_living_environment_good' => 20,
        'student_living_environment_normal' => 16,
        'student_relationship_level_close' => 0,
        'student_relationship_level_care' => 36,
        'student_relationship_level_let_free' => 0,
        'student_family_care_close' => 36,
        'student_family_care_care' => 0,
        'student_family_care_let_free' => 0,
        'totalVisitStudent' => 36,
        'totalNonVisitStudent' => 0,
      ],
      'teacherClass' => [
        0 => [
          'fullname' => 'นายธีระชัย เถลิงลาภ',
        ],
        1 => [
          'fullname' => 'นายพรพล เทพไทยอำนวย',
        ],
        2 => [
          'fullname' => '',
        ],
      ],
      'model' => [
        'name' => 'ม.6/6',
      ],
    ];
  }

  private function dummyData()
  {
    return [
      'register' => [
        'date' => '2024-02-10',
        'time' => '11:09',
      ],
      'exam' => [
        'date' => '2024-03-09',
        'time' => '00:00',
      ],
      'profile' => [
        'regis_id' => 293048,
        'seat_id' => '',
        'edu_program' => 'ห้องเรียนพิเศษภาษาจีน ชั้นมัธยมศึกษาปีที่ 1',
        'gender' => 0,
        'title' => 'ด.ช.',
        'firstname' => 'ฉัตรปรัชญา',
        'lastname' => 'มุ้งบัง',
        'mobile_no' => '0810548699',
        'fullname' => 'ด.ช. ฉัตรปรัชญา มุ้งบัง',
        'personal_id' => '1129902294330',
        'race' => 'ไทย',
        'nationality' => 'ไทย',
        'religion' => 'พุทธ',
        'dob' => '29 กันยายน 2554',
        'height' => 140,
        'weight' => 46,
        'ageYear' => '12',
        'ageMonth' => '4',
        'blood' => 'ไม่ทราบ',
        'email' => 'namotassa17@gmail.com',
        'hospital' => 'N/A',
        'born' => '-',
        'mainLang' => 'N/A',
        'graduate' => 'อนุบาลนนทบุรี',
        'graduateSubDistrict' => 'สวนใหญ่',
        'graduateDistrict' => 'เมืองนนทบุรี',
        'graduateProvince' => 'นนทบุรี',
        'elderBrother' => '0',
        'elderSister' => 1,
        'youngerBrother' => '0',
        'youngerSister' => '0',
        'birthOrder' => 1,
        'childInSchool' => 1,
        'distance' => '19',
        'travelDuration' => '25 นาที',
        'travelCost' => '.',
        'talent' => 'N/A',
        'familyStatus' => 'N/A',
        'familyStatusNo' => 0,
        'transport' => 'รถประจำทาง',
        'hasfee' => true,
        'livingType' => 'N/A',
        'siblings' => 1,
      ],
      'address' => [
        'no' => '49',
        'moo' => '4',
        'soi' => 'เรวดี 27',
        'street' => 'ติวานนท์',
        'sub_district' => 'ตลาดขวัญ',
        'district' => 'เมืองนนทบุรี',
        'province' => 'นนทบุรี',
        'zip' => '11000',
        'tel' => '0810548699',
      ],
      'dad' => [
        'title' => 'นาย',
        'f_name' => 'ธรรมนูญ',
        'l_name' => 'มุ้งบัง',
        'fullname' => 'นาย ธรรมนูญ มุ้งบัง',
        'job' => 'รับราชการ',
        'phone' => '0881994519',
        'citizen' => '3250700112548',
        'age' => 50,
        'dob' => '10 ธันวาคม 2517',
        'blood' => 'ไม่ทราบ',
        'income' => '25,000',
        'occupation' => 'รับราชการ',
        'nationality' => 'ไทย',
        'race' => 'ไทย',
        'religion' => 'พุทธ',
      ],
      'mom' => [
        'title' => 'นางสาว',
        'f_name' => 'นิตญา',
        'l_name' => 'ราชบุตร',
        'fullname' => 'นางสาว นิตญา ราชบุตร',
        'job' => 'พนักงานราชการ',
        'phone' => '0999486517',
        'citizen' => '3250700142293',
        'age' => 44,
        'dob' => '14 เมษายน 2523',
        'blood' => 'ไม่ทราบ',
        'income' => '20,000',
        'occupation' => 'พนักงานราชการ',
        'nationality' => 'ไทย',
        'race' => 'ไทย',
        'religion' => 'พุทธ',
      ],
      'parent' => [
        'title' => 'นาย',
        'firstname' => 'ธรรมนูญ',
        'lastname' => 'มุ้งบัง',
        'fullname' => 'นาย ธรรมนูญ มุ้งบัง',
        'age' => 50,
        'job' => 'รับราชการ',
        'phone' => '0881994519',
        'citizen' => '3250700112548',
        'blood' => 'ไม่ทราบ',
        'income' => '25,000',
        'occupation' => 'รับราชการ',
        'patronize' => 'N/A',
        'relative' => 'บิดา',
        'relativeDad' => true,
        'relativeMom' => 'none',
        'relativeOther' => 'none',
        'nationality' => 'ไทย',
        'race' => 'ไทย',
        'religion' => '-',
      ],
      'old_school' => [
        'name' => 'อนุบาลนนทบุรี',
        'sub_district' => 'สวนใหญ่',
        'district' => 'เมืองนนทบุรี',
        'province' => 'นนทบุรี',
        'type' => 'ค้นหา',
      ],
      'img' => 'https://app.nextschool.io/img/logo/1682664778โลโก้โรงเรียนใหญ่.jpg',
      'title' => [
        'name' => 'ไตรมิตรวิทยาลัย',
        'grade' => 1,
        'year' => 2567,
      ],
      'model' => [
        'id' => 103701,
        'registrant_id' => 293048,
        'relative_type' => 'บิดา',
        'title' => 'นาย',
        'firstname' => 'ธรรมนูญ',
        'lastname' => 'มุ้งบัง',
        'dob' => '1974-12-10',
        'citizen_id' => '3250700112548',
        'blood_type' => 'ไม่ทราบ',
        'occupation' => 'รับราชการ',
        'nationality' => 'ไทย',
        'race' => 'ไทย',
        'religion' => 'พุทธ',
        'work_place' => 'สำนักงานประกันสังคม',
        'mobile_no' => '0881994519',
        'mobile_no_verify_status' => null,
        'living_status' => 0,
        'income_per_month' => 25000,
        'address_id' => 71478,
        'created_at' => '2024-02-10 11:14:51',
        'updated_at' => '2024-02-11 13:17:18',
        'registrant' => [
          'id' => 293048,
          'source_id' => '1129902294330',
          'school_id' => 48,
          'status' => 10,
          'created_at' => '2024-02-10 11:06:08',
          'updated_at' => '2024-02-10 11:10:26',
          'last_login' => null,
          'source_type' => null,
          'target_id' => 11504,
          'period_id' => 1537,
          'delete_id' => null,
          'deleted_at' => null,
          'targets' => [
            0 => 11504
          ]
        ]
      ],
      'grade' => 1,
      'attachImage' => [
        'disability_table' => ''
      ],
    ];
  }

  private function dummyDataExamCard()
  {
    return [
      'profile' => [
        'title' => 'นางสาว',
        'firstname' => 'ณิชา',
        'lastname' => 'ทีแคส',
        'fullname' => 'นางสาว ณิชา ทีแคส',
        'personal_id' => '1505200012123',
        'grade' => 1,
        'year' => 2567,
      ],
      'register_number' => '01388',
      'targets' => [
        0 => 'แผนการเรียนภาษาเพื่อการสื่อสารและการประกอบธุรกิจ (อังกฤษ-ธุรกิจ)',
      ],
      'old_school' => [
        'name' => 'เมืองใหม่(ชลอราษฎร์รังสฤษฏ์)',
        'sub_district' => 'เขาสามยอด',
        'district' => 'เมืองลพบุรี',
        'province' => 'ลพบุรี',
        'type' => 'ค้นหา',
      ],
      'dad' => [
        'fullname' => 'นาย ทศพล ศิริคูหาสมบูรณ์',
        'occupation' => 'รับจ้าง',
        'mobile_no' => '0928066647',
      ],
      'mom' => [
        'fullname' => 'นางสาว ยุภา คำวิเศษ',
        'occupation' => 'รับจ้าง',
        'mobile_no' => '0998104766',
      ],
      'parent' => [
        'fullname' => 'นางสาว อรพรรณ คำยันต์',
        'occupation' => 'รับราชการ',
        'mobile_no' => '0909098146',
        'relation' => 'ป้า',
      ],
      'homeown' => [
        'fullname' => '-',
        'occupation' => '-',
        'mobile_no' => '-',
      ],
      'registrant' => [
        'image' => '',
      ],
      'exam' => [
        'datetime' => '2024-02-18 09:00:00',
        'seat_name' => 'F6',
        'location_name' => '232',
      ],
    ];
  }

  private function dummyDataNikomwitthaya()
  {
    return [
      'dataNikom' => [
        'semester' => '2',
        'year' => '2566',
        'name' => 'เด็กชายกิตติธัช สนืทราษฎร์',
        'studentid' => '13980',
        'classroom' => 'ม.1/1',
        'qr' => '099400026587500-13980-101-200000',
        'codabar' => '099400026587500-13980-101-200000',
        'educational_fees1' => '2,000.00',
        'educational_fees2' => '300.00',
        'educational_fees3' => '350.00',
        'educational_fees4' => '500.00',
        'educational_fees5' => '200.00',
        'total_text' => 'สามพันสามร้อยห้าสอบบาทถ้วน',
        'total' => '3,350.00',
        'product_code' => '80771',
        'classroom_no' => '101',
      ],
    ];
  }

  private function dummyDataTranscript()
  {
    return [
      'missing' => [
        'credit' => '1.00',
        'study_hour' => '2',
        'subject_areas' => 'ไม่ได้ระบุ',
        'subject' => 'ภาษาไทยพื้นฐาน',
        'course_code' => 'ส23103',
      ],
      'model' => [
        'name' => 'ม.6/6',
      ],
      'ranges' => [
        0 => [
          'name' => '4',
          'range_max' => 100,
          'range_min' => 80,
          'count' => 7,
          'ratio' => 19.44,
        ],
        1 => [
          'name' => '3.5',
          'range_max' => 79.99999,
          'range_min' => 75,
          'count' => 7,
          'ratio' => 19.44,
        ],
        2 => [
          'name' => '3',
          'range_max' => 74.99,
          'range_min' => 70,
          'count' => 7,
          'ratio' => 19.44,
        ],
        3 => [
          'name' => '2.5',
          'range_max' => 69.99,
          'range_min' => 65,
          'count' => 4,
          'ratio' => 11.11,
        ],
        4 => [
          'name' => '2',
          'range_max' => 64.99,
          'range_min' => 60,
          'count' => 3,
          'ratio' => 8.33,
        ],
        5 => [
          'name' => '1.5',
          'range_max' => 59.99,
          'range_min' => 55,
          'count' => 0,
          'ratio' => 0,
        ],
        6 => [
          'name' => '1',
          'range_max' => 54.99,
          'range_min' => 50,
          'count' => 0,
          'ratio' => 0,
        ],
        7 => [
          'name' => '0',
          'range_max' => 49.99,
          'range_min' => 0,
          'count' => 0,
          'ratio' => 0,
        ],
        8 => [
          'name' => 'ร',
          'range_max' => 100,
          'range_min' => 0,
          'count' => 0,
          'ratio' => 0,
        ],
        9 => [
          'name' => 'มส',
          'range_max' => 100,
          'range_min' => 0,
          'count' => 7,
          'ratio' => 22.22,
        ],
        10 => [
          'name' => 'ขส.',
          'range_max' => 100,
          'range_min' => 0,
          'count' => 0,
          'ratio' => 0,
        ],
        11 => [
          'name' => 'ขร.',
          'range_max' => 100,
          'range_min' => 0,
          'count' => 0,
          'ratio' => 0,
        ],
        12 => [
          'name' => 'ท.',
          'range_max' => 100,
          'range_min' => 0,
          'count' => 0,
          'ratio' => 0,
        ],
      ],
      'totalStudent' => 36,
      'academicYear' => [
        'name' => '2566',
      ],
      'semester' => [
        'name' => 'ภาคเรียนที่ 2',
      ],
      'teachName' => 'นางอุไรรัตน์ ศรีวงษ์ชัย',
      'teacherClass' => [
        0 => [
          'fullname' => 'นายธีระชัย เถลิงลาภ',
        ],
        1 => [
          'fullname' => 'นายพรพล เทพไทยอำนวย',
        ],
      ],
    ];
  }

  private function dummyDataNikom_print_profile()
  {
    return [
      'missing' => [
        'edu_programChoice' => [
          0 => [
            'edu_programName' => 'แผนการเรียนภาษาเพื่อการสื่อสาร แผน ข (อังกฤษ-ญี่ปุ่น)',
          ],
          1 => [
            'edu_programName' => 'แผนการเรียนภาษาเพื่อการสื่อสารและการประกอบธุรกิจ (อังกฤษ-ธุรกิจ)',
          ],
          2 => [
            'edu_programName' => 'แผนการเรียนวิทยาศาสตร์เทคโนโลยีดิจิทัล',
          ],
          3 => [
            'edu_programName' => 'แผนการเรียนวิทยาศาสตร์พลังงานและสิ่งแวดล้อม',
          ],
          4 => [
            'edu_programName' => 'แผนการเรียนวิทยาศาสตร์วิศวกรรมศาสตร์',
          ],
          5 => [
            'edu_programName' => 'แผนการเรียนวิทยาศาสตร์สุขภาพ',
          ],
          6 => [
            'edu_programName' => '',
          ],
          7 => [
            'edu_programName' => '', // in case there are more than 7 choices
          ],
          8 => [
            'edu_programName' => '',
          ],
          9 => [
            'edu_programName' => '',
          ],
        ],
        'image' => '',
        'dynamic_edu_program' => 5,
      ],
      'profile' => [
        'gender' => 1,
        'title' => 'น.ส.',
        'firstname' => 'สุมลรัตน์',
        'lastname' => 'ไขแจ้ง',
        'mobile_no' => '0809652194',
        'personal_id' => '1219901211901',
        'race' => 'ไทย',
        'nationality' => 'ไทย',
        'religion' => 'พุทธ',
        'dob' => '15 กันยายน 2551',
        'height' => 162,
        'weight' => 81,
        'ageYear' => '15',
        'ageMonth' => '6',
        'blood' => 'O',
        'email' => '13372@nikhomwit.ac.th',
        'born' => '-',
        'elderBrother' => '0',
        'elderSister' => '0',
        'youngerBrother' => '0',
        'youngerSister' => '0',
        'birthOrder' => 1,
        'childInSchool' => '0',
        'distance' => '5',
        'travelDuration' => '9 นาที',
        'travelCost' => '.',
        'talent' => 'N/A',
        'familyStatus' => 'บิดาถึงแก่กรรม',
        'siblings' => 0,
      ],
      'address' => [
        'no' => '288/2',
        'moo' => '1',
        'soi' => '2',
        'street' => '-',
        'sub_district' => 'นิคมพัฒนา',
        'district' => 'นิคมพัฒนา',
        'province' => 'ระยอง',
        'zip' => '21180',
      ],
      'dad' => [
        'title' => 'นาย',
        'f_name' => 'สุรชัย',
        'l_name' => 'ไขแจ้ง',
        'job' => 'ถึงแก่กรรม',
        'phone' => '-',
        'citizen' => '3640700385711',
        'age' => 46,
        'dob' => '23 กันยายน 2521',
        'blood' => 'A',
        'income' => '-',
        'nationality' => 'ไทย',
        'race' => 'ไทย',
        'religion' => 'พุทธ',
      ],
      'mom' => [
        'title' => 'นางสาว',
        'f_name' => 'มลฤดี',
        'l_name' => 'ทับจันทร์',
        'job' => 'รับราชการ',
        'phone' => '0818631929',
        'citizen' => '1210500078021',
        'age' => 34,
        'dob' => '28 สิงหาคม 2533',
        'blood' => 'B',
        'income' => '9,000',
        'nationality' => 'ไทย',
        'race' => 'ไทย',
        'religion' => 'พุทธ',
      ],
      'parent' => [
        'title' => 'นางสาว',
        'firstname' => 'มลฤดี',
        'lastname' => 'ทับจันทร์',
        'age' => 34,
        'job' => 'รับราชการ',
        'phone' => '0818631929',
        'citizen' => '1210500078021',
        'blood' => 'B',
        'income' => '9,000',
        'nationality' => 'ไทย',
        'race' => 'ไทย',
        'religion' => '-',
      ],
      'old_school' => [
        'name' => 'นิคมวิทยา',
        'province' => 'ระยอง',
      ],
      'img' => 'https://app.nextschool.io/img/logo/15581693201021470238.jpg',
      'title' => [
        'name' => 'นิคมวิทยา',
        'grade' => 4,
        'year' => 2567,
      ],
      'model' => [
        'transport' => 3,
      ],
    ];
  }

  private function dummyDataBanbueng_staff_attendance()
  {
    return [
      'teacherCivilServant' => [
        'totalStaff' => 150,
        'onDutyService' => 0,
        'sickLeave' => 1,
        'personalLeave' => 0,
        'late' => 0,
        'other' => 0,
        'totalPresent' => 149,
      ],
      'permanentStaff' => [
        'totalStaff' => 1,
        'onDutyService' => 0,
        'sickLeave' => 0,
        'personalLeave' => 0,
        'late' => 0,
        'other' => 0,
        'totalPresent' => 1,
      ],
      'contractTeacher' => [
        'totalStaff' => 2,
        'onDutyService' => 0,
        'sickLeave' => 0,
        'personalLeave' => 0,
        'late' => 0,
        'other' => 0,
        'totalPresent' => 2,
      ],
      'temporaryStaff' => [
        'totalStaff' => 24,
        'onDutyService' => 0,
        'sickLeave' => 0,
        'personalLeave' => 0,
        'late' => 0,
        'other' => 1,
        'totalPresent' => 23,
      ],
      'User' => [
        0 => [
          'emp_position' => 'ผู้อำนวยการ',
          'title' => 'นาย',
          'firstname' => 'เอกบรรจง',
          'lastname' => 'บุญผ่อง',
        ],
        1 => [
          'emp_position' => 'รองผู้อำนวยการสถานศึกษา',
          'title' => 'นาง',
          'firstname' => 'นันท์ดาวินทร์',
          'lastname' => 'หาญมนตรี',
        ],
      ],
      'teacherCivilServantListName' => [
        'onDutyService' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'sickLeave' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'personalLeave' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'late' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'other' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'helpDutyService' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
      ],
      'permanentStaffListName' => [
        'onDutyService' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'sickLeave' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'personalLeave' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'late' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'other' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'helpDutyService' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
      ],
      'contractTeacherListName' => [
        'onDutyService' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'sickLeave' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'personalLeave' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'late' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'other' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'helpDutyService' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
      ],
      'temporaryStaffListName' => [
        'onDutyService' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'sickLeave' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'personalLeave' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'late' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'other' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
        'helpDutyService' => ['ตัวอย่าง A', 'ตัวอย่าง B'],
      ],
      'img' => 'https://app.nextschool.io/img/logo/15581693201021470238.jpg',
      'title' => [
        'name' => 'โรงเรียนบ้านบึง "อุตสาหกรรมนุเคราะห์"',
      ],
    ];
  }

  private function dummyDataSiyanuson_student_behave()
  {
    return [
      'missing' => [
        'teamColor' => 'แดง',
      ],
      'profile' => [
        'code' => 27761,
        'order_number' => 10,
        'mobile_no' => '0809652194',
        'fullname' => 'น.ส. สุมลรัตน์ ไขแจ้ง',
      ],
      'address' => [
        'no' => '288/2',
        'moo' => '1',
        'soi' => '2',
        'street' => '-',
        'sub_district' => 'นิคมพัฒนา',
        'district' => 'นิคมพัฒนา',
        'province' => 'ระยอง',
        'zip' => '21180',
      ],
      'dad' => [
        'fullname' => 'นาย สุรชัย ไขแจ้ง',
      ],
      'mom' => [
        'fullname' => 'นางสาว มลฤดี ทับจันทร์',
      ],
      'parent' => [
        'fullname' => 'นางสาว มลฤดี ทับจันทร์',
      ],
      'img' => 'https://app.nextschool.io/img/logo/15581693201021470238.jpg',
      'title' => [
        'name' => 'โรงเรียนศรียานุสรณ์ จังหวัดจันทบุรี',
        'grade' => 4,
        'year' => 2567,
      ],
      'teacherClass' => [
        0 => [
          'teacherClassSinceYear' => '2565',
          'fullname' => 'นายธีระชัย เถลิงลาภ',
        ],
        1 => [
          'teacherClassSinceYear' => '2566',
          'fullname' => 'นายพรพล เทพไทยอำนวย',
        ],
        2 => [
          'teacherClassSinceYear' => '2567',
          'fullname' => 'นายพรพล เทพไทยอำนวย',
        ],
      ],
      'model' => [
        'name' => 'ม.6/6',
      ],
      'behave' => [
        0 => [
          'created_at' => '2024-02-10 11:14:51',
          'title' => '210ไม่บันทึกเวลามาโรงเรียน',
          'point' => -15.00,
          'progress' => 'ตัดคะแนน',
          'handler' => 'นาย A',
          'total_point' => 85.00,
          'remark' => '1',
        ],
        1 => [
          'created_at' => '2024-02-11 12:14:51',
          'title' => '210ไม่บันทึกเวลามาโรงเรียน',
          'point' => -15.00,
          'progress' => 'เชิญผู้ปกครอง',
          'handler' => 'นาย B',
          'total_point' => 70.00,
          'remark' => '2',
        ],
        2 => [
          'created_at' => '2024-02-12 13:14:51',
          'title' => '210ไม่บันทึกเวลามาโรงเรียน',
          'point' => -15.00,
          'progress' => 'ทำหนังสือยินยอม',
          'handler' => 'นาย C',
          'total_point' => 55.00,
          'remark' => '3',
        ],
      ],
    ];
  }
}

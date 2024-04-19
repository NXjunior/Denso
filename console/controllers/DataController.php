<?php

namespace console\controllers;


use Yii;
use yii\console\Controller;
use yii\db\Expression;
use common\models\Employee;
use common\models\EmployeeMeta;
use common\models\Slot;
use common\components\NgFormatter;

class DataController extends Controller
{
  public $companyId;
  public $periodId;
  public $fileName;
  public $debug;

  public function options($actionID)
  {
    return ['companyId', 'periodId', 'fileName', 'debug'];
  }

  public function optionAliases()
  {
    return [
      'c' => 'companyId',
      'p' => 'periodId',
      'f' => 'fileName',
      'debug' => 'debug',
    ];
  }

  public function actionTest()
  {
    var_dump($this->companyId);
  }

  private function formatTitle($fullname)
  {
    $titleDict = [
      'นาย' => ['นาย'],
      'นาง' => ['นาง'],
      'นางสาว' => ['นางสาว', 'น.ส. ', 'น.ส.', 'น.ส', 'นาวสาว'],
      'Miss' => ['Miss'],
      'Mr.' => ['Mr'],
      'Mrs.' => ['Mrs'],
      'ว่าที่ร้อยตรี' => ['ว่าที่ ร.ต.', 'ว่าที่ร้อยตรี'],
      'เด็กชาย' => ['เด็กชาย', 'ชาย', 'เด้กชาย', 'ด.ช.', 'ด.ช'],
      'เด็กหญิง' => ['เด็กหญิง', 'หญิง', 'เด้กหญิง', 'เด็หญิง', 'ด.ญ.', 'ด.ญ'],
      'ผอ.' => ['ผอ.'],
      '' => ['--']
    ];

    $title = "";
    foreach ($titleDict as $keyTitle => $testCases) {
      foreach ($testCases as $case) {
        $testLength = mb_strlen($case);
        if (mb_substr($fullname, 0, $testLength, 'UTF-8') == $case) {
          $title = $keyTitle;
          break;
        }
      }
    }
    if (empty($title)) {
      return null;
    } else {
      return ['text' => $title, 'titleDict' =>  $titleDict[$title]];
    }
  }

  private function formatFullname($fullname)
  {
    if (empty($fullname)) {
      return [
        'title' => null,
        'firstname' => null,
        'lastname' => null,
      ];
    }

    $fullname = trim($fullname ?? '');
    $fullname = str_replace('   ', ' ', $fullname);
    $fullname = str_replace('  ', ' ', $fullname);
    $fullname = str_replace('-', '', $fullname);
    $fullname = str_replace('. ', '', $fullname);


    if (strstr($fullname, ' ')) {
      $fullnameArray = explode(' ', $fullname);

      if (count($fullnameArray) === 3) {
        $title = $this->formatTitle($fullnameArray[0]) ?? '';

        if (is_array(($title))) {
          foreach ($title['titleDict'] as $dict) {
            $fullnameArray[0] =  str_replace($dict, "", $fullnameArray[0] ?? '');
          }
          $titleText = $title['text'];
        } else {
          $titleText = $title;
        }

        return [
          'title' => $titleText,
          'firstname' => $fullnameArray[1],
          'lastname' => $fullnameArray[2],
        ];
      } else {
        $title = $this->formatTitle($fullnameArray[0]) ?? '';

        if (is_array(($title))) {
          foreach ($title['titleDict'] as $dict) {
            $fullnameArray[0] =  str_replace($dict, "", $fullnameArray[0] ?? '');
          }
          $titleText = $title['text'];
        } else {
          $titleText = $title;
        }

        return [
          'title' => $titleText,
          'firstname' => $fullnameArray[0],
          'lastname' => $fullnameArray[1],
        ];
      }
    } else {
      return [
        'title' => null,
        'firstname' => $fullname,
        'lastname' => '-',
      ];
    }
  }


  private function formatFirstname($name)
  {
    if (empty($name)) {
      return null;
    }

    $nameFormatted = trim(str_replace('ด.ช.', '', $name) ?? '');
    $nameFormatted = trim(str_replace('ด.ญ.', '', $nameFormatted) ?? '');
    $nameFormatted = trim(str_replace('นาย', '', $nameFormatted) ?? '');
    $nameFormatted = trim(str_replace('นางสาว', '', $nameFormatted) ?? '');
    $nameFormatted = trim(str_replace('น.ส.', '', $nameFormatted) ?? '');
    $nameFormatted = trim(str_replace('นาง', '', $nameFormatted) ?? '');

    return $nameFormatted;
  }

  public function actionImportEmp()
  {
    //./yii data/import-emp -c=1 -f=รายชื่อหนังสือสาธิต.xlsx
    ini_set('memory_limit', -1);

    $fileName = Yii::getAlias('@console') . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $this->fileName;

    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($fileName);
    $reader->setReadDataOnly(true);
    $spreadsheet = $reader->load($fileName);
    $worksheet = $spreadsheet->getActiveSheet();

    $numrows = 2;
    echo "✅ Parser!!\n";
    foreach ($worksheet->getRowIterator() as $row) {
      $cellIterator = $row->getCellIterator();
      $cellIterator->setIterateOnlyExistingCells(true);

      if ($worksheet->getCell('B' . $numrows)->getValue()) {

        $fullname = $this->formatFullname($worksheet->getCell('D' . $numrows)->getValue());
        $fullnameEn = $this->formatFullname($worksheet->getCell('C' . $numrows)->getValue());

        $data = [
          'no' => $numrows - 1,
          'code' => trim($worksheet->getCell('B' . $numrows)->getValue() ?? ''),
          'fullname' =>  [
            'title' => !empty($fullname['title']) ? $fullname['title'] : null,
            'firstname' => !empty($fullname['firstname']) ? $fullname['firstname'] : null,
            'lastname' => !empty($fullname['lastname']) ? $fullname['lastname'] : null,
          ],
          'fullname_en' =>  [
            'title' => !empty($fullnameEn['title']) ? $fullnameEn['title'] : null,
            'firstname' => !empty($fullnameEn['firstname']) ? $fullnameEn['firstname'] : null,
            'lastname' => !empty($fullnameEn['lastname']) ? $fullnameEn['lastname'] : null,
          ],
          'company_code' => trim($worksheet->getCell('E' . $numrows)->getValue() ?? ''),
          'plant' => trim($worksheet->getCell('F' . $numrows)->getValue() ?? ''),
          'div' => trim($worksheet->getCell('G' . $numrows)->getValue() ?? ''),
          'location' => trim($worksheet->getCell('H' . $numrows)->getValue() ?? ''),
          'section' => trim($worksheet->getCell('I' . $numrows)->getValue() ?? ''),
          'department' => trim($worksheet->getCell('J' . $numrows)->getValue() ?? ''),
        ];

        echo "[" . $data['no'] . "] :[" . $data['code'] . "] : [" . $data['fullname']['title'] . ' ' . $data['fullname']['firstname'] . ' ' . $data['fullname']['lastname'] . "] [" . $data['location'] . "] \n";

        $arrayMeta = ['no', 'company_code', 'plant', 'div', 'location', 'section', 'department'];

        $transaction = db()->beginTransaction();

        try {
          // insert to main table
          $model = new Employee();
          $model->company_id = $this->companyId;
          $model->creator = 1;
          $model->status = Employee::STATUS_ACTIVE;
          $model->code = str_replace(' ', '', $data['code']);
          $model->title = $data['fullname']['title'];
          $model->firstname = $data['fullname']['firstname'];
          $model->lastname = $data['fullname']['lastname'];
          $model->title_en = $data['fullname_en']['title'];
          $model->firstname_en = $data['fullname_en']['firstname'];
          $model->lastname_en = $data['fullname_en']['lastname'];
          $model->created_at =  new Expression('NOW()');

          if ($model->save()) {

            foreach ($arrayMeta as $metaKey) {
              // insert to mata table
              $modelMeta = new EmployeeMeta();
              $modelMeta->employee_id = $model->id;
              $modelMeta->meta_key = $metaKey;
              $modelMeta->meta_value = (string) $data[$metaKey];
              if ($modelMeta->save()) {
                echo "💚 " . $model->id . " : " . $modelMeta->meta_key . " => " . $modelMeta->meta_value . "\n";
              } else {
                var_dump($modelMeta->meta_value);
                var_dump($modelMeta->errors);
                exit;
              }
            }
          } else {
            var_dump($model->errors);
            exit;
          }

          $transaction->commit();
        } catch (\Exception $exception) {
          $transaction->rollBack();
          $errors[] = 'DB Error';
          dump($exception->getMessage());
          exit();
        }
      }

      if (empty($data['fullname'])) {
        continue;
      }
      $numrows++;
    }
  }

  public function actionImportEmpOutsource()
  {
    //./yii data/import-emp -c=1 -f=รายชื่อหนังสือสาธิต.xlsx
    ini_set('memory_limit', -1);

    $fileName = Yii::getAlias('@console') . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $this->fileName;

    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($fileName);
    $reader->setReadDataOnly(true);
    $spreadsheet = $reader->load($fileName);
    $worksheet = $spreadsheet->getActiveSheet();

    $numrows = 3;
    echo "✅ Parser!!\n";
    foreach ($worksheet->getRowIterator() as $row) {
      $cellIterator = $row->getCellIterator();
      $cellIterator->setIterateOnlyExistingCells(true);

      if ($worksheet->getCell('B' . $numrows)->getValue()) {

        $fullname = $this->formatFullname($worksheet->getCell('C' . $numrows)->getValue());
        // $fullnameEn = $this->formatFullname($worksheet->getCell('C' . $numrows)->getValue());

        $data = [
          'no' => $numrows - 2,
          'code' => trim($worksheet->getCell('B' . $numrows)->getValue() ?? ''),
          'fullname' =>  [
            'title' => !empty($fullname['title']) ? $fullname['title'] : null,
            'firstname' => !empty($fullname['firstname']) ? $fullname['firstname'] : null,
            'lastname' => !empty($fullname['lastname']) ? $fullname['lastname'] : null,
          ],
          'fullname_en' =>  [
            'title' => trim($worksheet->getCell('E' . $numrows)->getValue() ?? ''),
            'firstname' => trim($worksheet->getCell('F' . $numrows)->getValue() ?? ''),
            'lastname' => trim($worksheet->getCell('G' . $numrows)->getValue() ?? ''),
          ],
          'company_code' => trim($worksheet->getCell('K' . $numrows)->getValue() ?? ''),
          'plant' => trim($worksheet->getCell('F' . $numrows)->getValue() ?? ''),
          'div' => trim($worksheet->getCell('G' . $numrows)->getValue() ?? ''),
          'location' => trim($worksheet->getCell('H' . $numrows)->getValue() ?? ''),
          'section' => trim($worksheet->getCell('S' . $numrows)->getValue() ?? ''),
          'department' => trim($worksheet->getCell('J' . $numrows)->getValue() ?? ''),
        ];

        echo "[" . $data['no'] . "] :[" . $data['code'] . "] : [" . $data['fullname']['title'] . ' ' . $data['fullname']['firstname'] . ' ' . $data['fullname']['lastname'] . "] [" . $data['location'] . "] \n";

        $arrayMeta = ['no', 'company_code', 'plant', 'div', 'location', 'section', 'department'];

        $transaction = db()->beginTransaction();

        try {
          // insert to main table
          $model = new Employee();
          $model->company_id = $this->companyId;
          $model->creator = 1;
          $model->status = Employee::STATUS_ACTIVE;
          $model->code = $data['code'];
          $model->title = $data['fullname']['title'];
          $model->firstname = $data['fullname']['firstname'];
          $model->lastname = $data['fullname']['lastname'];
          $model->title_en = $data['fullname_en']['title'];
          $model->firstname_en = $data['fullname_en']['firstname'];
          $model->lastname_en = $data['fullname_en']['lastname'];
          $model->created_at =  new Expression('NOW()');

          if ($model->save()) {

            foreach ($arrayMeta as $metaKey) {
              // insert to mata table
              $modelMeta = new EmployeeMeta();
              $modelMeta->employee_id = $model->id;
              $modelMeta->meta_key = $metaKey;
              $modelMeta->meta_value = (string) $data[$metaKey];
              if ($modelMeta->save()) {
                echo "💚 " . $model->id . " : " . $modelMeta->meta_key . " => " . $modelMeta->meta_value . "\n";
              } else {
                var_dump($modelMeta->meta_value);
                var_dump($modelMeta->errors);
                exit;
              }
            }
          } else {
            var_dump($model->errors);
            exit;
          }

          $transaction->commit();
        } catch (\Exception $exception) {
          $transaction->rollBack();
          $errors[] = 'DB Error';
          dump($exception->getMessage());
          exit();
        }
      }

      if (empty($data['fullname'])) {
        continue;
      }
      $numrows++;
    }
  }

  public function actionImportSlot()
  {
    //./yii data/import-emp -c=1 -f=รายชื่อหนังสือสาธิต.xlsx
    ini_set('memory_limit', -1);

    $fileName = Yii::getAlias('@console') . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $this->fileName;

    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($fileName);
    $reader->setReadDataOnly(true);
    $spreadsheet = $reader->load($fileName);
    $worksheet = $spreadsheet->getActiveSheet();

    $numrows = 3;
    echo "✅ Parser Slot!!\n";
    foreach ($worksheet->getRowIterator() as $row) {
      $cellIterator = $row->getCellIterator();
      $cellIterator->setIterateOnlyExistingCells(true);

      if ($worksheet->getCell('B' . $numrows)->getValue()) {

        $data = [
          'no' => $numrows - 3,
          'date' => trim($worksheet->getCell('B' . $numrows)->getValue() ?? ''),
          '08:00:00' => trim($worksheet->getCell('C' . $numrows)->getValue() ?? 0),
          '09:00:00' => trim($worksheet->getCell('D' . $numrows)->getValue() ?? 0),
          '10:00:00' => trim($worksheet->getCell('E' . $numrows)->getValue() ?? 0),
          '11:00:00' => trim($worksheet->getCell('F' . $numrows)->getValue() ?? 0),
          '12:00:00' => trim($worksheet->getCell('G' . $numrows)->getValue() ?? 0),
          '13:00:00' => 0,
          '14:00:00' => trim($worksheet->getCell('H' . $numrows)->getValue() ?? 0),
          '15:00:00' => trim($worksheet->getCell('I' . $numrows)->getValue() ?? 0),
          '16:00:00' => trim($worksheet->getCell('J' . $numrows)->getValue() ?? 0),
        ];

        $data['date'] = str_replace('.2567', '. 2567', $data['date']);
        $ngFormatter = new NgFormatter();
        $data['date'] = $ngFormatter->formatDate((string) $data['date']);


        echo "[" . $data['no'] . "] :[" . $data['date'] . "] : [" . $data['08:00:00'] . "][" . $data['09:00:00'] . "][" . $data['10:00:00'] . "][" . $data['11:00:00'] . "][" . $data['12:00:00'] . "][" . $data['13:00:00'] . "][" . $data['14:00:00'] . "][" . $data['15:00:00'] . "][" . $data['16:00:00'] . "]\n";

        $transaction = db()->beginTransaction();

        $slots = [
          ['time_start' => '08:00:00', 'time_end' => '09:00:00'],
          ['time_start' => '09:00:00', 'time_end' => '10:00:00'],
          ['time_start' => '10:00:00', 'time_end' => '11:00:00'],
          ['time_start' => '11:00:00', 'time_end' => '12:00:00'],
          ['time_start' => '12:00:00', 'time_end' => '13:00:00'],
          ['time_start' => '13:00:00', 'time_end' => '14:00:00'],
          ['time_start' => '14:00:00', 'time_end' => '15:00:00'],
          ['time_start' => '15:00:00', 'time_end' => '16:00:00'],
          ['time_start' => '16:00:00', 'time_end' => '17:00:00'],
        ];

        try {
          foreach ($slots as $slot) {
            $model = new Slot();
            $model->period_id = $this->periodId;
            $model->name = $data['date'];
            $model->desp = $slot['time_start'] === '13:00:00' ? 'Break' : null;
            $model->note = null;
            $model->extra = null;
            $model->slot_date = $data['date'];
            $model->time_start = $slot['time_start'];
            $model->time_end = $slot['time_end'];
            $model->quota = $data[$slot['time_start']];
            $model->creator = 1;
            $model->created_at = new Expression('NOW()');
            $model->status = Slot::STATUS_ACTIVE;
            if (!$model->save()) {
              var_dump($model->errors);
              exit;
            }
          }
          $transaction->commit();
        } catch (\Exception $exception) {
          $transaction->rollBack();
          $errors[] = 'DB Error';
          dump($exception->getMessage());
          exit();
        }
      }

      $numrows++;
    }
  }
}

<?php

namespace common\components;

use kartik\mpdf\Pdf;
use Mpdf\Mpdf;
use Yii;
use yii\helpers\Url;

class NgMpdf extends Mpdf
{

  public $filename;
  public $headerCenter;
  public $cssInline;
  public $download = false;
  private $localVersion;

  public function __construct(
    $mode = '',
    $format = 'A4',
    $default_font_size = 0,
    $default_font = '',
    $mgl = 15,
    $mgr = 15,
    $mgt = 16,
    $mgb = 16,
    $mgh = 9,
    $mgf = 9,
    $orientation = 'P'
  ) {

    $params = Yii::$app->params;
    $fontDirs = $params['defaultConfig']['fontDir'];
    $fontData = $params['defaultFontConfig']['fontdata'];

    $this->localVersion = parent::VERSION;
    if ($this->localVersion < 7) {
      parent::__construct(
        $mode,
        $format,
        $default_font_size,
        $default_font,
        $mgl,
        $mgr,
        $mgt,
        $mgb,
        $mgh,
        $mgf,
        $orientation
      );
    } else {

      $options = [
        'fontDir' => array_merge($fontDirs, [
          Url::base() . 'fonts/',
        ]),
        'mode' => $mode,
        'format' => $format,
        'orientation' => $orientation,
        'default_font_size' => $default_font_size,
        'default_font' => $default_font,
        'margin_left' => $mgl,
        'margin_right' => $mgr,
        'margin_top' => $mgt,
        'margin_bottom' => $mgb,
        'margin_header' => $mgh,
        'margin_footer' => $mgf,
      ];
      if ($default_font == 'thsarabun') {
        $options['fontdata'] = [
          'thsarabun' => $params['SetFontTHSarabunNew'],
          'sukhumvit' => $params['SetFontSukhumvit'],
          'fontawesome' => $params['fontawesome'],
          'glyphicons' => $params['glyphicons'],
        ];
      }
      if ($default_font == 'sukhumvit') {
        $options['fontdata'] = ['sukhumvit' => $params['SetFontSukhumvit']];
      }
      if ($default_font == 'sarabun') {
        $options['fontdata'] = ['sarabun' => $params['SetFontSarabun']];
      }
      if ($default_font == 'thsarabunnew') {
        $options['fontdata'] = [
          'thsarabunnew' => $params['SetFontTHSarabunNew'],
          'fontawesome' => $params['SetFontAwesome'],
        ];
      }

      parent::__construct($options);
    }
  }

  public function setFilename($name)
  {
    $this->filename = $name . '.pdf';
  }

  public function genPdf($content, $css = '', $footer = [], $additionals = [], $watermark = "")
  {

    $stylesheet = file_get_contents(Yii::getAlias('@midend') . '/web/css/bootstrap3.7.min.css');
    $stylesheet .= $css;
    $this->WriteHTML($stylesheet, 1);
    $this->WriteHTML($content, 2);


    if ($footer) {
      $this->SetFooter($footer);
    }

    if ($watermark) {
      $this->WriteHTML('<watermarktext content="' . $watermark . '" alpha="0.3" />');
    }

    if (count($additionals)) {
      $basePath = Yii::getAlias('@webroot');
      $index = 0;

      foreach ($additionals as $doc) {
        // $this->SetImportUse();
        if ($doc['kind'] === 'pdf') {
          continue;
          $fileName = $basePath . '/tmp/file' . $index . '.pdf';
          file_put_contents($fileName, fopen($doc['uri'], 'r'));
          if (file_exists($fileName)) {
            $pagecount = $this->setSourceFile($fileName);

            if ($pagecount) {
              $tplId = $this->importPage($pagecount);
              $this->AddPage();
              $this->useTemplate($tplId);
              $this->useTemplate($tplId, 50, 50, 100, 100);
              $this->WriteHTML('<watermarktext content="' . $doc['name'] . '" alpha="0.3" />');
            }
          }
        } else if ($doc['kind'] === 'jpg') {
          $fileName = $basePath . '/tmp/file' . $index . '.jpg';
          file_put_contents($fileName, fopen($doc['uri'], 'r'));
          if (file_exists($fileName)) {
            $this->AddPage();
            $this->Image($fileName, 0, 0, 210, 297, 'jpg', '', true, false);
            $this->WriteHTML('<watermarktext content="' . $doc['name'] . '" alpha="0.3" />');
          }
        }

        $index++;
      }
    }

    if (!empty($this->filename)) {
      $this->Output($this->filename, 'I');
    } else {
      $this->Output();
    }
  }
}

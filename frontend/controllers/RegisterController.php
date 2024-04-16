<?php

namespace frontend\controllers;

use frontend\models\LoginForm;
use common\models\Period;
use common\models\Booking;
use common\models\BookingMeta;
use common\models\Slot;
use common\models\RegistrantAddress;
use common\models\RegistrantDocument;
use common\models\RegistrantRelative;
use common\models\BaseDataSchool;
use backend\models\LogGeneral;
use common\models\Company;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\search\School;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\db\Expression;
use chillerlan\QRCode\{QRCode, QRCodeException, QROptions};
use chillerlan\QRCode\Common\EccLevel;
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\Output\{QRGdImagePNG, QRCodeOutputException};
use chillerlan\QRCode\Output\QRImagick;

/**
 * Site controller
 */
class RegisterController extends Controller
{
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'rules' => [
          [
            'actions' => [
              'index', 'slot', 'qr', 'change'
            ],
            'allow' => true,
            'roles' => ['@'],
            'matchCallback' => function () {
              return (date('Y-m-d') <= user()->period->end_date && user()->status < 15) || user()->period->status == 1;
            },
          ],
        ],
      ],
    ];
  }

  public function actions()
  {
    return [
      'error' => [
        'class' => 'yii\web\ErrorAction',
      ],
    ];
  }

  public function beforeAction($action)
  {
    $exception = Yii::$app->errorHandler->exception;
    if (parent::beforeAction($action)) {
      if ($action->id == 'error') {
        if (isset($exception->statusCode) && $exception->statusCode == 404) {
          $this->layout = '404';
        } else
          $this->layout = 'error';
      }
      return true;
    }
  }

  public function actionError()
  {

    $exception = Yii::$app->errorHandler->exception;
    if (Yii::$app->user->isGuest) {
      $this->layout = 'error';
      if ($exception->statusCode == 404) {
        return $this->render('404');
      }
    }

    if ($exception !== null) {
      return $this->render('error', ['exception' => $exception]);
    }
  }

  protected function setNecessary($companyModel)
  {

    $dirAsset = Yii::$app->assetManager->getPublishedUrl('@coreui/dist');

    $this->view->params['logoImage'] = $dirAsset . "/assets/brand/nextschool.png";
    $this->view->params['siteName'] = Yii::$app->name;
    $this->view->params['siteABS'] = Yii::$app->name;
    $this->view->params['profileImage'] =   $dirAsset . "/assets/img/avatars/owl.png";
    $this->view->params['dirAsset'] = $dirAsset;
    $this->view->params['waveId'] = $companyModel->id;
  }


  public function actionIndex($f = null)
  {
    $this->layout = 'form/register';

    if (!isset(user()->period)) {
      Yii::$app->user->logout();
      return $this->redirect(['/auth']);
    }

    if (user()->completed_at) {
      return $this->redirect(['qr']);
    }

    $session = Yii::$app->session;

    $model = new Booking();
    $model->scenario = 'denso';
    $modelMeta = new  BookingMeta();
    $modelMeta->scenario = 'denso';


    $model->period_id = $session->get('BOOKING_SELECTED_PERIOD');
    $model->source_id = $session->get('BOOKING_EMPLOYEE_ID');
    $model->company_id = $session->get('BOOKING_COMPANY_ID');

    $companyModel = Company::findOne($model->company_id);
    $periodModel = Period::findOne($model->period_id);

    if (
      Yii::$app->request->isPost
      && isset($_POST['BookingMeta']['allergic_egg'], $_POST['BookingMeta']['fever'], $_POST['BookingMeta']['had_vaccine_before'], $_POST['BookingMeta']['guillain_barre_syndrome'])
    ) {
      $post = Yii::$app->request->post();
      $model->creator = user()->id;
      $model->status = Booking::STATUS_ACTIVE;

      $modelMeta->allergic_egg = $post['BookingMeta']['allergic_egg'];
      $modelMeta->fever = $post['BookingMeta']['fever'];
      $modelMeta->had_vaccine_before = $post['BookingMeta']['had_vaccine_before'];
      $modelMeta->guillain_barre_syndrome = $post['BookingMeta']['guillain_barre_syndrome'];

      $transaction = db()->beginTransaction();
      try {
        foreach ($post['BookingMeta'] as $metaKey => $metaValue) {

          $existingBookingMeta =  BookingMeta::find()->where(['booking_id' => userId(), 'meta_key' => $metaKey])->one();

          if (!$existingBookingMeta) {
            $bookingMeta = new BookingMeta();
            $bookingMeta->booking_id = userId();
            $bookingMeta->meta_key = $metaKey;
            $bookingMeta->meta_value = $metaValue;
            if ($bookingMeta->save()) {
              continue;
            } else {
              dump($bookingMeta->errors);
              exit;
            }
          } else {
            $existingBookingMeta->meta_value = $metaValue;
            if ($existingBookingMeta->save()) {
              continue;
            } else {
              dump($existingBookingMeta->errors);
              exit;
            }
          }
        }
        $transaction->commit();
        $this->redirect(['slot']);
      } catch (\Exception $ex) {
        $transaction->rollBack();

        if (YII_DEBUG) {
          dump($ex->getMessage());
          exit();
        }
      }
    }


    $bookingMetas = BookingMeta::find()->where(['booking_id' => userId()])->all();

    foreach ($bookingMetas as $meta) {
      switch ($meta->meta_key) {
        case "allergic_egg":
          $modelMeta->allergic_egg = $meta->meta_value;
          break;
        case "fever":
          $modelMeta->fever = $meta->meta_value;
          break;
        case "had_vaccine_before":
          $modelMeta->had_vaccine_before = $meta->meta_value;
          break;
        case "guillain_barre_syndrome":
          $modelMeta->guillain_barre_syndrome = $meta->meta_value;
          break;
      }
    }


    $this->setNecessary($companyModel);
    $this->view->params['periodName'] = $periodModel->name;

    return $this->render('/register/form/denso', [
      'model' => $model,
      'modelMeta' => $modelMeta
    ]);
  }

  public function actionSlot($f = null)
  {
    $this->layout = 'form/register';

    if (!isset(user()->period)) {
      Yii::$app->user->logout();
      return $this->redirect(['/auth']);
    }

    $bookingModel = Booking::findOne(userId());
    if (!$bookingModel->bookingMetas) {
      return $this->redirect(['index']);
    }

    if (user()->completed_at) {
      return $this->redirect(['qr']);
    }

    $session = Yii::$app->session;

    $model = new Booking();
    $model->scenario = 'denso';
    $modelMeta = new BookingMeta();
    $modelMeta->scenario = 'denso';

    $model->period_id = $session->get('BOOKING_SELECTED_PERIOD');
    $model->source_id = $session->get('BOOKING_EMPLOYEE_ID');
    $model->company_id = $session->get('BOOKING_COMPANY_ID');

    $companyModel = Company::findOne($model->company_id);
    $periodModel = Period::findOne($model->period_id);

    if (Yii::$app->request->isPost && isset($_POST['slot'])) {
      $post = Yii::$app->request->post();

      $bookingModel = Booking::findOne(userId());
      $bookingModel->target_id = $post['slot'];
      $bookingModel->completed_at = new Expression('NOW()');

      if ($bookingModel->target->available <= 0) {
        Yii::$app->session->setFlash('lastminuteSlotEmpty', true);
        Yii::$app->session->setFlash('slotInfo', $bookingModel->target->fullname);
      } else {
        if ($bookingModel->save()) {
          return $this->redirect(['qr']);
        } else {
          dump($bookingModel->errors);
          exit;
        }
      }
    }

    $sql = "SELECT s.id, s.slot_date, s.time_start, s.time_end, s.quota, CASE WHEN booked.amount > 0 THEN booked.amount ELSE 0 END AS booked, 0 AS visited, s.note
                FROM slot s
                LEFT JOIN (
                    SELECT target_id, CASE WHEN COUNT(target_id) > 0 THEN COUNT(target_id) ELSE 0 END AS amount
                    FROM booking
                    WHERE period_id = :periodId AND status = :bookingStatus AND deleted_at IS NULL
                    GROUP BY target_id
                ) AS booked ON s.id = booked.target_id
                WHERE s.status = :status AND s.period_id = :periodId
                ORDER BY s.slot_date, s.time_start";

    $allSlot = db()->createCommand($sql, [
      ':periodId' => $model->period_id,
      ':status' => Slot::STATUS_ACTIVE,
      ':bookingStatus' => Booking::STATUS_ACTIVE,
    ])->queryAll();

    $slotDateCurrent = null;
    foreach ($allSlot as $slotData) {

      if ($slotDateCurrent !== $slotData['slot_date']) {
        $slot['date'] = $slotData['slot_date'];
        $slotDateCurrent = $slot['date'];

        $slot['note'] = !empty($slotData['note']) ? $slotData['note'] : null;
      }

      $slot['date'] = $slotData['slot_date'];
      $slot['slots'][$slotData['time_start']]['time_start'] = substr($slotData['time_start'], 0, 5);
      $slot['slots'][$slotData['time_start']]['time_end'] = substr($slotData['time_end'], 0, 5);
      $slot['slots'][$slotData['time_start']]['quota'] = $slotData['quota'];
      $slot['slots'][$slotData['time_start']]['booked'] = $slotData['booked'];
      $slot['slots'][$slotData['time_start']]['visited'] = $slotData['visited'];
      $slot['slots'][$slotData['time_start']]['id'] = $slotData['id'];

      $slots[$slotDateCurrent] = $slot;
    }

    $sql = "SELECT s.slot_date
            FROM slot s
            WHERE s.status = :status AND s.period_id = :periodId
            GROUP BY s.slot_date
            ORDER BY s.slot_date";

    $allSlotDate = db()->createCommand($sql, [
      ':periodId' => $model->period_id,
      ':status' => Slot::STATUS_ACTIVE,
    ])->queryAll();

    $this->setNecessary($companyModel);
    $this->view->params['periodName'] = $periodModel->name;

    return $this->render('/register/form/denso_slot', [
      'model' => $model,
      'modelMeta' => $modelMeta,
      'slots' => $slots,
      'allSlotDate' => $allSlotDate
    ]);
  }

  public function actionQr($f = null)
  {
    $this->layout = 'form/register';

    if (!isset(user()->period)) {
      Yii::$app->user->logout();
      return $this->redirect(['/auth']);
    }

    if (!user()->completed_at) {
      return $this->redirect(['index']);
    }

    $session = Yii::$app->session;

    $model = $this->findBookingModel(userId());
    $model->scenario = 'denso';
    $modelMeta = new  BookingMeta();
    $modelMeta->scenario = 'denso';

    // $model->period_id = $session->get('BOOKING_SELECTED_PERIOD');
    // $model->source_id = $session->get('BOOKING_EMPLOYEE_ID');
    // $model->company_id = $session->get('BOOKING_COMPANY_ID');

    $companyModel = Company::findOne($model->company_id);
    $periodModel = Period::findOne($model->period_id);


    $this->setNecessary($companyModel);
    $this->view->params['periodName'] = $periodModel->name;

    $bookingData = [
      'employee_code' =>  $model->source_id,
      'company_id' => $model->company_id,
      'period_id' => $model->period_id,
      'slot_id' => $model->target_id,
    ];

    $qrImage = $this->genQR($bookingData);

    return $this->render('/register/form/denso_qr', [
      'model' => $model,
      'modelMeta' => $modelMeta,
      'qrImage' => $qrImage
    ]);
  }

  public function genQR($bookingData)
  {
    $brandLogoPath = \Yii::getAlias('@frontend') . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'mascotOnlyOrange.png';
    $data = implode(Booking::CONFIG_SPLIT_QR_CHAR, $bookingData);


    $options = new QROptions;
    $options->version = 5;
    $options->outputBase64        = true;
    $options->addLogoSpace        = true;
    $options->logoSpaceWidth      = 15;
    $options->logoSpaceHeight     = 15;
    $options->bgColor             = '#eee';
    $options->imageTransparent    = false;
    $options->scale               = 20;
    $options->drawLightModules    = false;
    $options->drawCircularModules = true;
    $options->circleRadius        = 0.4;
    $options->keepAsSquare        = [
      QRMatrix::M_FINDER_DARK,
      QRMatrix::M_FINDER_DOT,
      QRMatrix::M_ALIGNMENT_DARK,
    ];
    // ecc level H is required for logo space
    $options->eccLevel            = EccLevel::H;
    $options->addLogoSpace        = true;
    $options->logoSpaceWidth      = 15;
    $options->logoSpaceHeight     = 15;

    $qrcode = new QRCode($options);
    $qrcode->addByteSegment($data);
    $qrOutputInterface = new QRImageWithLogo($options, $qrcode->getQRMatrix());
    $out = $qrOutputInterface->dump(null, $brandLogoPath);

    $qrImage = '<img src="' .  $out . '" class="card-img rounded" alt="QR Code" />';

    return $qrImage;
  }

  public function actionChange($f = null)
  {
    $this->layout = 'form/register';

    if (!isset(user()->period)) {
      Yii::$app->user->logout();
      return $this->redirect(['/auth']);
    }

    $session = Yii::$app->session;

    $model = $this->findBookingModel(userId());
    $model->scenario = 'denso';
    $modelMeta = new  BookingMeta();
    $modelMeta->scenario = 'denso';

    $model->period_id = $session->get('BOOKING_SELECTED_PERIOD');
    $model->source_id = $session->get('BOOKING_EMPLOYEE_ID');
    $model->company_id = $session->get('BOOKING_COMPANY_ID');

    $companyModel = Company::findOne($model->company_id);
    $periodModel = Period::findOne($model->period_id);


    if (Yii::$app->request->isPost && isset($_POST['Booking']['period_id'])) {
      $post = Yii::$app->request->post();

      $existingBookingModel = $model;

      if ($existingBookingModel->delete()) {
        $loginModel = new LoginForm();
        $loginModel->username = $post['Booking']['source_id'];
        $loginModel->company_id = $post['Booking']['company_id'];
        $loginModel->period_id = $post['Booking']['period_id'];
        if ($loginModel->login()) {
          Yii::$app->session->set('BOOKING_SELECTED_PERIOD', $loginModel->period_id);
          Yii::$app->session->set('BOOKING_EMPLOYEE_ID', $loginModel->username);
          Yii::$app->session->set('BOOKING_COMPANY_ID', $loginModel->company_id);
          return $this->redirect(['/register']);
        }
      }
    }

    $userAllowPeriods = $session->get('BOOKING_SELECTABLE_PERIOD');

    $userInPeriod = false;
    foreach ($userAllowPeriods as $allowPeriod) {
      if ($allowPeriod['start_date'] <= date('Y-m-d') && $allowPeriod['end_date'] <= date('Y-m-d'))
        $userInPeriod = true;
    }

    ArrayHelper::multisort($userAllowPeriods, ['start_date'], [SORT_DESC]);

    $companyModel = Company::findOne($model->company_id);

    $periodOptions = [];

    $formatter = Yii::$app->formatter;
    foreach ($userAllowPeriods as $v) {
      $periodName = $v['period_name'];
      if (in_array($companyModel->id, [20, 202])) {
        $periodOptions[$v['period_id']] = $v['period_name'];
      } else {
        $periodOptions[$v['period_id']] = $v['period_name'] . ' | ' . Yii::$app->date->date('j F Y', strtotime($v['start_date']));
      }
    }

    asort($periodOptions);

    $this->setNecessary($companyModel);
    $this->view->params['periodName'] = $periodModel->name;


    return $this->render('/register/form/denso_change', [
      'model' => $model,
      'modelMeta' => $modelMeta,
      'periodOptions' => $periodOptions,
    ]);
  }

  protected function findBookingModel($id)
  {
    if (($model = Booking::findOne(['id' => $id])) !== null) {
      return $model;
    }

    throw new NotFoundHttpException('The requested page does not exist.');
  }
}


class QRImageWithLogo extends QRGdImagePNG
{

  /**
   * @param string|null $file
   * @param string|null $logo
   *
   * @return string
   * @throws \chillerlan\QRCode\Output\QRCodeOutputException
   */
  public function dump(string $file = null, string $logo = null): string
  {
    // set returnResource to true to skip further processing for now
    $this->options->returnResource = true;

    // of course, you could accept other formats too (such as resource or Imagick)
    // I'm not checking for the file type either for simplicity reasons (assuming PNG)
    if (!is_file($logo) || !is_readable($logo)) {
      throw new QRCodeOutputException('invalid logo');
    }

    // there's no need to save the result of dump() into $this->image here
    parent::dump($file);

    $im = imagecreatefrompng($logo);

    // get logo image size
    $w = imagesx($im);
    $h = imagesy($im);

    // set new logo size, leave a border of 1 module (no proportional resize/centering)
    $lw = (($this->options->logoSpaceWidth - 2) * $this->options->scale);
    $lh = (($this->options->logoSpaceHeight - 2) * $this->options->scale);

    // get the qrcode size
    $ql = ($this->matrix->getSize() * $this->options->scale);

    // scale the logo and copy it over. done!
    imagecopyresampled($this->image, $im, (($ql - $lw) / 2), (($ql - $lh) / 2), 0, 0, $lw, $lh, $w, $h);

    $imageData = $this->dumpImage();

    $this->saveToFile($imageData, $file);

    if ($this->options->outputBase64) {
      $imageData = $this->toBase64DataURI($imageData);
    }

    return $imageData;
  }
}

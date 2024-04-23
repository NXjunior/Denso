<?php

namespace frontend\controllers;

use frontend\models\LoginForm;
use common\models\Period;
use common\models\Booking;
use common\models\RegistrantInfo;
use common\models\RegistrantDocument;
use common\models\Company;
use backend\models\LogGeneral;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\search\School;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\db\Expression;

/**
 * Site controller
 */
class AuthController extends Controller
{
  /**
   * @inheritdoc
   */
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'rules' => [
          [
            'actions' => ['index', 'period'],
            'allow' => true,
          ],
          // [
          //   'actions' => ['otp'],
          //   'allow' => true,
          //   'roles' => ['@'],
          // ],
        ],
      ],
    ];
  }

  /**
   * @inheritdoc
   */
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



  protected function setNecessary()
  {

    $dirAsset = Yii::$app->assetManager->getPublishedUrl('@coreui/dist');

    $this->view->params['logoImage'] = $dirAsset . "/assets/brand/nextschool.png";
    $this->view->params['siteName'] = Yii::$app->name;
    $this->view->params['siteABS'] = Yii::$app->name;
    $this->view->params['profileImage'] =   $dirAsset . "/assets/img/avatars/owl.png";
    $this->view->params['dirAsset'] = $dirAsset;
  }

  public function actionIndex()
  {
    $this->layout = 'auth';

    if (!\Yii::$app->user->isGuest) {
      return $this->goHome();
    }

    $model = new LoginForm();

    if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
      $today =  date('Y-m-d H:ii:ss');

      if ($model->existingEmployeeCode($model->company_id)) {

        $sql = "SELECT
                c.id, c.name, p.id AS period_id, start_date, end_date, p.name AS period_name, p.status AS status
              FROM
                  company c
              INNER JOIN period p ON p.company_id = c.id
              WHERE (start_date <= CURRENT_TIMESTAMP and end_date >= CURRENT_TIMESTAMP AND p.status != :periodInActive)
              OR p.status = :periodActive
              GROUP BY c.id, p.id
              ORDER BY c.id, p.name, p.id DESC";

        $allPeriods = db()->createCommand($sql, [
          ':periodInActive' => Period::STATUS_DELETE,
          ':periodActive' => Period::STATUS_ACTIVE,
        ])->queryAll();

        $selectedSchoolPeriods = array_filter($allPeriods, function ($v) use ($model) {
          return $v['id'] == $model->company_id;
        });

        $activePeriod = array_filter($selectedSchoolPeriods, function ($v) use ($today) {
          return $v['start_date'] <=  $today && $v['end_date'] >=  $today;
        });

        $enablePeriod = array_filter($selectedSchoolPeriods, function ($v) {
          return $v['status'] !== 2;
        });

        // // Check Has Data In Registrant
        $activeRegistrant = Booking::find()->where([
          'source_id' => $model->username,
          'company_id' => $model->company_id,
        ])->andWhere('period_id is not null and deleted_at is null')->all();

        $inActiveRegistrant = Booking::find()->where([
          'source_id' => $model->username,
          'company_id' => $model->company_id,
        ])->andWhere('period_id is not null and deleted_at is not null')->all();

        $totalActivePeriod = count($activePeriod);
        $totalInActiveRegistrant = count($inActiveRegistrant);

        $allPeriodThatUserDeleted = [];
        foreach ($inActiveRegistrant as $inactiveInfo) {
          $allPeriodThatUserDeleted[] = $inactiveInfo->period_id;
        }

        $superActivePeriod = array_filter($activePeriod, function ($v) use ($allPeriodThatUserDeleted) {
          return !in_array($v['period_id'], $allPeriodThatUserDeleted);
        });

        if ($superActivePeriod !== $activePeriod) {
          if (count($activePeriod) == 0 || count($enablePeriod) == 0) {
            // $model->addError('school_id', 'คุณไม่มีข้อมูลในระบบ และ/หรือ ระบบยังไม่ได้เปิดรับจอง');
            Yii::$app->session->setFlash('error', 'คุณไม่มีข้อมูลในระบบ และ/หรือ ระบบยังไม่ได้เปิดรับจอง');
          } else {
            Yii::$app->session->set('BOOKING_SELECTABLE_PERIOD', $superActivePeriod);
            Yii::$app->session->set('BOOKING_EMPLOYEE_ID', $model->username);
            Yii::$app->session->set('BOOKING_COMPANY_ID', $model->company_id);
            return $this->redirect(['auth-period']);
          }
        } else {
          // Get Active Period + Period That User IN
          $periodThatUserIn = array_column(array_filter($activeRegistrant, function ($v) {
            return $v && !is_null($v->period_id);
          }), 'period_id');

          $userAllowPeriods = array_filter($selectedSchoolPeriods, function ($v) use ($periodThatUserIn,  $today) {
            return ($v['start_date'] <=  $today && $v['end_date'] >=  $today)
              || in_array($v['period_id'], $periodThatUserIn);
          });

          if (count($activePeriod) == 0 && count($enablePeriod) == 0) {
            Yii::$app->session->setFlash('error', 'ขออภัย ระบบยังไม่ได้เปิดรับจอง');
          } else if (count($userAllowPeriods)) {

            Yii::$app->session->set('BOOKING_SELECTABLE_PERIOD', $userAllowPeriods);
            Yii::$app->session->set('BOOKING_EMPLOYEE_ID', $model->username);
            Yii::$app->session->set('BOOKING_COMPANY_ID', $model->company_id);

            return $this->redirect(['period']);
          } else {
            Yii::$app->session->set('BOOKING_EMPLOYEE_ID', $model->username);
            Yii::$app->session->set('BOOKING_COMPANY_ID', $model->company_id);
            Yii::$app->session->setFlash('error', 'ขออภัย ระบบยังไม่ได้เปิดรับจอง');
            // $model->addError('school_id', 'ขออภัยโรงเรียนยังไม่ได้เปิดรับสมัคร_');
          }
        }
      } else {
        Yii::$app->session->setFlash('error', "ขออภัย ระบบยังไม่ได้เปิดรับจอง");
      }
    }

    $companyModel = $this->getCompanyModel();
    $this->setNecessary();

    return $this->render('index', [
      'model' => $model,
      'companyModel' => $companyModel,
    ]);
  }

  public function actionPeriod()
  {

    $this->layout = 'auth';

    $session = Yii::$app->session;
    $model = new LoginForm();


    $userAllowPeriods = $session->get('BOOKING_SELECTABLE_PERIOD');
    $model->username = $session->get('BOOKING_EMPLOYEE_ID');
    $model->company_id = $session->get('BOOKING_COMPANY_ID');


    if (empty($userAllowPeriods) || !$model->username || !$model->company_id || !$model) {
      return $this->redirect(['/auth']);
    }

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
      $periodOptions[$v['period_id']] = $v['period_name'];
    }

    asort($periodOptions);

    $hasBookedModel = $model->hasBooked();
    if (isset($hasBookedModel->period_id)) {
      $model->period_id = $hasBookedModel->period_id;
      if ($model->login()) {
        Yii::$app->session->set('BOOKING_SELECTED_PERIOD', $model->period_id);
        Yii::$app->session->set('BOOKING_EMPLOYEE_ID', $model->username);
        Yii::$app->session->set('BOOKING_COMPANY_ID', $model->company_id);

        return $this->redirect(['/register/qr']);
      }
    }

    if (
      Yii::$app->request->isPost && $model->load(Yii::$app->request->post())
    ) {
      $hasBookedModel = $model->hasBooked();

      if (isset($hasBookedModel->period_id)) {
        $model->period_id = $hasBookedModel->period_id;
        if ($model->login()) {
          Yii::$app->session->set('BOOKING_SELECTED_PERIOD', $model->period_id);
          Yii::$app->session->set('BOOKING_EMPLOYEE_ID', $model->username);
          Yii::$app->session->set('BOOKING_COMPANY_ID', $model->company_id);

          return $this->redirect(['/register/qr']);

          // if ($hasBookedModel && (int) $hasBookedModel->period_id !== (int) $model->period_id) {
          //   Yii::$app->session->setFlash('hasBookedPeriod', $hasBookedModel->period->name);
          // }
        }
      } else if ($model->login()) {
        Yii::$app->session->set('BOOKING_SELECTED_PERIOD', $model->period_id);
        Yii::$app->session->set('BOOKING_EMPLOYEE_ID', $model->username);
        Yii::$app->session->set('BOOKING_COMPANY_ID', $model->company_id);

        return $this->redirect(['/register']);
      }
    }

    $this->setNecessary($companyModel);

    return $this->render('period', [
      'userAllowPeriods' => $userAllowPeriods,
      'companyModel' => $companyModel,
      'model' => $model,
      'periodOptions' => $periodOptions,
      'userInPeriod' => $userInPeriod,
    ]);
  }

  private function getCompanyModel()
  {
    switch ($_SERVER['SERVER_NAME']) {
      case 'denso.local':
        $companyModel = Company::findOne(1);
        break;
      case 'denso.nextschool.io':
        $companyModel = Company::findOne(1);
        break;

      default:
        $companyModel = null;
        break;
    }

    return  $companyModel;
  }
}

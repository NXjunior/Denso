<?php

namespace frontend\controllers;

use frontend\models\LoginForm;
use common\models\RegisterPeriod;
use common\models\Booking;
use common\models\RegistrantInfo;
use common\models\Company;
use common\models\BaseDataSchool;
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
class SiteController extends Controller
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
                        'actions' => ['error', 'auth-period', 'register', 'school-list'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index', 'update', 'logout', 'help', 'info', 'calendar', 'procedure', 'reward', 'change-theme'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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

    public function actionIndex()
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/auth']);
        }

        $this->layout = 'admission/main';

        // $this->setNecessary();
        $model = $this->findModel(user()->id);

        $companyModel = Company::findOne(user()->company->id);

        if (empty($model->info->completed_last_step_at)) {
            return $this->redirect(['/register']);
        }

        $this->setLayoutParam($model);

        $fistDocApproved = (bool) db()->createCommand("select rc.id from registrant_check rc
        inner join registrant r on rc.registrant_id = r.id and rc.check_id = 0
        where r.id = :id and r.period_id = :periodID
        ", [
            ':id' => user()->id,
            ':periodID' => user()->period_id,
        ])->queryScalar();

        $secondDocApproved = (bool) db()->createCommand("select rc.id from registrant_check rc
        inner join registrant r on rc.registrant_id = r.id and rc.check_id = 1
        where r.id = :id and r.period_id = :periodID
        ", [
            ':id' => user()->id,
            ':periodID' => user()->period_id,
        ])->queryScalar();

        $thirdDocApproved = (bool) db()->createCommand("select rc.id from registrant_check rc
        inner join registrant r on rc.registrant_id = r.id and rc.check_id = 2
        where r.id = :id and r.period_id = :periodID
        ", [
            ':id' => user()->id,
            ':periodID' => user()->period_id,
        ])->queryScalar();

        $fistDocApprovedAt = db()->createCommand("select rc.created_at from registrant_check rc
        inner join registrant r on rc.registrant_id = r.id and rc.check_id = 0
        where r.id = :id and r.period_id = :periodID
        ", [
            ':id' => user()->id,
            ':periodID' => user()->period_id,
        ])->queryOne();

        $fistDocIncorrect = db()->createCommand("select rc.id, rc.remark, rc.created_at from registrant_check rc
        inner join registrant r on rc.registrant_id = r.id and rc.check_id = -1
        where r.id = :id and r.period_id = :periodID
        ", [
            ':id' => user()->id,
            ':periodID' => user()->period_id,
        ])->queryOne();


        $hasExamAnnouncement = (bool) db()->createCommand("select r.id from register_period rp inner join registrant r on rp.id = r.period_id and rp.id = :periodID
        where r.status = :status
        ", [
            ':status' => 15,
            ':periodID' => user()->period_id,
        ])->queryScalar();


        $examAttended = (bool) db()->createCommand("select 1 from registrant r
        inner join registrant_check rc on rc.registrant_id = r.id and check_id = 2
        where r.id = :id
        ", [
            ':id' => userId(),
        ])->queryScalar();

        $hasExamSeat = (bool) db()->createCommand("select es.id from exam e
        inner join registrant r on e.for_id = r.period_id and e.for_type = 0
        inner join exam_period ep on ep.exam_id = e.id
        inner join exam_location el on el.exam_id = e.id
        inner join exam_seat es on es.exam_id = e.id
            and r.id = es.person_id and es.person_type = 0 and el.id = es.location_id
            and r.period_id = :periodID
        where r.id = :id
        ", [
            ':id' => user()->id,
            ':periodID' => user()->period_id,
        ])->queryScalar();

        return $this->render('index', [
            'model' => $model,
            'companyModel' => $companyModel,
            'logoImage' => $this->getLogoImage($companyModel),
            'fistDocApproved' => $fistDocApproved,
            'fistDocApprovedAt' => $fistDocApprovedAt,
            'fistDocIncorrect' => $fistDocIncorrect,
            'secondDocApproved' => $secondDocApproved,
            'thirdDocApproved' => $thirdDocApproved,
            'examAttended' => $examAttended,
            'hasExamSeat' => $hasExamSeat,
            'hasExamAnnouncement' => $hasExamAnnouncement,
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    protected function getLogoImage($companyModel)
    {
        if (isset($companyModel->logo)) {
            $logoImage = 'https://app.nextschool.io/img/logo/' . $companyModel->logo;
        } else {
            $logoImage = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg';
        }

        return $logoImage;
    }

    protected function findModel($id)
    {
        if (($model = Booking::find()->where(['id' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function setLayoutParam($model)
    {
        $this->view->params['logoImage'] = $this->getLogoImage($model->school);
        $this->view->params['siteName'] = $model->school->fullname;
        $this->view->params['siteABS'] = $model->school->abs;
        $this->view->params['periodName'] = $model->period->name;
        $this->view->params['theme'] = 'light-theme';
    }

    protected function setNecessary()
    {
        $model = $this->findModel(user()->id);

        $this->view->params['logoImage'] = $this->getLogoImage($model->school);
        $this->view->params['siteName'] = $model->school->fullname;
        $this->view->params['siteABS'] = $model->school->abs;

        $s3BaseUrl = 'https://s3-ap-southeast-1.amazonaws.com/nextschool.com/students/';
        $dirAsset = Yii::$app->assetManager->getPublishedUrl('@coreui/dist');
        $profileImage = isset($model->image) ? $s3BaseUrl . $model->image : $dirAsset . "/assets/img/avatars/owl.png";

        $this->view->params['profileImage'] = $profileImage;
    }

    public function actionChangeTheme()
    {
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            Yii::$app->session->set('THEME', $post['theme'] . '-theme');
        }
    }
}

<?php

namespace backend\controllers;

use common\models\Activity;
use common\models\Booking;
use common\models\BookingMeta;
use common\models\BookingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;

/**
 * BookingController implements the CRUD actions for Booking model.
 */
class BookingController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'index', 'create', 'update',
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return userRole() === 'Admin';
                        },
                    ], [
                        'actions' => ['bpk', 'wgr', 'qr', 'vaccinated', 'walkin', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Booking models.
     *
     * @return string
     */
    public function actionIndex()
    {

        $searchModel = new BookingSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'queryParams' => $this->request->queryParams,
        ]);
    }

    public function actionBpk()
    {

        $searchModel = new BookingSearch();
        $searchModel->period_id = 1;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'queryParams' => $this->request->queryParams,
        ]);
    }

    public function actionWgr()
    {

        $searchModel = new BookingSearch();
        $searchModel->period_id = 2;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'queryParams' => $this->request->queryParams,
        ]);
    }

    /**
     * Displays a single Booking model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $activityModel = Activity::find()->where([
            'booking_id' => $id,
            'kind' => (string) Activity::KIND_VACCINATED
        ])->one();


        if (Yii::$app->request->isPost) {
            if (Yii::$app->request->post('Booking')) {
                $post = Yii::$app->request->post();
                $metas = $post['Booking']['meta'];

                foreach ($metas as $metaKey => $metaValue) {
                    $metaModel = BookingMeta::find()
                        ->where(['booking_id' => $id, 'meta_key' => $metaKey])
                        ->one();
                    $metaModel->meta_value = $metaValue;
                    if (!$metaModel->save()) {
                        dump($metaModel->errors);
                        exit();
                    }
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }


        return $this->render('view', [
            'model' => $model,
            'activityModel' => $activityModel
        ]);
    }

    /**
     * Creates a new Booking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Booking();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Booking model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Booking model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        // $this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->status = $model::STATUS_DELETE;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Booking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Booking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Booking::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionQr()
    {
        if (Yii::$app->request->isPost && isset($_POST['qr-data'])) {
            $post = Yii::$app->request->post();

            $qr = explode(Booking::CONFIG_SPLIT_QR_CHAR, $post['qr-data']);
            $qrData = [
                'employee_code' => $qr[0],
                'company_id' => $qr[1],
                'period_id' => $qr[2],
                'slot_id' => $qr[3],
            ];

            $bookingModel = Booking::find()->where([
                'source_id' => $qrData['employee_code'],
                'company_id' => $qrData['company_id'],
                'period_id' => $qrData['period_id'],
                'target_id' => $qrData['slot_id'],
            ])->one();

            if (isset($bookingModel->id)) {
                return $this->render('qr', [
                    'model' => $bookingModel,
                ]);
            } else {
                Yii::$app->session->setFlash('qrError', true);
            }
        }

        return $this->render('qr');
    }

    public function actionVaccinated($id)
    {
        if (isset($id) && !empty($id)) {
            $model = $this->findModel($id);
            if (isset($model->id)) {

                $activityModel = Activity::find()->where([
                    'booking_id' => $model->id,
                    'kind' => (string) Activity::KIND_VACCINATED
                ])->one();

                if (isset($activityModel->id)) {
                    $activityModel->delete();
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    $activityModel = new Activity();
                    $activityModel->booking_id = $model->id;
                    $activityModel->kind = (string) Activity::KIND_VACCINATED;
                    $activityModel->creator = userId();

                    if ($activityModel->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {
                        dump($activityModel->errors);
                        exit;
                    }
                }
            } else {
                Yii::$app->session->setFlash('notFoundBooking', true);
            }
        }
    }

    public function actionWalkin()
    {

        $model = new Booking();
        $model->company_id = user()->company_id;

        if (userRole() === 'Manager') {
            if (user()->username == 'denso_bpk')
                $model->period_id = 1;
            else if (user()->username == 'denso_wgr')
                $model->period_id = 2;
        }

        if ($this->request->isPost) {
            $post = Yii::$app->request->post();

            $existingBooking = Booking::find()->where(['source_id' => $post['Booking']['source_id']])->one();

            $model->method = Booking::METHOD_WALKIN;
            $model->source_id = $post['Booking']['source_id'];
            $model->period_id = $post['Booking']['period_id'];
            $model->walkin_date = date('Y-m-d');
            $model->walkin_time = $post['Booking']['walkin_time'];
            $model->status = Booking::STATUS_ACTIVE;
            $model->creator = userId();

            if (!$existingBooking) {
                if ($model->save())
                    return $this->redirect(['view', 'id' => $model->id]);
                else {
                    dump($model->errors);
                    exit;
                }
            } else {
                Yii::$app->session->setFlash('existingBooking', true);
                Yii::$app->session->setFlash('existingBookingId', $existingBooking->id);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('walkin', [
            'model' => $model,
        ]);
    }
}

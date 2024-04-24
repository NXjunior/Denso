<?php

namespace backend\controllers;

use common\models\Activity;
use common\models\Booking;
use common\models\Employee;
use common\models\BookingSearch;
use yii\filters\AccessControl;
use common\models\EmployeeSearch;

class ReportController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'vaccinated'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return userRole() === 'Admin';
                        },
                    ], [
                        'actions' => ['vaccinated-bpk', 'vaccinated-wgr', 'not-book', 'booking-all', 'booking-bpk', 'booking-wgr', 'bpk', 'wgr'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    public function actionIndex()
    {

        $employee_all = Employee::find()->where(['status' => Employee::STATUS_ACTIVE])->count();

        $booked_all = Booking::find()->where(['status' => Booking::STATUS_ACTIVE])->count();

        $booked_bpk = Booking::find()->where([
            'status' => Booking::STATUS_ACTIVE,
            'period_id' => 1,
        ])->count();

        $booked_wgr = Booking::find()->where([
            'status' => Booking::STATUS_ACTIVE,
            'period_id' => 2,
        ])->count();

        $vaccinated_all = Activity::find()->where(['kind' => Activity::KIND_VACCINATED])->count();

        $vaccinated_bpk = Activity::find()
            ->innerJoin('booking', 'booking.id = activity.booking_id')
            ->where([
                'kind' => Activity::KIND_VACCINATED,
                'period_id' => 1
            ])->count();

        $vaccinated_wgr = Activity::find()
            ->innerJoin('booking', 'booking.id = activity.booking_id')
            ->where([
                'kind' => Activity::KIND_VACCINATED,
                'period_id' => 2
            ])->count();


        $data = [
            'employee_all' => number_format($employee_all),
            'employee_not_booked' => number_format($employee_all - $booked_all),
            'booked_all' => number_format($booked_all),
            'booked_bpk' => $booked_bpk,
            'booked_wgr' => $booked_wgr,
            'vaccinated_all' => $vaccinated_all,
            'vaccinated_bpk' => $vaccinated_bpk,
            'vaccinated_wgr' => $vaccinated_wgr,
        ];

        return $this->render('index', [
            'data' => $data,
        ]);
    }

    public function actionBpk()
    {

        $employee_all = Employee::find()->where(['status' => Employee::STATUS_ACTIVE])->count();

        $booked_all = Booking::find()->where(['status' => Booking::STATUS_ACTIVE])->count();

        $booked_bpk = Booking::find()->where([
            'status' => Booking::STATUS_ACTIVE,
            'period_id' => 1,
        ])->count();

        $booked_wgr = Booking::find()->where([
            'status' => Booking::STATUS_ACTIVE,
            'period_id' => 2,
        ])->count();

        $vaccinated_all = Activity::find()->where(['kind' => Activity::KIND_VACCINATED])->count();

        $vaccinated_bpk = Activity::find()
            ->innerJoin('booking', 'booking.id = activity.booking_id')
            ->where([
                'kind' => Activity::KIND_VACCINATED,
                'period_id' => 1
            ])->count();

        $vaccinated_wgr = Activity::find()
            ->innerJoin('booking', 'booking.id = activity.booking_id')
            ->where([
                'kind' => Activity::KIND_VACCINATED,
                'period_id' => 2
            ])->count();


        $data = [
            'employee_all' => number_format($employee_all),
            'employee_not_booked' => number_format($employee_all - $booked_all),
            'booked_all' => number_format($booked_all),
            'booked_bpk' => $booked_bpk,
            'booked_wgr' => $booked_wgr,
            'vaccinated_all' => $vaccinated_all,
            'vaccinated_bpk' => $vaccinated_bpk,
            'vaccinated_wgr' => $vaccinated_wgr,
        ];

        return $this->render('bpk', [
            'data' => $data,
        ]);
    }

    public function actionWgr()
    {

        $employee_all = Employee::find()->where(['status' => Employee::STATUS_ACTIVE])->count();

        $booked_all = Booking::find()->where(['status' => Booking::STATUS_ACTIVE])->count();

        $booked_bpk = Booking::find()->where([
            'status' => Booking::STATUS_ACTIVE,
            'period_id' => 1,
        ])->count();

        $booked_wgr = Booking::find()->where([
            'status' => Booking::STATUS_ACTIVE,
            'period_id' => 2,
        ])->count();

        $vaccinated_all = Activity::find()->where(['kind' => Activity::KIND_VACCINATED])->count();

        $vaccinated_bpk = Activity::find()
            ->innerJoin('booking', 'booking.id = activity.booking_id')
            ->where([
                'kind' => Activity::KIND_VACCINATED,
                'period_id' => 1
            ])->count();

        $vaccinated_wgr = Activity::find()
            ->innerJoin('booking', 'booking.id = activity.booking_id')
            ->where([
                'kind' => Activity::KIND_VACCINATED,
                'period_id' => 2
            ])->count();


        $data = [
            'employee_all' => number_format($employee_all),
            'employee_not_booked' => number_format($employee_all - $booked_all),
            'booked_all' => number_format($booked_all),
            'booked_bpk' => $booked_bpk,
            'booked_wgr' => $booked_wgr,
            'vaccinated_all' => $vaccinated_all,
            'vaccinated_bpk' => $vaccinated_bpk,
            'vaccinated_wgr' => $vaccinated_wgr,
        ];

        return $this->render('wgr', [
            'data' => $data,
        ]);
    }

    public function actionVaccinated()
    {
        $searchModel = new BookingSearch();
        $searchModel->vaccinated = 'yes';
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('vaccinated', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'queryParams' => $this->request->queryParams,
        ]);
    }

    public function actionVaccinatedBpk()
    {
        $searchModel = new BookingSearch();
        $searchModel->vaccinated = 'yes';
        $searchModel->period_id = 1;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('vaccinated', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'queryParams' => $this->request->queryParams,
        ]);
    }

    public function actionVaccinatedWgr()
    {
        $searchModel = new BookingSearch();
        $searchModel->vaccinated = 'yes';
        $searchModel->period_id = 2;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('vaccinated', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'queryParams' => $this->request->queryParams,
        ]);
    }

    public function actionNotBook()
    {
        $searchModel = new EmployeeSearch();
        $searchModel->company_id = 1; //denso
        $searchModel->booked = 'no';
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('/employee/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'queryParams' => $this->request->queryParams,
        ]);
    }

    public function actionBookingAll()
    {
        $searchModel = new BookingSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('/booking/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'queryParams' => $this->request->queryParams,
        ]);
    }

    public function actionBookingBpk()
    {
        $searchModel = new BookingSearch();
        $searchModel->period_id = 1;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('/booking/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'queryParams' => $this->request->queryParams,
        ]);
    }

    public function actionBookingWgr()
    {
        $searchModel = new BookingSearch();
        $searchModel->period_id = 2;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('/booking/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'queryParams' => $this->request->queryParams,
        ]);
    }
}

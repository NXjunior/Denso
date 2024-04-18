<?php

namespace backend\controllers;

use common\models\Activity;
use common\models\Booking;
use common\models\BookingSearch;
use yii\filters\AccessControl;

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
                        'actions' => ['vaccinated-bpk', 'vaccinated-wgr'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
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
}

<?php

namespace backend\controllers;

use common\models\Activity;
use common\models\Booking;
use common\models\BookingSearch;

class ReportController extends \yii\web\Controller
{
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
}

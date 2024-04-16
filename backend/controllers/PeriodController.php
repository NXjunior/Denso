<?php

namespace backend\controllers;

use common\models\Period;
use common\models\PeriodSearch;
use common\models\Slot;
use common\models\SlotSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;

/**
 * PeriodController implements the CRUD actions for period model.
 */
class PeriodController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all period models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PeriodSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single period model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $searchModel = new SlotSearch();
        $searchModel->period_id = $id;
        $searchModel->status = $searchModel::STATUS_ACTIVE;
        $dataProvider = $searchModel->search($this->request->queryParams);

        $sql = "SELECT slot_date, SUM(quota) as quota
                FROM slot WHERE status = :status
                AND period_id = :periodId
                GROUP BY slot_date
                ORDER BY slot_date";

        $slotDataProvider = new ArrayDataProvider([
            'allModels' => db()->createCommand($sql, [
                ':periodId' => $id,
                ':status' => Slot::STATUS_ACTIVE,
            ])->queryAll(),
            'pagination' => false,
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'slotDataProvider' => $slotDataProvider
        ]);
    }

    /**
     * Creates a new period model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new period();

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
     * Updates an existing period model.
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
     * Deletes an existing period model.
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
     * Finds the period model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return period the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Period::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

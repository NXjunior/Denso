<?php

namespace backend\controllers;

use common\models\Slot;
use common\models\SlotSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use Yii;

/**
 * SlotController implements the CRUD actions for Slot model.
 */
class SlotController extends Controller
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
     * Lists all Slot models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SlotSearch();
        $searchModel->status = $searchModel::STATUS_ACTIVE;
        $dataProvider = $searchModel->search($this->request->queryParams);


        if (Yii::$app->request->post('hasEditable')) {
            $targetId = \Yii::$app->request->post('editableKey');
            $attribute = \Yii::$app->request->post('editableAttribute');
            $targetModel = Slot::findOne($targetId);

            $out = Json::encode(['output' => '', 'message' => '']);

            if ($targetModel->period && $targetModel->period->company_id == 1) {
                $posted = current($_POST['Slot']);

                $post = ['Slot' => $posted];
                if ($targetModel->load($post)) {
                    $output = '';

                    $keys = array_keys($posted);

                    if ($targetModel->save(true, $keys)) {

                        if ($attribute == 'quota') {
                            $output = $posted['quota'];
                        }

                        $out = Json::encode(['output' => $output, 'message' => '']);
                    } else {
                        $out = Json::encode([
                            'output' => $output,
                            'message' => array_values($targetModel->getFirstErrors())[0]
                        ]);
                    }
                }
            }

            echo $out;
            return;
        }


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slot model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Slot model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Slot();

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
     * Updates an existing Slot model.
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
     * Deletes an existing Slot model.
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
     * Finds the Slot model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Slot the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slot::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

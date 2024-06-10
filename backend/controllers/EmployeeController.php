<?php

namespace backend\controllers;

use common\models\Employee;
use common\models\EmployeeMeta;
use common\models\EmployeeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\web\Response;
use yii\db\Query;

/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller
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
     * Lists all Employee models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeSearch();
        $searchModel->company_id = 1; //denso
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'queryParams' => $this->request->queryParams,
        ]);
    }

    /**
     * Displays a single Employee model.
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
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Employee();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $transaction = db()->beginTransaction();
                try {
                    if ($model->save()) {
                        $modelMeta = new EmployeeMeta();
                        $modelMeta->employee_id = $model->id;
                        $modelMeta->meta_key = 'company_code';
                        $modelMeta->meta_value = (string) $model->company_code;
                        if (!$modelMeta->save()) {
                            var_dump($modelMeta->meta_value);
                            var_dump($modelMeta->errors);
                            exit;
                        }
                    } else {
                        dump($model->errors);
                        exit;
                    }
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id]);
                } catch (\Exception $exception) {
                    $transaction->rollBack();
                    $errors[] = 'DB Error';
                    dump($exception->getMessage());
                    exit();
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->company_code = $model->meta['company_code'];

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Employee model.
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
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employee::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionList($q = null, $id = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select(['id', 'CONCAT(title, \' \',firstname, \' \', lastname, \' : \', code) AS text'])
                ->from('employee')
                ->where([
                    'or',
                    ['like', 'firstname', $q],
                    ['like', 'lastname', $q],
                    ['like', 'firstname_en', $q],
                    ['like', 'lastname_en', $q],
                    ['like', 'code', $q],
                ])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Employee::find($id)->fullname];
        }
        return $out;
    }


    public function actionListX()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];

        // For List Query Behave List
        if (isset($_GET['search']['term']) && strlen($_GET['search']['term']) > 0) {
            $behave = Employee::findBySql("select id, concat(title,' ',firstname, ' ', lastname) as text from employee where company_id = :id
            and (firstname like :search or lastname like :search or title like :search) and status = :employeeStatus
            ", [
                ':id' =>  user()->company_id,
                ':search' => '%' . $_GET['search']['term'] . '%',
                ':employeeStatus' => Employee::STATUS_ACTIVE
            ])->asArray()->all();

            return ['results' => $behave];
        }

        return [];
    }
}

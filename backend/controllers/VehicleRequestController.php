<?php

namespace backend\controllers;

use common\models\VehicleRequest;
use common\models\VehicleRequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Vehicle;
use common\models\Province;
use yii\db\Query;
use Yii;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;

/**
 * VehicleRequestController implements the CRUD actions for VehicleRequest model.
 */
class VehicleRequestController extends Controller
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
     * Lists all VehicleRequest models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VehicleRequestSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $model = new VehicleRequest();
        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'queryParams' => $this->request->queryParams,
        ]);
    }

    /**
     * Displays a single VehicleRequest model.
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
     * Creates a new VehicleRequest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new VehicleRequest();
        $modelVehicle = new Vehicle();
        if ($this->request->isPost) {           
            $post = $this->request->post();
        
            if($modelVehicle->load($post) && $model->load($post)){
              
                    $modelVehicle->image = UploadedFile::getInstance($modelVehicle,'image');
                    if($modelVehicle->image){
                        $unique_image = uniqid('file_');
                        $file_type = $modelVehicle->image->extension;
                        $file_image_name = $unique_image.'.'.$file_type;
                        $file_path = Yii::getAlias('@backend/web/uploads');
                        $modelVehicle->image->saveAs($file_path .'/'. $file_image_name);
                        $modelVehicle->image = $file_image_name;
                    }
                    $modelVehicle->plate_image = UploadedFile::getInstance($modelVehicle,'plate_image');
                    if($modelVehicle->plate_image){
                        $unique_plate_image = uniqid('file_');
                        $file_type = $modelVehicle->plate_image->extension;
                        $file_plate_name = $unique_plate_image.'.'.$file_type;
                        $file_path = Yii::getAlias('@backend/web/uploads');
                        $modelVehicle->plate_image->saveAs($file_path .'/'. $file_plate_name);
                        $modelVehicle->plate_image = $file_plate_name;
                    }
                

                if($modelVehicle->save()){
                    $model->vehicle_id = $modelVehicle->id;
                    $model->requested_role = VehicleRequest::ROLE_STUDENT;
                    $model->creator = Yii::$app->user->id;
                    $model->status = VehicleRequest::STATUS_REQUEST;
                    if($model->save()){
                        return $this->redirect(['view', 'id' => $model->id]);
                    }else{
                        dump($model->errors);
                        exit;
                    }
                }else{
                    dump($modelVehicle->errors);
                    exit;
                }
            }else{
                dump($model->errors);
                dump($modelVehicle->errors);
                exit;
            }

        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modelVehicle' => $modelVehicle
        ]);
    }
    /**
     * Updates an existing VehicleRequest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelVehicle = $model->vehicle;
        if ($this->request->isPost) {           
            $post = $this->request->post();
            
            $this->checkImageInput($modelVehicle,'image');
            $this->checkImageInput($modelVehicle,'plate_image');
            $oldImg = $modelVehicle->image;
            $oldPlateImg = $modelVehicle->plate_image;
            if($modelVehicle->load($post) && $model->load($post)){
                $saveImage = UploadedFile::getInstance($modelVehicle,'image');
                if($saveImage){
                    $unique_image = uniqid('vehicle_');
                    $file_type = $saveImage->extension;
                    $file_image_name = $unique_image.'.'.$file_type;
                    $file_path = Yii::getAlias('@backend/web/uploads');
                    $saveImage->saveAs($file_path .'/'. $file_image_name);
                    $modelVehicle->image = $file_image_name;
                }else{
                    $modelVehicle->image = $oldImg;
                }

                $savePlateImage = UploadedFile::getInstance($modelVehicle,'plate_image');
                if($savePlateImage){
                    $unique_plate_image = uniqid('plate_');
                    $file_type = $savePlateImage->extension;
                    $file_plate_name = $unique_plate_image.'.'.$file_type;
                    $file_path = Yii::getAlias('@backend/web/uploads');
                    $savePlateImage->saveAs($file_path .'/'.$file_plate_name);
                    $modelVehicle->plate_image = $file_plate_name;
                }else{
                    $modelVehicle->plate_image = $oldPlateImg;
                }

                if($modelVehicle->save()){
                    $model->vehicle_id = $modelVehicle->id;
                    $model->requested_role = VehicleRequest::ROLE_STUDENT;
                    $model->creator = Yii::$app->user->id;
                    $model->status = VehicleRequest::STATUS_REQUEST;
                    if($model->save()){
                        return $this->redirect(['view', 'id' => $model->id]);
                    }else{
                        dump($model->errors);
                        exit;
                    }
                }else{
                    dump($modelVehicle->errors);
                    exit;
                }
            }else{
                dump($model->errors);
                dump($modelVehicle->errors);
                exit;
            }

        } else {
            $model->loadDefaultValues();
        }
        

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing VehicleRequest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model){
            $model->updater = Yii::$app->user->id;
            $model->status = VehicleRequest::STATUS_DELETE;
            $model->save();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the VehicleRequest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return VehicleRequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VehicleRequest::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionListProvince($q = null, $id = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select(['id', 'name AS text'])
                ->from('province')
                ->where([
                    'or',
                    ['like', 'name', $q],
                ])
                ->limit(10);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        } elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Province::find($id)->name];
        }
        return $out;
    }

public function checkImageInput($modelVehicle,string $input)
{
    if(!$input){
        return false;
    }
    if(UploadedFile::getInstance($modelVehicle,$input)){
        // dd($modelVehicle->image);
        if($modelVehicle->$input != ""){
            $path = Yii::getAlias('@backend/web/uploads/');
            if(file_exists($path.$modelVehicle->$input)){
                unlink($path.$modelVehicle->$input);
            }
        }
    }

}

}

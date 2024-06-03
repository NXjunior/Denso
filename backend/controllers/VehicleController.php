<?php 
namespace backend\controllers;

use yii\web\Controller;
use backend\models\MemberForm;
use Yii;

class VehicleController extends Controller{
    
    public function actionIndex(){
        $model = new MemberForm;
        $hello = "Hello Magic";
        $request = Yii::$app->request;
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            var_dump($request->post());
        }else{
            return $this->render('index',["hello" => $hello,"model"=>$model]);
        }
    }

}

<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Application;
use yii\web\Response;
use yii\web\NotFoundHttpException;

class ApplicationController extends Controller
{
    public $enableCsrfValidation = false; //for postman api testing
//Mansoor - 15-3-25 - create form fields functionality
    public function actionCreate()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $postData = json_decode(file_get_contents("php://input"), true);

        if (!$postData) {
            return ['status' => 'error', 'message' => 'No data received', 'received' => $postData];
        }
        $model = new Application();        
        $model->attributes = $postData;
    
        if ($model->validate() && $model->save()) {
            return ['status' => 'success', 'data' => $model];
        }
    
        return ['status' => 'error', 'errors' => $model->errors];
    }
 
//Mansoor - 15-3-25 - update form fields functionality
    public function actionUpdate($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;    
        $postData = json_decode(file_get_contents("php://input"), true);
        if (!$postData) {
            return ['status' => 'error', 'message' => 'No data received', 'received' => $postData];
        }
        $model = Application::findOne($id);
    
        if (!$model) {
            return ['status' => 'error', 'message' => 'Application not found'];
        }
    
        $model->attributes = $postData;
        if ($model->validate() && $model->save()) {
            return ['status' => 'success', 'data' => $model];
        }

        return ['status' => 'error', 'errors' => $model->errors];
    }
    
}

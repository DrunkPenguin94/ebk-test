<?php
/**
 * Created by PhpStorm.
 * User: Drunk penguin
 * Date: 25.12.2018
 * Time: 16:19
 */

namespace frontend\controllers;


use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\web\Controller;

class RestController extends ActiveController
{

    public function init(){
        parent::init();
        \Yii::$app->user->enableSession = false;
    }
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
        ];
        return $behaviors;
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],

        ];
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Drunk penguin
 * Date: 24.12.2018
 * Time: 17:08
 */

namespace console\controllers;


use common\models\Algorithm;
use common\models\Data;
use yii\console\Controller;

class ApiController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],

        ];
    }

    public function actionIndex($n,$str){


        $modelData=new Data($n,$str);
        $modelAlgorithm=new Algorithm;

        if($modelData->validate()){
            $result = $modelData->processing($modelAlgorithm);
            echo $result;
            return 0;
        }else{
            echo "Input Error";
            return 1;
        }





    }
}
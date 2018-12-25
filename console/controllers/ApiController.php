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
use frontend\models\SignupForm;
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
    //консольная команда для вычисления алгоритмом
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

    //команда для создания нового юзера по логину паролю, выдает токен доступа
    public function actionNewuser($login,$password){
        $model = new SignupForm();
        $model->username=$login;
        $model->password=$password;
        $user=$model->signup();
        if($user){
            echo "User create, access token : ".$user->access_token;
            return 0;
        }else{
            echo "Input Error";
            return 1;
        }

    }
}
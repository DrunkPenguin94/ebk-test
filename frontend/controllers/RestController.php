<?php
/**
 * Created by PhpStorm.
 * User: Drunk penguin
 * Date: 25.12.2018
 * Time: 16:19
 */

namespace frontend\controllers;



use common\models\DataActiveRecord;
use common\models\Algorithm;
use common\models\Data;

use Yii;
use yii\filters\auth\CompositeAuth;

use yii\filters\auth\QueryParamAuth;

use yii\web\Controller;


class RestController extends Controller
{


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [

                QueryParamAuth::className(),
            ],
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

    public function actionIndex($n,$str){
        $modelUser=Yii::$app->user->identity;


        $modelData=new Data($n,$str);
        $modelAlgorithm=new Algorithm;

        if($modelData->validate()){
            $result = $modelData->processing($modelAlgorithm);
            $modelDataRecord=new DataActiveRecord;
            $modelDataRecord->setAll($n,$str,$result,$modelUser->id);
            if($modelDataRecord->validate()){
                $modelDataRecord->save();
            }
            return $result;
        }else{

            return "Input Error";
        }


//        return "true ";
    }
}
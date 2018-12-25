<?php
/**
 * Created by PhpStorm.
 * User: Drunk penguin
 * Date: 25.12.2018
 * Time: 15:56
 */

namespace common\models;


use yii\base\Model;

class Data extends Model
{
    public $n;
    public $str;

    public function rules()
    {
        return [

            [['n', 'str'], 'required'],
            ['n','integer'],
            ['str','string']

        ];
    }

    public function __construct($n,$str)
    {
        parent::__construct();
        $this->n=$n;
        $this->str=$str;
    }

    //преобразователь строки в массив
    public function strToArr(){
        if($this->validate()){
            return  explode(",",str_replace(" ","",$this->str));
        }
        return false;
    }

    //получение результа по входному алгоритму
    public function processing(AlgorithmInterface $algorithm){
        if($this->validate()) {
            return $algorithm->run($this->n, $this->strToArr());
        }
        return false;
    }
}
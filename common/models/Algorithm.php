<?php
/**
 * Created by PhpStorm.
 * User: Drunk penguin
 * Date: 25.12.2018
 * Time: 15:51
 */

namespace common\models;


class Algorithm implements AlgorithmInterface
{

    public  function run($n, $arr)
    {
        $max_i=count($arr);

        $left_i=0;
        $right_i=$max_i-1;

        $left_n=0;
        $right_n=0;


        do{
//            echo $left_i." ".$right_i." ".$left_n." ".$right_n."\n";
            if($left_n<=$right_n){

                if($arr[$left_i]==$n){
                    $left_n++;
                }
                $left_i++;
            }else{
                if($arr[$right_i]!=$n){
                    $right_n++;
                }
                $right_i--;
            }


        } while($left_i<$max_i && $right_i>=0 && $left_i <= $right_i);



        if($left_n!=0 && $right_n!=0 && $left_n == $right_n){
//            echo $left_i;
            return $left_i;
        }
        else{
//            echo -1;
            return -1;
        }
    }
}
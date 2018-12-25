<?php
/**
 * Created by PhpStorm.
 * User: Drunk penguin
 * Date: 25.12.2018
 * Time: 15:47
 */

namespace common\models;


interface AlgorithmInterface
{
    public function run($n,$arr);
}
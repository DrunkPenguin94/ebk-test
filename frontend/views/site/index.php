<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>REST!</h1>



        <p><a class="btn btn-lg btn-success" >start</a></p>
    </div>

    <div class="body-content">



    </div>
</div>
<?
$script = <<< JS
console.log("start");
$(document).ready(function(){
    $("a.btn").click(function(){
        $.ajax({
            method: 'get',
            url  :  "/rest/index",
            data:{
               "access-token":"hhIAkh3x_p7Lb1LYLnvkTeFiIV61iSTY",
               "n":"5",
               "str":"5, 5, 1, 7, 2, 3, 5"
               
            },
            cache: false,

            success  : function(response) {

                var obj = $.parseJSON(response);
                console.log(response);
               

            },

            error : function(response) {
                console.log(response);
            }

        });
    });
});
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>
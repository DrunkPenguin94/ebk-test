<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>REST!</h1>
        <div style="padding-bottom: 25px;">Токен:<input type="text" name="token"></div>
        <div style="padding-bottom: 25px;">Число:<input type="text" name="n"></div>
        <div style="padding-bottom: 25px;">Строка чисел (через запятую):<input type="text" name="str"></div>

        <div style="padding-bottom: 25px;" >Результат:<input disabled type="text" name="result"></div>

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
        //hhIAkh3x_p7Lb1LYLnvkTeFiIV61iSTY
            method: 'get',
            url  :  "/rest/index",
            data:{
               "access-token":$("input[name='token']").val(),
               "n":$("input[name='n']").val(),
               "str":$("input[name='str']").val(),
               
            },
            cache: false,

            success  : function(response) {
                $("input[name='result']").val(response);
               // var obj = $.parseJSON(response);
                console.log(response);
               

            },

            error : function(response) {
                console.log(response);
                  $("input[name='result']").val("Ошибка,неверный токен");
            }

        });
    });
});
JS;

$this->registerJs($script, yii\web\View::POS_READY);
?>
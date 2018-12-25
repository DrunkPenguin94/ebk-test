<?php
return [
    'adminEmail' => 'admin@example.com',
];

function randName($n){
    $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
    $max=$n;
    $size=StrLen($chars)-1;
    $password=null;
    while($max--)
        $password.=$chars[rand(0,$size)];


    return $password;
}

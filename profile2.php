<?php
session_start();
$array_info = [$_SESSION['name'],$_SESSION['url']];
setcookie('user_info',implode(',',$array_info),time()+1000000,'/');
echo ($_COOKIE['user_info']) . "<br>";





?>
<?php

$dbcon = mysqli_connect('localhost', 'root', '', 'webApp');

if(!$dbcon){
    die('서버 연결 실패 : ' . mysqli_connect_error());
} 
?>
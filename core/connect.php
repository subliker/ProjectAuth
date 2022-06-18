<?php
    header("Content-Type: text/html; charset=utf-8");
    setlocale(LC_ALL, 'russian');
    $connect = mysqli_connect('localhost','root','','test');
    if(!$connect){
        die('Error to connect MYSQLI');
    }
    mysqli_query($connect,"SET NAMES 'utf8'"); 
    mysqli_query($connect,"SET CHARACTER SET 'utf8'");
    mysqli_query($connect,"SET SESSION collation_connection = 'utf8_general_ci'");
?>
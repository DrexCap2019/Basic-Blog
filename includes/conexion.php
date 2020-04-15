<?php 

$port= 3308;
$conection = mysqli_connect('localhost','root','','blog',$port);
mysqli_query($conection,"SET NAMES 'utf8'"); 

if(!isset($_SESSION)){
    session_start();
}

?>
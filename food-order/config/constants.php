<?php
//Session start
session_start();

define('SITEURL','https://localhost/food-order/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD', '');
define('DB_NAME','food-order');
define('LOGIN_NAME',$_SESSION['login-name']);

$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) ;
$db_select = mysqli_select_db($conn,DB_NAME) ;

?>
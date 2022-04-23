<?php
header("Cache-Control: no-cache, must-revalidate");
$conn = new mysqli("localhost","root","","dairy") or die($conn->connect_error);
$webname ="Subhash Dairy";
mysqli_set_charset($conn,'utf8mb4');
//Set timezone 
date_default_timezone_set('Asia/Kolkata'); 
$date = date("d-m-Y h:i:sa");
$month =date("m");
$ip = $_SERVER['REMOTE_ADDR'];
  $brouser = $_SERVER['HTTP_USER_AGENT'];
//$country = $_SERVER['HTTP_CF_IPCOUNTRY'];
//redirect if session not exist 
$location="'../login.php'";
?>
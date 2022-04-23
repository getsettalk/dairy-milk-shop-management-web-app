<?php
header("Cache-Control: no-cache, must-revalidate");
$conn = new mysqli("localhost","root","","dairy") or die($conn->connect_error);
$num = mysqli_real_escape_string($conn,$_POST['id']);
$pass = mysqli_real_escape_string($conn,$_POST['p']);
$pass =md5($pass);
if (!empty($num) && !empty($pass)) {
  $sql ="SELECT * FROM `dairy_admin` where ad_phone =$num And ad_pass ='$pass'";
  
  $run = $conn->query($sql) or die($conn->error);
  if (mysqli_num_rows($run) >0) {
    // code...
    $row =mysqli_fetch_assoc($run);
      session_start();
    $_SESSION["id"]=$row['ad_id'];
   $_SESSION["name"]=$row['ad_name'];
   // created key of session
     $str = $row['ad_phone'].$row['ad_id'];
     $_SESSION["keyoflogin"] =md5($str);
     /// 666 mean login succss
     echo 666;
  }else{
    //7777 mean login failed
    echo 777;
  }
} else {
  // code... 999 mean data empty
  echo 999;
}



// this project is created by sujeet kumar sharma , github id getsettalk 
// insta  id scarlet_sujeet 
?>
<?php
session_start();
if(!isset($_SESSION["keyoflogin"])){
  ?>
    <script >
    window.location.href =<?php echo $location; ?>;
  </script>
  <?php
}else{
  require("../inc/conn.php");
  require("../inc/top-fun.php");
   $pass= mysqli_real_escape_string($conn,filter_var($_POST['code'],FILTER_SANITIZE_STRING));
   $userid =$_SESSION["id"];
   if (!empty($pass)) {
     $sql = "SELECT * FROM `dairy_admin` where ad_id ='$userid' And binary ad_passcode ='$pass'";
    $run= $conn->query($sql) or die($conn->error);
     if (mysqli_num_rows($run) >0) {
       echo 2222;
     }else {
       echo 9999;
     }
   }else {
     // empty pass received
     echo 7777;
   }
}
?>
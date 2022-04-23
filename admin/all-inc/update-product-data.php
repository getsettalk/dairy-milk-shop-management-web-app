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
  //e mean edited
  // p mean product
  $epid= mysqli_real_escape_string($conn,$_POST['e-p-id']);
  $epname= mysqli_real_escape_string($conn,filter_var($_POST['e-p-name'],FILTER_SANITIZE_STRING));
  $epstatus= mysqli_real_escape_string($conn,$_POST['e-pstatus']);
  $eppruchase= mysqli_real_escape_string($conn,$_POST['e-p-purchase-price']);
  $epsale= mysqli_real_escape_string($conn,$_POST['e-p-sale-price']);
  
  if (!empty($epid)) {
    $sql ="UPDATE `product` SET `product_name`='$epname',`product_status`=$epstatus,`product_purchase_price`=$eppruchase,`product_selling_price`=$epsale WHERE product_id =$epid";
    
    if (mysqli_query($conn,$sql) or die($conn->error)) {
      
      // code..2222 mean success
      echo 2222;
    }else {
      // 9999 mean failed 
      echo 9999;
    }
  }else {
    // empty id not found !
    echo 7777;
  }
}
?>
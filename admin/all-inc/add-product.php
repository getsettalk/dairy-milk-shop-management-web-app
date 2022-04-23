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
  $pname = mysqli_real_escape_string($conn,filter_var($_POST['p'],FILTER_SANITIZE_STRING));
  $status = mysqli_real_escape_string($conn,filter_var($_POST['ps'],FILTER_SANITIZE_STRING));
  // $purchase price
  $purchase = mysqli_real_escape_string($conn,filter_var($_POST['pp'],FILTER_SANITIZE_STRING));
  
  // selling price
  $sale = mysqli_real_escape_string($conn,filter_var($_POST['sp'],FILTER_SANITIZE_STRING));
  if(!empty($pname)){
    
    // here is all unit considered in kg / kilogram
    
  $sql ="INSERT INTO `product` (`product_id`, `product_name`, `product_status`, `product_added_on`, `product_purchase_price`, `product_selling_price`) VALUES (NULL, '$pname', '$status', '$date', '$purchase', '$sale')";
    if (mysqli_query($conn,$sql) or die($conn->error)) {
      echo 2222;
      // mean successfully inserted
    }else{
      echo 9999;
      // mean failed
    }
  }else {
    //777 meam empty data received
    echo 7777;
  }
}
?>
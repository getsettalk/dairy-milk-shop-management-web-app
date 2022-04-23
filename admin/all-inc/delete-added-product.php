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
  //product delete id
  $productdid = mysqli_real_escape_string($conn,$_POST['productdid']);
  if (!empty($productdid)) {
    $sql ="DELETE FROM `product` WHERE `product`.`product_id` =$productdid";
    if ($conn->query($sql) or die($conn->error)) {
      // code... success
      echo 2222;
    }else {
      // if failed
      echo 9999;
    }
  } else {
    // empty data received if
    echo 7777;
  }
}
  ?>
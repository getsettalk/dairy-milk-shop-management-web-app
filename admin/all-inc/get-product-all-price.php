<?php
session_start();
require("../inc/conn.php");
if(!isset($_SESSION["keyoflogin"])){
  ?>
    <script >
    window.location.href =<?php echo $location; ?>;
  </script>
  <?php
}else{
  $pid = mysqli_real_escape_string($conn,$_POST['pid']);
  if (!empty($pid)) {
    $sql ="SELECT * FROM `product` where product_id =$pid";
    $run =mysqli_query($conn,$sql);
    if (mysqli_num_rows($run) >0) {
      $row =mysqli_fetch_assoc($run);
      ?>
       <small class="text-success" id="db-purchase-price" data-dbpurchaseprice="<?php echo $row['product_purchase_price'];?>">P-P:<?php echo $row['product_purchase_price'];?> ,</small>
                  <small class="text-success" id="db-sale-price" data-dbsaleprice ="<?php echo $row['product_selling_price'];?>">S-P:<?php echo $row['product_selling_price'];?></small>
      <?php
    }
  }
}
$conn->close();
?>
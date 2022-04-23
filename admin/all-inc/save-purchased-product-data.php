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
  //product id
  $pid =mysqli_real_escape_string($conn,$_POST['purchased-goods']);
  
  // product quantity mean how many kg / leter
  $quantity =mysqli_real_escape_string($conn,$_POST['total-quantity']);
  //final price
  $fp =mysqli_real_escape_string($conn,$_POST['final-price']);
  // company name
  $company =mysqli_real_escape_string($conn,$_POST['company']);
  // other bill id
  $otherbid =mysqli_real_escape_string($conn,$_POST['bill-id']);

  $note =mysqli_real_escape_string($conn,$_POST['othernoteOnpurchase']);
  // Add GST button for check on / off
  $addgst =mysqli_real_escape_string($conn,$_POST['addgst']);
  
  // GST Rate %
  $gstrate =mysqli_real_escape_string($conn,$_POST['choosegst']);
  
  // calculated gst value
  $gstval =mysqli_real_escape_string($conn,$_POST['gstval']);
  // only date
$month =date("F");
$year = date("Y"); 
$thisdate =date("d-m-Y");
$gstapplied;
  if (!empty($pid)) {
  if (!empty($quantity)) {
    if (!empty($fp)) {
      // code... for insert
  if ($_POST['addgst'] =='on') {
     $gstapplied =1;
  }else {
     $gstapplied =0;
     $gstrate =0;
     $gstval =0;
  }
  $prdvalue =getproductprice($conn,$pid);
   $costprice =$prdvalue[0]['product_purchase_price'];
  $a = $costprice*$quantity;
  if ($a ==$fp) {
$sql ="INSERT INTO `purchased_product` (`purchase_id`, `purchase_product_name`, `purchase_quantity`, `purchase_product_cost_price`, `purchase_product_final_price`, `purchase_form_whom`, `purchase_other_bill_id`, `purchase_other_note`, `purchase_gst_applied`, `purchase_gst_rate`, `purchase_gst_value`, `purchase_status`, `purchase_date`, `purchase_month`,`purchase_product_year`) VALUES (NULL, '$pid', '$quantity', '$costprice', '$fp', '$company', '$otherbid', '$note', '$gstapplied', '$gstrate', '$gstval', '1', '$thisdate', '$month','$year')";
  
  if(mysqli_query($conn,$sql) or die($conn->error)){
    echo 2222;
  }else {
    // failed to insert code 3333
    echo 3333;
  }
    
  }else {
    // Not Match Final Price with You Product Purchasing price * (into) quantity (Cp x quantity)
    echo 7774;
  }

    }else {
      // Final Price Is Empty
    echo 773;
    }
  } else {
    // product quantity not found
    echo 772;
  }
  }else{
    // product id not found
    echo 771;
  }
}
?>
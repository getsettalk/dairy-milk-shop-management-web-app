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
  $customer =mysqli_real_escape_string($conn,filter_var($_POST['Customer'],FILTER_SANITIZE_STRING));
  $mobile =mysqli_real_escape_string($conn,filter_var($_POST['mobile'],FILTER_SANITIZE_STRING));
  $Product =mysqli_real_escape_string($conn,filter_var($_POST['Product'],FILTER_SANITIZE_STRING));
  $method =mysqli_real_escape_string($conn,filter_var($_POST['sale-type'],FILTER_SANITIZE_STRING));
  $Quantity =mysqli_real_escape_string($conn,filter_var($_POST['Quantity'],FILTER_SANITIZE_STRING));
  $Price =mysqli_real_escape_string($conn,filter_var($_POST['Price'],FILTER_SANITIZE_STRING));
  $Address =mysqli_real_escape_string($conn,filter_var($_POST['Address'],FILTER_SANITIZE_STRING));
  $note =mysqli_real_escape_string($conn,filter_var($_POST['note'],FILTER_SANITIZE_STRING));
  $userid =$_SESSION["id"];
  $thisdate =date("d-m-Y");
  $month =date("F");
  $makebill +=$mobile;
  if (!empty($customer) && !empty($Product)) {
    // total added record
  $totaladdedrec=  getSaleTotalRec($conn); 
    $makebill += $totaladdedrec;
 $time =date("h:s:ia");
   $sql ="INSERT INTO `product_sale`(`sale_id`, `sale_customer`, `sale_customer_number`, `sale_product_name`, `sale_method`, `sale_bill_id`, `sale_quantity`, `sale_product_total_price`, `sale_customer_address`, `sale_other_note`, `sale_date`, `sale_time`,`sale_month`, `sale_status`, `who_sale`) VALUES (NULL,'$customer','$mobile','$Product','$method',$makebill,'$Quantity','$Price','$Address','$note','$thisdate','$time','$month',1,'$userid')";
   if (mysqli_query($conn,$sql) or die($conn->error)) {
     echo "Success";
   }else {
     echo "No";
   }
  } else {
    // empty data received
    echo 7777;
  }
}
?>
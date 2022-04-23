<?php
// this is universal function to show data
function prt($str){
  echo "<pre>";
  print_r($str);
  echo "</pre>"; 
}

function filter_str($str) {
  // where str enter $_POST like this
  filter_var($str,FILTER_SANITIZE_STRING);
}

function getproductname($str){
  $sql ='SELECT * FROM `product` where product_status =1';
  $run =mysqli_query($str,$sql);
  $row =array();
  if (mysqli_num_rows($run) >0) {
    // code...
    while ($data=mysqli_fetch_assoc($run)){
      $row[] =$data;
    }
    return $row;
  } 
}

function getproductprice($conn,$pid){
    $sql ="SELECT * FROM `product` where product_id ='$pid'";
  $run =mysqli_query($conn,$sql);
  if (mysqli_num_rows($run) >0) {
    $row =array();
    $row[]=mysqli_fetch_assoc($run);
    return $row;
  }
}

// get data of all purchased product / goods
function getpurchasedata($str){
  $sql ="SELECT * FROM `purchased_product` INNER JOIN product ON purchased_product.purchase_product_name =product.product_id order by purchase_id desc"; 
$run =mysqli_query($str,$sql);

if (mysqli_num_rows($run) >0) {
  $row =array();
   while($data=mysqli_fetch_assoc($run)){
     $row[] =$data; 
   }
   return $row;
 }
}

// function to get total added Product
function getaddedprdnum($conn){
  $sql = "SELECT * FROM `product`";
  $num= mysqli_query($conn,$sql) or die($conn->error);
  echo mysqli_num_rows($num)." item";
}

// get total purchase Amount by You
function gettotalpurchasenum($conn){
  $sql = "SELECT * FROM `purchased_product`";
  $num= mysqli_query($conn,$sql) or die($conn->error);
  $val= mysqli_num_rows($num);
  echo number_format($val)." item";

}
// get total amt on purchasing goods
function gettotalpurchaseexp($conn){
  $sql = "SELECT SUM(`purchase_product_final_price`) as totalfp FROM `purchased_product`";
  $run= mysqli_query($conn,$sql) or die($conn->error);
$row = mysqli_fetch_assoc($run);
echo "₹".number_format($row['totalfp']);
}

//get  total Quantity Purchased till now 
function gettotalpurchasequantity($conn){
  $sql = "SELECT SUM(`purchase_quantity`) as totalqua FROM `purchased_product`";
  $run= mysqli_query($conn,$sql) or die($conn->error);
$row = mysqli_fetch_assoc($run);
echo number_format($row['totalqua'])." kg"; 
}

// get total number of records of sale table (inserted) for creating bill id of customer
function getSaleTotalRec($conn){
  $sql ="SELECT COUNT(sale_id) as countedrowofsale FROM `product_sale`";
  $run = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($run);
  return $row['countedrowofsale'];
}

// fetch saled / sale all records
function fetchSeleAlldata($conn){
  $sql ="SELECT * FROM `product_sale` INNER JOIN product ON product_sale.sale_product_name = product.product_id  INNER JOIN dairy_admin ON product_sale.who_sale = dairy_admin.ad_id order by sale_id DESC";
  $run =mysqli_query($conn,$sql);
  $row =array();
  if (mysqli_num_rows($run) >0) {
    // code...
    while ($data=mysqli_fetch_assoc($run)){
      $row[] =$data; 
    }
    return $row;
  }
}

/*///////get total sale in amount////////*/
function getTotalsaleinAmt($conn){
  $sql =" SELECT SUM(`sale_product_total_price`) as totalsale FROM `product_sale`";
  $run = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($run);
  $num =$row['totalsale'];
  echo "₹".number_format($num);
}

// fetch total cash sales
function getTotalcashsaleinAmt($conn){ 
  $sql ="SELECT SUM(`sale_product_total_price`) as totalcashsale FROM `product_sale` where sale_method ='Cash'";
  $run = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($run);
  $num =$row['totalcashsale'];
  echo "₹".number_format($num);
}
// fetch total credit sales
function getTotalcreditsaleinAmt($conn){ 
  $sql ="SELECT SUM(`sale_product_total_price`) as totalcashsale FROM `product_sale` where sale_method ='Credit'";
  $run = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($run);
  $num =$row['totalcashsale'];
  echo "₹".number_format($num);
}

?>
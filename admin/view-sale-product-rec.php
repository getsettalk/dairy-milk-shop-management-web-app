<?php
require("inc/header.php");
//sale data fetch 
$sdata =fetchSeleAlldata($conn);
?>
<section class="record-of-purchased-product">
  <div class="container-fluid ">
    <div class="text-center mt-3 special-font">
      <h5> Here is all sale goods record:</h5>
    </div>
    <div class=" ">
      <div class="table-responsive">
    <table class="customers" id="product">
  <thead >
    <tr>
      <th scope="col" class="serial">#</th>
      <th scope="col">Product name</th>
      <th scope="col">Product quantity</th>
      
      <th scope="col">Total price</th>
      <th scope="col">Payment Method</th>
      <th scope="col">BILL-ID</th>
      <th scope="col">Customer name</th>
      <th scope="col">Customer Mobile</th>
      <th scope="col">Address:</th>
      <th scope="col">Sale On:</th>
      <th scope="col">Who Sale This:</th>
     
      <th scope="col">View Note</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
   <tbody >
     <?php
      foreach($sdata as $list) {
        ?>
        <tr>
       <td scope="row"><?php echo $list['sale_id']; ?></td>
       <td scope="row" class="tbl-col3"><?php echo $list['product_name']; ?> </td>
       <td scope="row" class="tbl-col4"><?php echo $list['sale_quantity'].' kg'; ?> </td> 
       <td scope="row" class="tbl-col2"><?php echo   "₹".number_format($list['sale_product_total_price'],"2"); ?> </td>
      
       <td scope="row"><?php if($list['sale_method'] =="Credit"){echo "<span class='text-danger fw-bold'> Credit</span>";}else {echo "<span class='text-success fw-bold'> Cash</span>";} ?> </td>
       <td scope="row"><?php echo $list['sale_bill_id']; ?> </td> 
       <td scope="row"><?php echo $list['sale_customer']; ?> </td>
       <td scope="row"><?php echo $list['sale_customer_number']; ?> </td>
       <td scope="row"><?php echo $list['sale_customer_address']; ?> </td>
 
      
       <td scope="row"><?php echo $list['sale_date']; ?> </td>
       <td scope="row"><?php echo $list['ad_name']; ?> </td>
       
       <td scope="row"><i class="bi bi-chat-right-quote-fill showsale-note e-btn" data-salenote="<?php if($list['sale_other_note'] ==''){ echo 'Not Have Any Note'; }else { echo $list['sale_other_note']; } ?>"></i></td>
      
       <td scope="row"> <button class="btn btn-danger" id="dltsale-data" data-idofrec="<?php echo $list['sale_id']; ?>"> Delete</button> </td>
     </tr>
        <?php
      }
       ?>
   </tbody>
    <!--if database dont have any data than here will show auto some row of empty data, don't worry-->
</table>
         </div>
    </div>
    
    
  </div>
</section>
<?php
require("inc/footer.php");
?>
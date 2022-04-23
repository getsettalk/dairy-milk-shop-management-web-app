<?php
require("inc/header.php");
$pdata =getpurchasedata($conn);
?>
<section class="record-of-purchased-product">
  <div class="container-fluid ">
    <div class="text-center mt-3 special-font">
      <h5> Here is all added purchase goods record:</h5>
    </div>
    <div class=" ">
      <div class="table-responsive">
    <table class="customers" id="product">
  <thead >
    <tr>
      <th scope="col" class="serial">#</th>
      <th scope="col">Product name</th>
      <th scope="col">Product quantity</th>
      <th scope="col">Cost Price</th>
      <th scope="col">Final price</th>
      <th scope="col">Company name</th>
      <th scope="col">Bill ID</th>
      <th scope="col">GST applied</th>
      <th scope="col">GST rate</th>
      <th scope="col">GST Charged</th>
      <th scope="col">Added On</th>
      <th scope="col">View Note</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
   <tbody >
     <?php
      foreach ($pdata as $list) {
        ?>
        <tr>
       <td scope="row"><?php echo $list['purchase_id']; ?></td>
       <td scope="row" class="tbl-col3"><?php echo $list['product_name']; ?> </td>
       <td scope="row" class="tbl-col4"><?php echo $list['purchase_quantity'].' kg'; ?> </td> 
       <td scope="row" class="tbl-col2"><?php echo   "₹".number_format($list['purchase_product_cost_price'],"2"); ?> </td>
       <td scope="row" class="tbl-col5"><?php echo   "₹".number_format($list['purchase_product_final_price'],"2"); ?> </td>
       <td scope="row"><?php echo $list['purchase_form_whom']; ?> </td>
       <td scope="row"><?php echo $list['purchase_other_bill_id']; ?> </td>
       <td scope="row"><?php if($list['purchase_gst_applied'] ==1){ echo "<span class='text-success'>Yes</span >"; }else { echo "<span class='text-muted'>No</span >";} ?> </td>
       <td scope="row"><?php echo $list['purchase_gst_rate']; ?> </td>
       <td scope="row" class="tbl-col1"><?php echo   "₹".number_format($list['purchase_gst_value'],"2"); ?> </td>
       <td scope="row"><?php echo $list['purchase_date']; ?> </td>
       <td scope="row"><i class="bi bi-chat-right-quote-fill showpirchase-note e-btn" data-purchasenote="<?php if($list['purchase_other_note'] ==''){ echo 'Not Have Any Note'; }else { echo $list['purchase_other_note']; } ?>"></i></td>
      
       <td scope="row"> <button class="btn btn-danger" id="dltpurchase-data" data-idofrec="<?php echo $list['purchase_id']; ?>"> Delete</button> </td>
     </tr>
        <?php
      }
       ?>
   </tbody>
</table>
         </div>
    </div>
    
    
  </div>
</section>
<?php
require("inc/footer.php");
?>
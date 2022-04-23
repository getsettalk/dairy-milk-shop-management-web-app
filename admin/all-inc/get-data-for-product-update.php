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
  $pid = mysqli_real_escape_string($conn,$_POST['pid']);
  if (!empty($pid) && isset($pid)) {
    // code...
    $sql ="SELECT * FROM `product` where product_id = $pid";
    $run =mysqli_query($conn,$sql);
    if (mysqli_num_rows($run)>0) {
      $row =mysqli_fetch_assoc($run);
      ?>
      <form id="edit-product">
          <div class="form-group">
                <input type="text" name="e-p-name" id="e-p-name" class="form-control" placeholder="Product Name" value="<?php echo $row['product_name'];?>" required/>
              </div>
          <div class="form-group">
                <input type="hidden" name="e-p-id" id="e-p-id" class="form-control" value="<?php echo $row['product_id'];?>" />
              </div>
        
           <div class="form-group">
                <select class="form-control" name="e-pstatus" id="e-pstatus" >
                  <option value="">select Status</option>
                  <option value="1">Active</option>
                  <option value="0">Deactive</option>
                  
                </select>
              </div>
           
               <div class="form-group">
                 <!--e-p-p-price mean edit product Purchasing price-->
                <input type="number" name="e-p-purchase-price" id="e-p-p-price" class="form-control" placeholder="Your Purchasing Price" required value="<?php echo $row['product_purchase_price'];?>" />
              </div>
               <div class="form-group">
                <input type="number" name="e-p-sale-price" id="e-p-s-price" class="form-control" placeholder="Selling Price" value="<?php echo $row['product_selling_price'];?>"  required/>
              </div>
              
              <small class="text-start text-dark">If you are changing anything here than everywhere all data will be changed. <span class="text-success  fw-bold">So don't change if not necessary.</span></small>
        </form>
          
      <?php
    }else {
      echo "Product Data not found.";
    }
  }else{
    echo "Product Id Not Received.";
  }
}
  ?>
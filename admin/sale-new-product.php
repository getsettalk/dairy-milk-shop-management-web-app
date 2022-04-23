<?php
require("inc/header.php");
?>
<section class="sale-product">
  <div class="text-left p-3">
    Add Selling Products:
  </div>
  <div class="container">
    <div class="card">
      <div class="card-header text-center special-font bg-c-pink">
        Enter Correct Information:
      </div>
      <div class="card-body bg-c-some">
        <div class="text-center">
          <span>Every Field is Required</span>
        </div>
        <form id="sellingForm">
          
     
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12">
          
            <div class="form-group">
              <label for="Customer">Customer Name:</label>
              <input type="text" name="Customer" id="Customer" class="form-control" placeholder="Customer Name" Required/>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group">
              <label for="mobile">Customer Mobile:</label>
              <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number" Required/>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group">
              <label for="Product">Choose Product:</label>
              <select name="Product" id="Product" class="form-control">
                <option value="none">select Product</option>
                 <?php
// we are fetching product details from function
$getproductdat =getproductname($conn);
foreach ($getproductdat as $product){
  echo "<option value='{$product['product_id']}'>{$product['product_name']}</option>";
}
?>

              </select>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group">
              <label for="sale-type">Select Selling Method:</label>
              <select name="sale-type" id="sale-type" class="form-control">
                <option value="none">select Method</option>
                <option>Cash</option>
                <option>Credit</option>
              </select>
            </div>
          </div>
    
     <div class="col-lg-6 col-md-6 col-12">
                <div class="form-group">
              <label for="Customer">Selling Quantity:</label>
              <input type="number" name="Quantity" id="Quantity" class="form-control" placeholder="Selling Quantity in kg or Piece" Required/>
            </div>
         </div>
     <div class="col-lg-6 col-md-6 col-12">
                <div class="form-group">
              <label for="Price">Price:</label>
              <input type="number" name="Price" id="Price" class="form-control" placeholder="Total price (Quantity x price[kg/piece])" Required/>
            </div>
         </div>
     <div class="col-lg-6 col-md-6 col-12">
                <div class="form-group">
              <label for="Address">Address</label>
              <input type="text" name="Address" id="Address" class="form-control" placeholder="Purchasers Home Address" Required/>
            </div>
         </div>
     <div class="col-lg-6 col-md-6 col-12">
                <div class="form-group">
              <label for="note">Other Note</label>
              <input type="text" name="note" id="note" class="form-control" placeholder="Any other note" />
            </div>
         </div>
         
         <div class="row">
           <div class="col-lg-12 col-md-12 col-12">
             <div class="text-center">
               <button class="btn btn-primary" id="saveSellingdata" type="submit"> Add Data</button>
             </div>
           </div>
         </div>
        </div>
      </form>
      </div>
    </div>
  </div>
  
</section>
    
<?php
require("inc/footer.php");
?>
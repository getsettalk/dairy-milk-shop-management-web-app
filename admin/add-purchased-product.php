<?php
require("inc/header.php");
?>
 <section class="Purchased-product animate__animated animate__flip">
      <div class="container mt-3">
        <div class="card">
          <div class="card-header text-center font-weight-bold bg-c-green ">
            <h6>Add Inventory Purchasing Data </h6>
          </div>
          <div class="card-body" style="background:#fff;">
            <form id="AddPurchasedGoods" >
          <div class="row">
            <div class="col-lg-3 col-md-3 col-12 col-sm-12">
               <div class="form-group">
                 <label for="p-name">Product name:</label>
               <select class="form-control" name="purchased-goods" id="purchased-goods" >
                 <option value="none">Select Product</option> 
 <?php
// we are fetching product details from function
$getproductdat =getproductname($conn);
foreach ($getproductdat as $product){
  echo "<option value='{$product['product_id']}'>{$product['product_name']}</option>";
}
?>

               </select>
               <div  class="d-flex flex-direction-row extrainfo">
                 <!--we have mentioned here db mean database Purchased prices-->
                
               </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12 col-sm-12">
               <div class="form-group">
                 <label for="total-quantity" data-toggle="tooltip" data-placement="right" title="Enter Quantity/weight, Mean Many That Product Purchased By You. if you want to enter 1 kilo 200 gram than write only '1.2' System Automatically Recognise this as kg. ">Product Quantity (kg):<i class="far fa-question-circle"></i></label>
                <input type="number" name="total-quantity" id="total-quantity" class="form-control"  placeholder="Quantity" required autocomplete="off" 
    />
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12 col-sm-12">
               <div class="form-group">
                 <label for="final-price" data-toggle="tooltip"  data-placement="right" title="This Automatic Price is calculated base on Already save Price in manage-product page">Calculated Price:<i class="far fa-question-circle"></i></label>
                <input type="number" name="final-price" id="final-price" class="form-control" placeholder="Calculated Price" required readonly autocomplete="off"/>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12 col-sm-12">
               <div class="form-group">
                 <label for="company" data-toggle="tooltip" data-placement="right" title="Enter Shop or company name where you buy this product. ">Company name:<i class="far fa-question-circle"></i></label>
                <input type="text" name="company" id="company" class="form-control" placeholder="Company name" required autocomplete="off"/>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12 col-sm-12">
               <div class="form-group">
                 <label for="bill-id" data-toggle="tooltip" data-placement="right" title="Enter Receipts or bill number,if you have. ">Bill ID:<i class="far fa-question-circle"></i></label>
                <input type="text" name="bill-id" id="bill-id" class="form-control" placeholder="Bill ID" required autocomplete="off"/>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12 col-sm-12">
              <div class="form-group">
              <label for="othernoteOnpurchase">Other note :</label>
              <textarea name="othernoteOnpurchase" class="form-control" id="othernoteOnpurchase" rows="3"></textarea>
            </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12 col-sm-12">
              <div class="form-group">
                 <label for="addgst"><input type="checkbox" name="addgst" id="addgst"  />  Add GST.</label>
              <select name="choosegst" id="choosegst" class="form-control d-none" >
                <option value="none">Select GST Rate</option>
                <option value="0">0% GST</option>
                <option value="5">5% GST</option>
                <option value="12">12% GST</option>
                <option value="18">18% GST</option>
                <option value="28">28% GST</option>
              </select>
            </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12 col-sm-12">
              <div class="form-group d-none gstval">
                 <label for="gstval"> Total GST:</label>
      <input type="number" class="form-control" name="gstval" id="gstval" placeholder="Total GST valued"  readonly />
            </div>
            </div>
         
              <div class="text-center mt-1">
                <button class="btn btn-success" type="submit" id="savePurchasedbtn">Save Data</button>
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
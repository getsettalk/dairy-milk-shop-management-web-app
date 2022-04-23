<?php
require("inc/header.php");
?>
    <section id="add-product">
      <div class="container-fluid mt-4">
        <div class="clearfix">
          <button id="openModal1" class="btn float-right bg-c-green" type="button"><i class="fas fa-plus"></i> Add Product</button>
        </div>
      </div>
    </section>
    
    <section class="table-content">
    <div id="product-list">
        
    </div>
    </section>
    
    <!-- Modal for Add Product  -->
<div class="modal fade" id="myModal1"  role="dialog" aria-labelledby="myModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document"> 
    <div class="modal-content">
      <div class="modal-header bg-c-green">
        <h5 class="modal-title" id="myModal">Add New Product: </h5>
        <button type="button" class="d-btn hidemodal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="create-product">
          <div class="form-group">
                <input type="text" name="p-name" id="p-name" class="form-control" placeholder="Product Name" required/>
              </div>
        
           <div class="form-group">
                <select class="form-control" id="pstatus" >
                  <option value="">select Status</option>
                  <option value="1">Active</option>
                  <option value="0">Deactive</option>
                  
                </select>
              </div>
           
               <div class="form-group">
                <input type="number" name="p-purchase-price" id="p-p-price" class="form-control" placeholder="Your Purchasing Price" required/>
              </div>
               <div class="form-group">
                <input type="number" name="p-sale-price" id="p-s-price" class="form-control" placeholder="Selling Price" required/>
              </div>
              
              <small class="text-left text-info">Here the quantity of everything is measured in kilogram, so enter the price of the <span class="text-success  fw-bold">product/kg</span></small>
        </form>
          
        
      </div>
      <div class="modal-footer bg-c-green">
        <button type="button" class="btn btn-secondary hidemodal" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="addProduct">Add Product</button>
      </div>
    </div> 
  </div>
</div>

 <!--Modal id myModal2 for Edit Product details-->
 <div class="modal fade" id="myModal2"  role="dialog" aria-labelledby="myModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document"> 
    <div class="modal-content">
      <div class="modal-header bg-c-pink">
        <h5 class="modal-title" id="myModal">Change Product Configuration: </h5>
        <button type="button" class="d-btn hidemodal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer bg-c-pink">
        <button type="button" class="btn btn-secondary hidemodal" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="editProduct">Update changes</button>
      </div>
    </div> 
  </div>
</div>

<?php
require("inc/footer.php");
?>
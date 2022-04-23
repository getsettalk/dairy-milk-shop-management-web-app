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
 $sql ="SELECT * FROM `product`";
 $run = mysqli_query($conn,$sql);
 if (mysqli_num_rows($run) <1) {
   // code...
   echo "<div class='alert alert-info'>Add Your First Product , For adding the product click on Add Product button</div>";
 }else{
?>
    <div class="container my-3">
        <div class="about-this bg-info rounded p-2 m-1">
          <div class="text-center special-font">
            <h6>Here is all Added Product  </h6>
          </div>
        </div>
        
     <div class="table-responsive">
    <table class="customers" id="product">
  <thead >
    <tr>
      <th scope="col" class="serial">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Added On</th>
      <th scope="col">Status</th>
      <th scope="col">Cost Price</th>
      <th scope="col">Selling Price</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
   <?php 
   while($row = mysqli_fetch_assoc($run)){
   ?>
     <tr>
      <td scope="row" class="serial"><?php echo $row['product_id']; ?></td>
      <td class="tbl-col1 fw-bold text-capitalize"><?php echo $row['product_name']; ?></td>
      <td><?php echo $row['product_added_on']; ?></td>
      <td class="fw-bold"> <?php if($row['product_status'] ==1){ echo "<span class='text-success'> Active </span>" ; } else{ echo "<span class='text-danger'> Deactive </span>" ;} ?></td>
      <td class="tbl-col2"> <?php echo  "₹".number_format($row['product_purchase_price'],2); ?></td>
      <td > <?php echo "₹".number_format($row['product_selling_price'],2); ?></td>
       
      <td><button class="e-btn" type="button" id="editItemName" data-itemid="<?php echo $row['product_id']; ?>"><i class="fas fa-edit"></i></button></td>
      <td><button class="
     d-btn" type="button" id="deleteItemName" data-itemid="<?php echo $row['product_id']; ?>"> <i class="fas fa-trash-alt"></i></button></td> 
    </tr>
    <?php
   }
    ?>
  </tbody>
</table>
         </div>
      </div>
  
<?php
}
}
?>
  // form line 1 to 14 code for navbar
   const navbtn =document.querySelector("#navShow");
     const nav =document.querySelector("nav");
     const wrapper =document.querySelector(".wrapper");
     navbtn.addEventListener("click", function (){
    wrapper.classList.add("showwr");
    nav.classList.add("shownav");
     });
     window.onclick=function (event){
       if(event.target ==wrapper){
         nav.classList.remove("shownav");
         wrapper.classList.remove("showwr");
       }
     } 
     // inti of wow js
    new WOW().init();
    
 /*jQuery started*/
$(function(){
  // toaster create function 
  toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}


// Open Modal
const openmodalbtn1 =$("#openModal1");
openmodalbtn1.click(function(){
  $("#myModal1").modal('show');
});
//univarsal class for close modal
const closemodal =$(".hidemodal");
closemodal.click(function(){
  $(".modal").modal('hide');
});

// this is tooltip of bootstrap function
$('[data-toggle="tooltip"]').tooltip();

// fetch all added product item
function fetchProduct() {
  $.ajax({
    url:"all-inc/fetch-product-table.php",
    type:"post",
    success:function(data){
      
      $("#product-list").html(data);
    }
  });
}
fetchProduct();
// add product name and details
$("#addProduct").on('click', function (e){
  e.preventDefault();
  const pname =$("#p-name");
const pstatus =$("#pstatus");
//product selling price
const  ppurchaseprice =$("#p-p-price");
// product purchase price 
const  psaleprice =$("#p-s-price");
if (pname.val() !=="") {
  if (pstatus.val() !=="") {
  if(ppurchaseprice.val() !==""){
  //console.log(ppurchaseprice.val());
     if (psaleprice.val() !=="") {
         $("#divLoading").addClass("show");
  $.ajax({ 
    url:'all-inc/add-product.php',
    type:'post',
    data:{p:pname.val(),ps:pstatus.val(),pp:ppurchaseprice.val(),sp:psaleprice.val()},
    success: function (data){
     // console.log(data);
     fetchProduct();
      $(".modal").modal('hide');
      $("#divLoading").removeClass("show"); 
      $("#create-product").trigger('reset');
      if (data ==2222) {
        toastr["success"]("Product Added Successfully done !");
      } else if (data ==7777) {
        toastr["warning"]("Don't submit empty value ?");
      } else if(data == 9999){
        toastr["error"]("Failed to add product name , something wrong ?");
      }else {
        toastr["error"](data);
      }
      
    }
  });
  // uper all for ajax
  
     }else {
       toastr["error"]("Enter This Product Selling Price , mean which Price You can Sale this product ?");
     }
  }else {
    toastr["info"]("Enter Your Purchasing Price / Cost Price");
  }
  }else{
    toastr["error"]("Select Product status Active /Deactive");
  }
}else {
  toastr["error"]("Enter Product Name ,who name don't exist already.");
}

});
// Add Product code end 


// Now Edit Product details
$(document).on("click","#editItemName",function(){
  // epid mean edit product id
  var epid = $(this).data('itemid');
  //getting single record of product
 $("#divLoading").addClass("show");
  $.ajax({
    url:"all-inc/get-data-for-product-update.php",
    type:"post",
    data:{pid:epid},
    success:function(data){
      $("#divLoading").removeClass("show");
     // console.log(data);
      $("#myModal2").modal('show');
      //direct selected modal2 body 
      $("#myModal2 .modal-body").html(data);
      $("#editProduct").click(function (){
        if ($("#e-p-name").val() !=="") {
          if($("#e-pstatus").val() !==""){
            if ($("#e-p-p-price").val() !=="") {
              if ($("#e-p-s-price").val() !==""){
                 // now code for check passcode 
            Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Update it!'
}).then((result) => {
  if (result.isConfirmed) {
   // now code for update data
const EditedProductData=$("#edit-product").serialize();
$("#divLoading").addClass("show");
   $.ajax({
     url:'all-inc/update-product-data.php',
     type:'post',
     data:EditedProductData,
     success:function(data){
       fetchProduct();
         $(".modal").modal('hide');
       $("#divLoading").removeClass("show");
       if (data ==2222) {
         toastr["success"]("Product Details Updated Successfully done !");
       }else if(data ==9999){
         toastr["error"]("Failed to update Product data !");
       }else if(data ==7777){
         toastr["error"]("Product ID not found , something went wrong !");
       }
   
     }
   });
  }
});
              }else {
                toastr["error"]("Enter the price at which you want to sell the product ?");
              }
            }else {
              toastr["warning"]("Enter This Product Purchasing Price /Cost Price ?");
            }
          }else {
      toastr["info"]("Please Select Product status otherwise this will not show in option ?");
          }
        }else {
          toastr["warning"]("Product name is required, so enter product name in input field ?");
        }
      });
    }
  });
});

//function for check passcode and Delete Product Details beta
function varifycodeAndDeleteProduct(pid){
    (async() =>{
      const { value: pass } = await Swal.fire({
  input: 'password',
  inputLabel: 'Enter Security Passcode',
  inputPlaceholder: 'Enter the Passcode'
});
      if (pass) {
    //  console.log(pass);
        $.ajax({
          url:"all-inc/valided-passcode.php",
          type:"post",
          data:{code:pass},
          success:function(data){
          if (data ==2222) {
            $.ajax({
              url:"all-inc/delete-added-product.php",
              type:"post",
              //id of product 
              data:{productdid:pid},
              success:function(data){
              fetchProduct();
                if (data ==2222) {
                  toastr["success"]("Product Deleted");
                }else if(data ==9999){
                  toastr["error"]("Failed to delete Product ?");
                } else {
                  toastr["error"]("something wrong ?");
                }
      
              }
            });
          }else if (data ==9999){
            toastr["error"]("Passcode Not Match ?");
          } else if(data ==7777){
            toastr["warning"]("Passcode not Received, something wrong !");
          }
          }
        });
      }
    })();
 }
// code for delete item / product name
$(document).on("click","#deleteItemName",function(){
  // dpid mean delete product id 
  var dpid = $(this).data('itemid');
  Swal.fire({
  title: 'Are you sure? you want to delete',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    // for delete this product code written in this function
        varifycodeAndDeleteProduct(dpid);
       }
    });
  });

//GsT
 $("#choosegst").on('change',function(){
  //console.log($(this).val());
  if($("#addgst").is(":checked")){
    var tgstcalc= $("#final-price").val() * $(this).val() /100;
$("#gstval").val(tgstcalc);
  }else {
    toastr["error"]("If You want to use GST function than Tick Mark On Add GST.");
    window.navigator.vibrate(100);
  }

 });

    // hide and show GST filed     
     $("#addgst").on('click',function(){
        //  console.log();
           if($(this).is(":checked")){
             $("#choosegst").addClass("showgst");
             $(".gstval").addClass("showgst");
             toastr["info"]("You have Enabled GST Input field, so you have required to select data of GST."); 
             // vibrate device for 300 milliseconds
        window.navigator.vibrate(300);
           }else {
             $("#choosegst").removeClass("showgst");
             $(".gstval").removeClass("showgst");
             toastr["warning"]("You just Disabled GST Button ?");
             // vibrate device for 300 milliseconds
              window.navigator.vibrate(400);
           }
         });
 /*////////// form here for add Purchased data ////////////*/
     
 // fetch each product purchasing price and Selling price 
     $("#purchased-goods").on('change', function(){
       if($(this).val() !=="none"){
        $("#divLoading").addClass("show");
         $.ajax({
           url:"all-inc/get-product-all-price.php",
           type:"post",
           data:{pid:$(this).val()},
           success: function (data){
          $("#divLoading").removeClass("show");
             $(".extrainfo").html(data); 
           }
         });
       }else {
         $(".extrainfo").html("<small  class='text-center text-danger'> Please Select Valid Purchase Product. </small>"); 
       }
     });
     
   // this => function for calculating toatl price
     $("#total-quantity").keyup(function (){
       // Db mean database already saved price
       var DbpurChasePrice =$("#db-purchase-price").data('dbpurchaseprice');
       var tp=DbpurChasePrice * $(this).val();
      if (tp >0) {
        $("#final-price").val(tp);
        // after changing quantity than automatically changed gst charges value

      if($("#addgst").is(":checked")){
        if ($("#choosegst").val() !=="none") {
         if ($("#final-price").val() !=="") {
           
            // auto GDT calculator
          var autogstcalc= $("#final-price").val()*$("#choosegst").val();
$("#gstval").val(autogstcalc/100);
         }
        }
      } else {
        // than value is none mean nothing
        $("#gstval").val("");
      }
      }else {
        $("#final-price").val("");
        $("#gstval").val(""); 
      } 
     });
     

     
// function for insert purchase products details after clicking savePurchasedbtn 
      
   function insertnewpurchase(){
       Swal.fire({
  title: 'Are you sure? you want to save this data',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    $("#divLoading").addClass("show");
    $.ajax({
      url:'all-inc/save-purchased-product-data.php',
      type:'post',
      data:$("#AddPurchasedGoods").serialize(),
      success: function (data){
        //console.log(data);
        $("#divLoading").removeClass("show");
        if(data ==2222){
          window.navigator.vibrate(280);
          $("#AddPurchasedGoods").trigger('reset');
          Swal.fire(
          'Data Saved!',
          'Successfully Inserted Purchase Product Data, Submit Other Product Data !',
          'success'
        );
        }else if(data ==7774){
          
          window.navigator.vibrate([300, 50, 100, 50, 300]); 
          window.navigator.vibrate(490);
           toastr["warning"]("Something wrong with Product Price And Calculated Price.");
           Swal.fire({
              icon: 'error',
              text: 'According to the product that has been selected and the quantity entered, the price of the goods is not equal to the Final price, please fill all the things properly.'
            });
        } else if(data ==3333){
          toastr["warning"]("Failed to save data ?");
        } else if(data ==773){
          toastr["error"]("Final / Calculated Price Is Empty.");
        }else {
          toastr["error"](data);
        }
        
        
      }
    });
  }
});
     }
      
         //validad form data
 $("#savePurchasedbtn").on('click',function(e){
   e.preventDefault();
   if($("#purchased-goods").val() !=='none'){
    if($("#total-quantity").val() !==''){
        if(/-/.test($("#total-quantity").val()) ==false){
           if($("#final-price").val() !==''){
            if (/-/.test($("#final-price").val()) ==false) {
              if ($("#company").val() !=="" && $("#company").val() !==" ") {
                if ($("#bill-id").val() !==" ") {
                  // now code for gst check
           if($("#addgst").is(":checked")){
              if($("#choosegst").val() !=="none"){
               if ($("#gstval").val() !=="" && $("#gstval").val() !==0) {
                  
            // now submit data
               insertnewpurchase();
                } else {
                  toastr["warning"]("Total GST input Field Must be filed when Add GST button is active.");
                }
                }else {
                  toastr["info"]("You have enabled, GST Button, so please choose valid GST rate which apply on this product."); 
                  window.navigator.vibrate(320);
                }
               }else {
              // this else is for gst checked Button if not check than
// now submit data 
              insertnewpurchase();
              }
                }else {
                  toastr["info"]("You want to add any bill id, if not than clear spaces and Don't enter only zero."); 
                }
              }else{
                window.navigator.vibrate(300);
                toastr["info"]("Please Enter Company/shop name where buy that product."); 
              }
            }else {
              toastr["info"]("Invalid Total Price, This can't be in negative value.");
            }
         }else {
           toastr["error"]("Enter Total Price of this goods after purchased ?, this don't should be zero.");
           // vibrate device for 300 milliseconds
    window.navigator.vibrate(300);
         }
        }else{
          toastr["warning"]("Enter Valid Quantity of number ?, don't enter any negative value in quantity.");
          // vibrate device for 300 milliseconds
      window.navigator.vibrate(300);
        }
        }else {
           toastr["warning"]("Enter Quantity of Purchased Goods ? like: 5 or 13 (this value is auto measure in kg.)");
           // vibrate device for 300 milliseconds
      window.navigator.vibrate(300);
           }
             }else {
           toastr["warning"]("Please select  Purchased Product ?");
           // vibrate device for 300 milliseconds
           window.navigator.vibrate(300);
         }
         
           });
  
  /* End form ^| here for purchase products data saver */
  
  // note Reader of Purchase Products data by owner
 $(document).on('click','.showpirchase-note', function (){
   var getnote =$(this).data('purchasenote');
   Swal.fire({
  icon: 'info',
  html:getnote,
  confirmButtonText:
    '<i class="fa fa-thumbs-up"></i> Great!'
});
 });
 
 // delete Purchase record 
 $(document).on('click','#dltpurchase-data', function (){
   var recordid =$(this).data('idofrec');
   varifycodeAndDeletePurchaseRecord(recordid,this);
 });
 
 function varifycodeAndDeletePurchaseRecord(recordid, element){
    (async() =>{
      const { value: pass } = await Swal.fire({
  input: 'password',
  inputLabel: 'Enter Security Passcode',
  inputPlaceholder: 'Enter the Passcode'
});
      if (pass) {
    //  console.log(pass);
        $.ajax({
          url:"all-inc/valided-passcode.php",
          type:"post",
          data:{code:pass},
          success:function(data){
          if (data ==2222) {
            $("#divLoading").addClass("show");
            $.ajax({
              url:'all-inc/delete-purchase-record.php',
              type:'post',
              data:{rid:recordid},
              success: function (data){
                $("#divLoading").removeClass("show");
                if (data ==2222) {
                  toastr["success"]("Selected Record has been deleted ");
                  $(element).closest("tr").fadeOut();
                }else {
                  toastr["error"](data);
                }
              }
            });
          }else if (data ==9999){
            toastr["error"]("Passcode Not Match ?");
          } else if(data ==7777){
            toastr["warning"]("Passcode not Received, something wrong !");
          }
          }
        });
      }
    })();
 }
 
 /* Now Code Form Here For All Selling goods */
 $("#saveSellingdata").on('click', function (e){
           e.preventDefault();
           if($("#Customer").val() !=="" && $("#Customer").val() !==" "){
             if($("#mobile").val() !=="" && $("#mobile").val().length ==10){
               if(/-/.test($("#mobile").val())){
                 toastr["warning"]("Enter Valid Phone Number ?");
               }else {
                 if($("#Product").val() !=='none'){
                   if($("#sale-type").val() !=="none"){
                     // Validation
                     if ($("#Quantity").val() !=="") {
                   if (/-/.test($("#Quantity").val() )) {
                     toastr["warning"]("Enter Valid Quantity ?");
                   }else {
                   if ($("#Price").val() !=="") {
                   
    // now send data to database
                   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    $("#divLoading").addClass("show");
    $.ajax({
      url:"all-inc/insert-sale-data.php",
      type:"post",
      data:$("#sellingForm").serialize(),
      success:function (data){
        $("#divLoading").removeClass("show");
        if(data =="Success") {
          $("#sellingForm").trigger('reset');
          Swal.fire(
      'Saved',
      'Your new selling record has been added. if you want to shee added record than go to record page.',
      'success'
    );
        }else if(data =="No") {
          Swal.fire(
      'Failed',
      'Failed to save data, something wrong',
      'success'
    );
        } else{
          Swal.fire(
      'Error',
      data,
      'warning'
    );
        }
      } 
    });
  }
});
                   
                   }else {
                     toastr["error"]("Enter Valid Total Price Of That Product, Calculation: [Product quantity * Product Price]");
                   }
                   
                   }
                   
                     } else {
                       toastr["warning"]("Enter Valid Quality Of Comodity.");
                     }
                   }else {
  toastr["warning"]("Choose Valid Payment Method ?");
                   }
                 }else {
                   toastr["warning"]("Choose Product Name ?");
                 }
               }
             }else {
               toastr["info"]("Enter Customer Active Mobile number, And Only 10 digit ?");
               
             }
             
           }else {
             // show toast
             toastr["warning"]("Enter Customer name ?");
           }
           
         });
    // show sale note
   $(document).on('click','.showsale-note', function (){
   var getnote =$(this).data('salenote');
   Swal.fire({
  icon: 'info',
  html:getnote,
  confirmButtonText:
    '<i class="fa fa-thumbs-up"></i> Great!'
});
 });
 
 // delete sale record
  $(document).on('click','#dltsale-data', function (){
   var recordid =$(this).data('idofrec');
   varifycodeAndDeleteSaleRecord(recordid,this);
 });
 function varifycodeAndDeleteSaleRecord(recordid, element){
    (async() =>{
      const { value: pass } = await Swal.fire({
  input: 'password',
  inputLabel: 'Enter Security Passcode',
  inputPlaceholder: 'Enter the Passcode'
});
      if (pass) {
    //  console.log(pass);
        $.ajax({
          url:"all-inc/valided-passcode.php",
          type:"post",
          data:{code:pass},
          success:function(data){
          if (data ==2222) {
            $("#divLoading").addClass("show");
            $.ajax({
              url:'all-inc/delete-sale-record.php',
              type:'post',
              data:{rid:recordid},
              success: function (data){
                $("#divLoading").removeClass("show");
                if (data ==2222) {
                  toastr["success"]("Selected Sale Record has been deleted ");
                  $(element).closest("tr").fadeOut();
                }else {
                  toastr["error"](data);
                }
              }
            });
          }else if (data ==9999){
            toastr["error"]("Passcode Not Match ?");
          } else if(data ==7777){
            toastr["warning"]("Passcode not Received, something wrong !");
          }
          }
        });
      }
    })();
 }
 
   /* Code end of Selling goods */
         
});
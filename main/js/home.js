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
$(function(){
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
//toastr["success"]("Have fun storming the castle!");

// make login code
const makeLogin =$("#makeLogin");
const number =$("#number");
const password =$("#password");
makeLogin.on('click',function(e){
  e.preventDefault();
  var error=0;
  if(number.val() ==""){
    error++; 
    toastr["error"]("Enter Your Phone Number");
  }
  if(password.val() ==""){
    error++; 
    toastr["error"]("Enter Your Password");
  }
 
 if (error ==0) { 
   // show loader
   $("#divLoading").addClass("show");
 //  console.log(password.val());
 makeLogin.html("Please wait");
 toastr["info"]("Please Wait....");
 $.ajax({
   url:"make-login.php",
   type:"post",
   data:{id:number.val(),p:password.val()},
   success:function(data){
  //  console.log(data);
  makeLogin.html("Login");
    if (data ==666) {
      window.navigator.vibrate(350);
      toastr["success"]("Login Success , redirecting to dashboard..!");
      window.location.href ="admin/main.php";
    } else if(data ==777){
      toastr["warning"]("Login Failed , Enter Valid Credentials.. !");
    } else {
      toastr["info"]("Something Went wrong...");
    }
    //hide loader
      $("#divLoading").removeClass("show");
   }
 });
 }else{
   window.navigator.vibrate(300);
   return false;
 }
});
});
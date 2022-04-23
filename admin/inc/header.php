<?php
session_start();
require("conn.php");
require("top-fun.php");
if(!isset($_SESSION["keyoflogin"])){
  ?>
    <script >
    window.location.href =<?php echo $location; ?>;
  </script>
  <?php
}else {
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap" rel="stylesheet">
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  />
      
     <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
         <link rel="stylesheet" href="admin-css/style.css" type="text/css" media="all" />
    <title>Dairy Products Manager</title>
    <!--<meta id="viewport" name="viewport"
    content="width=1024, height=768, initial-scale=0, minimum-scale=0.25" />-->
  </head>
  <body>
     <header class="header">
        <div class="logo animate__animated animate__lightSpeedInLeft">
          <?php echo $webname; ?>  
        </div>
        <div class="navigation-bar animate__animated animate__backInUp" id="navShow">
          <i class="fas fa-bars"></i>
        </div>

     <div class="wrapper">
        <nav>
        <ul>
          <li><a href="main.php" class="active-nav"><span><i class="fas fa-tachometer-alt"></i></span>Dashboard</a></li>
          <li><a href="manage-product.php"><span><i class="bi bi-bag-check-fill"></i></span>Manage Product</a></li>
          <li><a href="add-purchased-product.php"><span><i class="fas fa-truck-moving"></i></span>Purchased Goods</a></li>
          <li><a href="view-purchased-product.php"><span style="color:rgb(0,0,0);"><i class="bi bi-journal-bookmark-fill"></i></span>Purchased Records</a></li>
          <li><a href="sale-new-product.php"><span><i class="bi bi-cart-plus"></i></span>Sale Product <span class="unread">new</span></a></li>
          <li><a href="view-sale-product-rec.php"><span style="color:rgb(0,0,0);"><i class="fas fa-scroll"></i></span>View Sale Data <span class="unread">letest</span></a></li>
         
         
          <li><a href="logout.php"><span><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
       

        </ul>
      </nav>
     </div>
    </header> 
          <!--loader-->  
     <div id="divLoading" ></div> 
     <?php } ?>
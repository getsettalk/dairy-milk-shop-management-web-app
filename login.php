<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  />
         <link rel="stylesheet" href="main/css/style.css" type="text/css" media="all" />
    <title>Dairy User Login</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"  />
  </head>
  <body>
     <header class="header">
        <div class="logo">
          Subhash Dairy 
        </div>
        <div class="navigation-bar" id="navShow">
          <i class="fas fa-bars"></i>
        </div>

     <div class="wrapper">
        <nav>
        <ul>
          <li><a href="index.php" class="active-nav"><span><i class="fas fa-home"></i></span>Home</a></li>
<!--          <li><a href="Home"><span><i class="fab fa-servicestack"></i></span>Delevery</a></li>-->

          <li><a href="Home"><span><i class="fas fa-info-circle"></i></span>About</a></li>
          <li><a href="login.php"><span><i class="fab fa-github-square"></i></span>Login</a></li>

 
        </ul>
      </nav>
     </div>
    </header>
    
    <section class="login-page py-5">
      <div class="container">
      
        <div class="card">
          <div class="card-body">
              <div class="login-text text-center">
          <h3> Login </h3>
          <span>Enter Valid Credentials for login</span>
        </div>
            <form class="myloginform">
              <div class="form-group">
                <input type="number" name="number" id="number" class="form-control" placeholder="Phone Number" maxlength="10" required/>
              </div>
              <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Password" class="form-control" required/>
              </div>
        
              
              <div class="text-center">
                <button type="submit" class="btn" id="makeLogin">Login</button>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </section>
    
    
    <footer class="footer text-center">
      ® <?php echo date("Y"); ?>
    </footer>
    <script src="main/js/home.js" type="text/javascript" charset="utf-8"></script>
  </body>
</html>
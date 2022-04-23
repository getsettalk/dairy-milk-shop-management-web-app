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
    // rid = record id number
    $recordID =mysqli_real_escape_string($conn,$_POST['rid']);
    if (!empty($recordID)) {
      $sql ="DELETE FROM `product_sale` WHERE sale_id ='$recordID'";
      if (mysqli_query($conn,$sql) or die($conn->error)) {
        //success 
        echo 2222;
      }else {
        // faild to delete
        echo 9999;
      }
    }
  }
    ?>
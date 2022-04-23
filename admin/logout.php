<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
unset($_SESSION["keyoflogin"]);
session_destroy();
header("Location:../login.php");
?>
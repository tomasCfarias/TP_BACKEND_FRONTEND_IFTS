<?php
   session_start();
   
  
   unset($_SESSION["login_user_tienda"]);
   unset($_SESSION["userid_tienda"]);
   unset($_SESSION["cart_list"]);
   unset($_SESSION['visitado']);
   header("Location: ../login-tienda.php");
   
?>
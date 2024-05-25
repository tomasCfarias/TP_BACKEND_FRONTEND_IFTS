<?php
   session_start();
   
   unset($_SESSION["login_user"]);
   unset($_SESSION["userid"]);
   header("Location: ../login.php");

?>
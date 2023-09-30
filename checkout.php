<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/navbartienda.css">

</head>
<body>
    <?php 
    include_once("api/navbartienda.php");

    if(empty($_SESSION["cart_list"])) {
        echo("<li>Vacio</li>");
      }
      else {
       foreach($_SESSION["cart_list"] as $k => $v) {
        echo("<li>$v</li>");
       }
      }
      ?>
      <input type="button" value="Comprar">
      <?php 
        include_once("api/footer.php");
    ?>
</body>
</html>
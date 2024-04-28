<?php
    include("./api/connection.php");
    $conn = conexion();
    session_start();
    if(!isset($_SESSION['login_user_tienda'])){ //if login in session is not set
      header("Location: login-tienda.php");
      }
      
      
    if ($_GET["user"] != $_SESSION["userid_tienda"])  {
      header("Location: articulos.php");
    }

    if (isset($_GET["user"])) {
        $id = intval($_GET["user"]);
        $sql = "SELECT * FROM ventas WHERE IdCliente = $id ";
        $result = $conn -> query($sql);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis compras</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />

</head>
<body>
<div class="min-h-screen">

<?php 
include_once("api/navbartiendatailwind.php");
?>
<div class="ml-8 mr-8 border rounded">  
<?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="flex space-between">
            <div class="mr-2">Fecha de compra: <?php echo $row["fechaVenta"]?></div>
            <div> Precio total: $<?php echo $row["preciototal"]?></div>
            <a class="ml-auto mr-2" href="#">Ver detalle</a>
        </div>
            <?php }}?>
</div>
<?php
        include("api/footertienda.php") 
    ?>
</div>
    <script src="https://cdn.tailwindcss.com"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>
</html>
<?php 
include("./sql/connection.php");
$conn = conexion();
$id = $_GET["id"];

$query = "SELECT * FROM productos WHERE  Id = '$id' ";

$req =  mysqli_query($conn,$query);



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Articulo</title>
        <link rel="stylesheet" href="css/products.css">
        <link rel="stylesheet" href="css/navbartienda.css">
    </head>
    <header>
        <?php
            include("sql/navbartienda.php") 
        ?>
    </header>
    <body>
        <div>
            <?php
            $res = $req->fetch_array();
            echo "<p> Name: " . $res["Name"] . " "."</p>";
            echo "<p> Price: " . $res["price"] ." ". "</p>";
            echo "<p> Quantity: " . $res["quantity"] . " "."</p>";
        ?>
    </div>
</body>
</html>
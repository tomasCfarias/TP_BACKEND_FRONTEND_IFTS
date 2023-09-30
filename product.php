<?php 
include("./api/connection.php");
$conn = conexion();
$id = $_GET["id"];
session_start();
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
            include("api/navbartienda.php") 
        ?>
    </header>
    <body>
        <?php
            $res = $req->fetch_array();
            echo("<div>");
            echo "<p> Name: " . $res["Name"] . " "."</p>";
            echo "<p> Price: " . $res["price"] ." ". "</p>";
            echo "<p> Quantity: " . $res["quantity"] . " "."</p>";
        ?>
        <form id="carrito">
            <input type="number" name="quantity" value="1" min="1" max="<?=$res['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="id" value="<?=$res['Id']?>">
            <input type="hidden" name="product_name" value="<?=$res['Name']?>">
            <button id="add-btn">Agregar a Carrito</button>
        </form>
        </div>
</body>
</html>

<script src="acarrito.js"></script>
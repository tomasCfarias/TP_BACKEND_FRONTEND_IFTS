<?php

session_start();

if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
}

include("./api/connection.php");
$conn = conexion();


//Crea sentencia sql para seleccionar id y cantidad de la tabla detalleventas
$id = $_GET["id"];
$sql = "SELECT idProducto,cantidad FROM detalleventas WHERE idVenta = $id";

//Crea un array vacio donde se van a cargar los detalles de los productos
$result = $conn -> query($sql);
$detalleproducto = array();
$pos = 0;
while ($row = $result->fetch_assoc()) {

    //Crea un array que es agregado dentro del array de detalle
    $tmpArray = array();
    $tmpArray["id"] = $row["idProducto"];
    $tmpArray["cantidad"] = $row["cantidad"];

    $detalleproducto[$pos] = $tmpArray;
    $pos+= 1;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Venta</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/mostrarusuarios.css">

</head>
<body>
<body>
    <?php
        include_once("./api/navbar.php")
    ?>

    <div class="main-container">
    <?php
    include("./api/sidebar.php");
    ?>
    <div class="content">
    
    <table class="table-products">
        <caption>Detalle Venta</caption>
        <thead>
            <tr>
                <th scope="col">Id Producto</th>
                <th scope="col">Nombre Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
            </tr>
        </thead>
        <tbody>
    <?php


    //Recorre el array de detalle de productos
    foreach($detalleproducto as $producto) {

        $idProducto = $producto['id'];
        $cantidad = $producto["cantidad"];

        //Usando la información del array detalle de productos arma una sentencia sql 
        //para buscar el nombre y precio del producto
        $sql = "SELECT Name,price FROM productos WHERE Id = $idProducto";
        $req = $conn -> query($sql);
        $result = mysqli_fetch_row($req);

        //Crea la tabla del detalle
        echo "<tr>";
        echo "<td data-label='Id'>" . $idProducto . " "."</td>";
        echo "<td data-label='Nombre'>" . $result[0] . " "."</td>";
        echo "<td data-label='Cantidad'>" . $cantidad . " "."</td>";
        echo "<td data-label='Precio'> $ " . $cantidad * $result[1] . " "."</td>";
        echo "</tr>";
    }

?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php

session_start();

if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
}

include("./api/connection.php");
$conn = conexion();


//Crea sentencia sql para seleccionar id y cantidad de la tabla detalleventas
$id = $_GET["id"];
$sql = "SELECT idProducto,cantidad FROM detalleventas WHERE idVenta = $id;";

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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/ventas.css">

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
                <th scope="col"><a id="volver_tabla"href="./ventas.php">VOLVER</a></th>
            </tr>
        </thead>
        <tbody>
    <?php

    $totalCompra = 0;
    foreach($detalleproducto as $producto) {

        $idProducto = $producto['id'];
        $cantidad = $producto["cantidad"];
        $sql = "SELECT Name,price,img_url FROM productos WHERE Id = $idProducto;";
        $req = $conn -> query($sql);
        $result = mysqli_fetch_row($req);

        echo "<tr>";
        echo "<td data-label='Imagen'><img src='./img/" . $result[2]. " "."' alt='Imagen del producto' id='imagen_venta'></td>"; 
        echo "<td data-label='Name' class ='col1' >" ."<p id='id_venta'>#". $idProducto . "</p></br>".$result[0]." X ".$cantidad."</td>"; //result[0] es el nombre
        echo "<td data-label='Precio'>" ."Precio Unidad: $".$result[1]."</br>"."<p id='valor_total'>Precio Total: $". $cantidad * $result[1] . "</p>"."</td>";
        echo "</tr>";
        $totalCompra += $cantidad * $result[1];
    }
    echo "<tr>";
    echo "<td data-label='Precio'></td>";//no se como poner valor total en la columan 3 por css
    echo "<td data-label='Precio'></td>";
    echo "<td data-label='Precio'>" ."<p id='valor_total'>Total Compra: $". $totalCompra. "</p>"."</td>";
    echo "</tr>";

?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="navbar.js"></script>

</body>
</html>
<?php
include("./api/connection.php");
$conn = conexion();
session_start();
if (!isset($_SESSION['login_user_tienda'])) { //if login in session is not set
    header("Location: login-tienda.php");
}


$user_id = $_SESSION['userid_tienda'];

$id = $_GET["id"];
$sql = "SELECT idProducto,cantidad FROM detalleventas WHERE idVenta = $id;";

//Crea un array vacio donde se van a cargar los detalles de los productos
$result = $conn->query($sql);
$detalleproducto = array();
$pos = 0;
while ($row = $result->fetch_assoc()) {

    //Crea un array que es agregado dentro del array de detalle
    $tmpArray = array();
    $tmpArray["id"] = $row["idProducto"];
    $tmpArray["cantidad"] = $row["cantidad"];

    $detalleproducto[$pos] = $tmpArray;
    $pos += 1;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Compras</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />

</head>

<body>
    <div class="min-h-screen">

        <?php
        include_once("api/navbartiendatailwind.php");
        ?>
        <div class="ml-8 mr-8 border rounded">
                        <a class="text-white bg-blue-700 hover:cursor-pointer hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm mt-2 ml-2 px-3 py-1.5 text-center"href="./compras.php?user=<?php echo $user_id; ?>">Volver</a>
                        <?php

                        $totalCompra = 0;
                        foreach ($detalleproducto as $producto) {

                            $idProducto = $producto['id'];
                            $cantidad = $producto["cantidad"];
                            $sql = "SELECT Name,price,img_url FROM productos WHERE Id = $idProducto;";
                            $req = $conn->query($sql);
                            $result = mysqli_fetch_row($req);
                            ?> 
                            <div class='flex border mx-2 my-2 justify-between'>
                            <div class="flex">
                            <img class='max-h-48 w-auto p-8 rounded-t-lg'src='<?php echo('img/'.$result[2]) ?>'alt='Imagen del producto' id='imagen_venta'>
                            <p class="self-center font-bold text-lg"> <?php echo($result[0] . " x". $cantidad)?> </p>
                            </div>
                            <div class="self-center mx-2">
                            <p>Precio Unidad: $<?php echo $result[1] ?></p>
                            <p class="font-bold"> Precio Total: $<?php echo $result[1] * $cantidad ?></p>
                            </div>
                            </div>
                            <?php
                            $totalCompra += $cantidad * $result[1];
                         }
                        ?>
        </div>
        <?php
        include("api/footertienda.php")
        ?>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>

</html>
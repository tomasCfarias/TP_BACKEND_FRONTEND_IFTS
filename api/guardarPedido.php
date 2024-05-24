<?php


include('connection.php');
$conn = conexion();


if($_SERVER["REQUEST_METHOD"] == "POST") {


    $id = $_GET["id"];
    $productos = json_decode(file_get_contents('php://input'));

    $preciototal = 0;

    foreach ($productos as $producto) {
        $name = $producto->producto;
        $cantidad = $producto->cantidad;
        $sql = "SELECT price from productos where Name = '$name'";
        $result = $conn -> query($sql);
        $productPrice = mysqli_fetch_column($result);
        $preciototal = $preciototal + ($productPrice * $cantidad);
    }

    $sql = "INSERT INTO pedidoproveedor (idProveedor,precioPedido) values ($id,$preciototal)";
    $result = $conn -> query($sql);

    $sql ="SELECT idPedido FROM pedidoproveedor ORDER BY idPedido DESC";
    $result = $conn -> query($sql);
    $idpedido = mysqli_fetch_column($result);

    foreach ($productos as $producto) {
        $name = $producto->producto;
        $cantidad = $producto->cantidad;


        $sql = "SELECT Id from productos where Name = '$name'";
        $result = $conn -> query($sql);
        $productId = mysqli_fetch_column($result);

        $sql = "INSERT INTO detallepedidoproveedor values ($idpedido,$productId, $cantidad)";
        $result = $conn -> query($sql);

    }

}

?>
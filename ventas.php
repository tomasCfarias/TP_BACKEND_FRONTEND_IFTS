<?php

session_start();

if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
}

include("./api/connection.php");
$conn = conexion();

$sql = "SELECT * FROM ventas";
$result = $conn -> query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/mostrarusuarios.css">
    <link rel="stylesheet" href="css/index.css">


</head>
<body>
<body>
    <?php
        include_once("./api/navbar.php")
    ?>

    <div class="main-container">
    <?php
    include("./api/sidebar.php")    
    ?>
    <div class="content">
    <table class="table-products">
        <caption>Ventas</caption>
        <thead>
            <tr>
                <th scope="col">ID Venta</th>
                <th scope="col">Id Cliente</th>
                <th scope="col">Precio Total</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
    <?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td data-label='ID'>" . $row["IdVenta"] . " "."</td>";
        echo "<td data-label='Email'>" . $row["IdCliente"] ." ". "</td>";
        echo "<td data-label='Usuario'> $" . $row["preciototal"] . " "."</td>";
        echo "<td data-label='Accion'><a href='detalleventa.php?id=" . $row["IdVenta"] . "'id='crudM'>Ver Detalle</a></td>";
        echo "</tr>";
    }
} else {
    echo "NO HAY REGISTROS";
}
?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="navbar.js"></script>

</body>
</html>
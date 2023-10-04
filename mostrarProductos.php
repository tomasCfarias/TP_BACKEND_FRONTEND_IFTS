<?php
    include("./api/connection.php");

    session_start();
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }
    
    $conn = conexion();

    $sql = "SELECT * FROM productos";
    $result = $conn -> query($sql);

    $conn ->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    </style>
    <title>Mostrar Usuarios</title>
</head>
<link rel="stylesheet" href="./css/mostrarusuarios.css">
<link rel="stylesheet" href="./css/navbar.css">
<body>
    <?php
        include_once("./api/navbar.php")
    ?>
    <a class="nuevo-producto" href="subirProducto.php">Nuevo Articulo</a>
    <table class="table-products">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        <?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Id"] . " "."</td>";
        echo "<td>" . $row["Name"] ." ". "</td>";
        echo "<td>" . $row["quantity"] . " "."</td>";
        echo "<td>" . $row["price"] ." ". "</td>";
        echo "<td>" . $row["description"] ." ". "</td>";
        echo "<td><a href='modificarProducto.php?id=" . $row['Id'] . "' id = 'crudM'>MODIFICAR</a></td>";
        echo "<td><a href='borrarProducto.php?id=" . $row['Id'] . "'id='crudBorrar'>BORRAR</a></td>";
        echo "</tr>";
    }
} else {
    echo "NO HAY REGISTROS";
}
?>  
        </tbody>
    </table>
    <?php
        include_once("./api/footer.php")
    ?>
</body>
</html>
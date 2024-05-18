<?php
    include("./api/connection.php");

    session_start();
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }
    
    $conn = conexion();

    $sql = "SELECT * FROM productos";
    $result = $conn -> query($sql);

    
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
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<body>
    <?php
        include_once("./api/navbar.php")
    ?>
    <div class="main-container">
    <?php
        include_once("./api/sidebar.php")
    ?>
    <div class="content">
        <div class="container-top">
            <h1>Productos</h1>
            <a class="button" href="subirProducto.php">Nuevo Articulo</a>
        </div>
    <table id="myTable" class="table-products">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
            <th scope="col">Descripción</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Estado</th>
            <th scope="col">Accion</th>
            <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        if ($row["estado"] == 0) {
            $estado = "Activo";
        } else { 
            $estado = "Inactivo";
        }

        $id = $row["IdProveedor"];
        $sql = "SELECT nombre FROM proveedores WHERE $id = id";
        $req = $conn -> query($sql);
        $nombreproveedor = mysqli_fetch_row($req)[0];
        
        echo "<tr>";
        echo "<td scope='row' data-label='ID'>" . $row["Id"] . " "."</td>";
        echo "<td data-label='Nombre'>" . $row["Name"] ." ". "</td>";
        echo "<td data-label='Cantidad'>" . $row["quantity"] . " "."</td>";
        echo "<td data-label='Precio'>" . $row["price"] ." ". "</td>";
        echo "<td data-label='Descripción'>" . $row["description"] ." ". "</td>";
        echo "<td data-label='Proveedor'>" . $nombreproveedor ." ". "</td>";
        echo "<td data-label='Estado'>" . $estado ."</td>";
        echo "<td data-label='Accion'><a href='modificarProducto.php?id=" . $row['Id'] . "' id = 'crudM'>MODIFICAR</a></td>";

        if ($estado == "Activo") {
            echo "<td data-label='Accion'><a href='borrarProducto.php?estado=1&id=" . $row['Id'] . "'id='crudBorrar'>Pausar</a></td>";
        } 
        else if ($estado == "Inactivo") {
            echo "<td data-label='Accion'><a href='borrarProducto.php?estado=0&id=" . $row['Id'] . "'id='crudActivar'>Activar</a></td>";
        } 
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
    <script src="./api/LoadNotification.js"></script>
    
</body>
</html>
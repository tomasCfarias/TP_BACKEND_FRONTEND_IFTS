<?php
    include("./api/connection.php");

    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }
    
    $conn = conexion();

    $sql = "SELECT * FROM usuarios";
    $result = $conn -> query($sql);

    $conn ->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!-- <?php
        include_once("./api/navbar.php")
    ?> -->

    <div class="main-container">
    <!-- <?php
    include("./api/sidebar.php")    
    ?> -->
    <div class="content">
    <table id = "myTable" class="table-products">
        <caption>Usuarios</caption>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">Usuario</th>
            <th scope="col">Accion</th>
            <th scope="col">Accion</th>
        </tr>
    </thead>
    <tbody>
    <?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td data-label='ID'>" . $row["id"] . " "."</td>";
        echo "<td data-label='Email'>" . $row["email"] ." ". "</td>";
        echo "<td data-label='Usuario'>" . $row["username"] . " "."</td>";
        echo "<td data-label='Accion'><a href='modificarUsuarios.php?id=" . $row['id'] . "'id='crudM'>MODIFICAR</a></td>";
        echo "<td data-label='Accion'><a href='borrarUsuarios.php?id=" . $row['id'] . "'id='crudBorrar'>BORRAR</a></td>";
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
    
    
</body>
</html>
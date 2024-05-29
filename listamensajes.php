<?php
    include("./api/connection.php");

    session_start();
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }
    
    $conn = conexion();

    $sql = "SELECT * FROM contacto";
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
        <h1>Mensajes</h1>
        </div>
    <table id="myTable" class="table-products">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
            <th scope="col">Mensaje</th>
        </tr>
    </thead>
    <tbody>
        <?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        
        
        echo "<tr>";
        echo "<td scope='row' data-label='ID'>" . $row["id"] . " "."</td>";
        echo "<td data-label='Nombre'>" . $row["nombre"] ." ". "</td>";
        echo "<td data-label='Email'>" . $row["email"] . " "."</td>";
        echo "<td data-label='Telefono'>" . $row["telefono"] ." ". "</td>";
        echo "<td data-label='Mensaje'>" . $row["mensaje"] ." ". "</td>";
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
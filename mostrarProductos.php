<?php
    include("./sql/connection.php");

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
    <title>Mostrar Usuarios</title>
</head>
<link rel="stylesheet" href="./css/mostrarusuarios.css">
<link rel="stylesheet" href="./css/navbar.css">
<body>
    <?php
        include_once("./sql/navbar.php")
    ?>
    <table class="table-products">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Descripción</th>
        </tr>
   
<?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Id"] . " "."</td>";
        echo "<td>" . $row["Name"] ." ". "</td>";
        echo "<td>" . $row["quantity"] . " "."</td>";
        echo "<td>" . $row["price"] ." ". "</td>";
        echo "<td>" . $row["description"] ." ". "</td>";
        echo "</tr>"."<br>";
    }
} else {
    echo "NO HAY REGISTROS";
}
?>
    </table>
    <?php
        include_once("./sql/footer.php")
    ?>
</body>
</html>
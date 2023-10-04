<?php
    include("./api/connection.php");

    session_start();
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
<body>
    <?php
        include_once("./api/navbar.php")
    ?>
    <table class="table-products">
        <tr>
            <th>ID</th>
            <th>EMAIL</th>
            <th>USUARIO</th>
            
        </tr>
   
        <?php

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . " "."</td>";
                echo "<td>" . $row["email"] ." ". "</td>";
                echo "<td>" . $row["username"] . " "."</td>";
                echo "<td><a href='modificarUsuarios.php?id=" . $row['id'] . "'>MODIFICAR</a></td>";
                echo "<td><a href='borrarUsuarios.php?id=" . $row['id'] . "'>BORRAR</a></td>";
                echo "</tr>";
            }
        } else {
            echo "NO HAY REGISTROS";
        }
        ?>
    </table>
    <?php
        include_once("./api/footer.php")
    ?>
</body>
</html>
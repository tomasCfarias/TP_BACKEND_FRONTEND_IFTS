<?php
    include("./api/connection.php");
    $conn = conexion();

    session_start();
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }

    // verifica si el method del forms es POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        
        $numero = $_POST["id"];
        $sql = "DELETE FROM productos WHERE Id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $numero);

        if ($stmt->execute()) {
            echo "Se borró el registro correctamente.";
        } else {
            echo "Error al borrar el registro: " . $stmt->error;
        }
        $stmt->close();
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="css/navbar.css">

</head>
<body>
    <?php
        include_once("./api/navbar.php")
    ?>
        <form action="borrarProducto.php" method="POST" id="user_form">
        <h2> Eliminar Articulo:</h2>
        <label for="usuario">id de articulo a eliminar</label>
        <input type="text" name="id" id="id">
        <input id="user_form_btn" type="submit" value="Enviar"/>
    </form>
    <?php
        include_once("./api/footer.php")
    ?>
</body>
</html>



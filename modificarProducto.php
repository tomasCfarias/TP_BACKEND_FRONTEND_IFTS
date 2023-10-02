<?php
    include("./api/connection.php");
    $conn = conexion();

    session_start();
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") { // verifica si el method del forms es POST
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $cantidad = $_POST["cantidad"];
        $descripcion = $_POST["descripcion"];

        $sql = "UPDATE productos SET Name = '$nombre', price = '$precio', quantity = '$cantidad', description = '$descripcion' WHERE Id = '$id'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Actualización exitosa";
        } else {
            echo "Error en la actualización: " . $conn->error;
        }

        $conn->close();
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
        <form action="modificarProducto.php" method="POST" id="user_form">
        <h2> Modificación de Articulo:</h2>
        <label for="usuario">id de articulo a modificar</label>
        <input type="text" name="id" id="id">
        <label for="usuario">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio">
        <label for="cantidad">Cantidad</label>
        <input type="number" name ="cantidad" id="cantidad">
        <label for="descripcion">Descripción</label>
        <textarea  name="descripcion" id="descripcion"></textarea>
    
        <input id="user_form_btn" type="submit" value="Enviar"/>
    </form>
    <?php
        include_once("./api/footer.php")
    ?>
</body>
</html>



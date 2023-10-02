<?php
    include("./api/connection.php");
    $conn = conexion();

    session_start();
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") { // verifica si el method del forms es POST
        $numero = $_POST["pk"];
        $name = $_POST["name"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $description = $_POST["description"];

        $sql = "UPDATE productos SET Name = '$name', quantity = '$quantity', price = '$price', description = '$description' WHERE id = '$numero'";
        
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
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body>
    <?php
        include_once("./api/navbar.php")
    ?>
    Ingrese ID a modificar:
    <form method="post">
        <input type="text" name="pk" id="pk">
        <br>
        Nuevo Nombre: <input type="text" name="name" id="name">
        <br>
        Nueva Cantidad: <input type="text" name="quantity" id="quantity">
        <br>
        Nuevo Precio: <input type="text" name="price" id="price">
        <br>
        Nueva Descripción: <input type="text" name="description" id="description">
        <br>
        <input type="submit" value="Modificar">
    </form>
    <?php
        include_once("./api/footer.php")
    ?>
</body>
</html>



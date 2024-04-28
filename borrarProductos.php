<?php
include("./api/connection.php");
$conn = conexion();

session_start();
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }

if ($_SERVER["REQUEST_METHOD"] === "POST") {// verifica si el method del forms es POST
    // Verificar si se proporcionó un ID
    if(isset($_POST["id"])) {
        $numero = $_POST["id"];

        // Utilizar una consulta preparada para evitar la inyección SQL
        $sql = "DELETE FROM productos WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $numero);

        if ($stmt->execute()) {
            echo "Se borró el registro correctamente.";
        } else {
            echo "Error al borrar el registro: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Por favor, ingrese un ID válido.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Productos</title>
    <link rel="stylesheet" href="./css/navbar.css">
</head>
<body>
    <?php
        include_once("./api/navbar.php")
    ?>
    ingresar ID del producto a borrar
    <form  method="post">
        <input type="text" name="id" id="id">
        <input type="submit" value="Borrar">
    </form>
    <?php
        include_once("./api/footer.php")
    ?>
</body>
</html>
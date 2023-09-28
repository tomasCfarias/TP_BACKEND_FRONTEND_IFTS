<?php
    include("./sql/connection.php");
    $conn = conexion();


    if ($_SERVER["REQUEST_METHOD"] === "POST") {// verifica si el method del forms es POST
        // Verificar si se proporcionó un ID
        if(isset($_POST["id"])) {
            $numero = $_POST["id"];

            // Utilizar una consulta preparada para evitar la inyección SQL
            $sql = "DELETE FROM usuarios WHERE id = ?";
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

    $conn ->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Usuario</title>
    <link rel="stylesheet" href="./css/navbar.css">
</head>
<body>
    <?php
        include_once("./sql/navbar.php")
    ?>
    ingresar ID a borrar
    <form  method="post">
        <input type="text" name="id" id="id">
        <input type="submit" value="Borrar">
    </form>
</body>
</html>
<?php
    include("./api/connection.php");
    $conn = conexion();

    session_start();
    if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") { // verifica si el method del forms es POST
        $numero = $_POST["id"];
        $email = $_POST["email"];
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];

        $sql = "UPDATE usuarios SET email = '$email', username = '$usuario', password = '$password' WHERE id = '$numero'";
        
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
    <form action="modificarUsuarios.php" method="POST" id="user_form">
        <h2> Modificación de Usuario:</h2>
        <label for="usuario">id de usuario a modificar</label>
        <input type="text" name="id"><br>
        <label for="email">email</label>
        <input type="email" name="email" id="usuario"><br>
        <label for="usuario">usuario</label>
        <input type="text" name="usuario" id="usuario"><br>
        <label for="password">contraseña</label>
        <input type="password" name="password" id="password">
        <input type="submit" id ="enviar" value="Enviar">
    </form>
    <?php
        include_once("./api/footer.php")
    ?>
</body>
</html>



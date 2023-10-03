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

            $sqlSelect = "SELECT * FROM usuarios WHERE id = $numero";
            $result = $conn->query($sqlSelect);
            if ($result->num_rows > 0) {
                $sql = "DELETE FROM usuarios WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $numero);
            } else {
                header("Location: borrarUsuarios.php?error=No existe este usuario");
                exit();
            }

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
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/navbar.css">
</head>
<body>
    <?php
        include_once("./api/navbar.php")
    ?>
    <form action="borrarUsuarios.php" method="POST" id="user_form">
        <h2> Borrar Usuario:</h2>
        <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <p>Usuario a borrar</p>
        <input type="text" name="id"><br>
        <input type="submit" id ="enviar" value="Enviar">
    </form>
    <?php
        include_once("./api/footer.php")
    ?>
</body>
</html>
<?php
include("./api/connection.php");
$conn = conexion();

session_start();
if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit(); 
}

$numero = $_GET["id"];
$sql = "SELECT * FROM usuarios WHERE id = '$numero'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);

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
    <?php include_once("./api/navbar.php") ?>
    
    <div class="main-container">

        <?php include_once("./api/sidebar.php") ?>
        <form action="modificarUsuarios.php?id=<?=$numero?>" method="POST" id="user_form">
            <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {


                $numero = $_POST["id"];
                $email = $_POST["email"];
                $usuario = $_POST["usuario"];
                $password = $_POST["password"];
                $hash = password_hash($password, PASSWORD_DEFAULT );
            
                //Check if email already in db
                $sql = "SELECT * from usuarios WHERE email= '$email'";
                $result = $conn -> query($sql);
                $row2 = mysqli_fetch_array($result);
                if (is_array($row2) && $row2["id"] != $numero) {
                        ?>
                      <div class="error" role="alert">
                        <strong>Error!</strong>
                        <p>El email ya esta registrado.</p>
                      </div>  
                      <?php
                    }
                elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || preg_match("/[^a-zA-Z0-9]+/",$usuario)) {
            
                    ?>
                    <div class="error" role="alert">
                      <strong>Error!</strong>
                      <p>Formato de email o nombre invalido.</p>
                    </div>  
                    <?php
                }
                else {
            
                // Modificamos la consulta para usar una consulta preparada
                $sql = "UPDATE usuarios SET email = ?, username = ?, password = ? WHERE id = ?";
               
                // Preparamos la consulta
                $stmt = $conn->prepare($sql);
            
                // Vinculamos los valores a la consulta
                $stmt->bind_param("sssi", $email, $usuario, $hash, $numero);
            
                // Ejecutamos la consulta
                if ($stmt->execute()) {
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Error en la actualización: " . $stmt->error;
                }
            
                $stmt->close(); // Cerramos la consulta preparada
                }
            }
            ?>
            <h2>Modificación de Usuario:</h2>
            <input type="hidden" name="id" value="<?= $row['id'] ?>"><br>
            
            <label for="email">email</label>
            <input type="email" name="email" id="email" value="<?= $row['email'] ?>" required><br>
            
            <label for="usuario">usuario</label>
            <input type="text" name="usuario" id="usuario" value="<?= $row['username'] ?>"r equired><br>
            
            <label for="password">contraseña</label>
            <input type="password" name="password" id="password" required>
            
            <input type="submit" id="enviar" value="Modificar">
        </form>
    </div>

    <script src="navbar.js"></script>

</body>
</html>



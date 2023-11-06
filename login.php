<?php

    include("api/connection.php");
    $conn = conexion();
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $myusername = mysqli_real_escape_string($conn,$_POST['usuario']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 

        if(empty($myusername)){
            header("Location: login.php?error=Ingrese un usuario");
            exit();
        }else if(empty($mypassword)){
            header("Location: login.php?error=Ingrese una contraseña");
            exit();
        }

        $sql = "SELECT Id FROM admins WHERE User = '$myusername' and Password = '$mypassword'";


        $result = $conn -> query($sql);
        $row = mysqli_fetch_array($result);
        
        if (is_array($row) ) {
            $_SESSION["login_user"] = $myusername;
            $_SESSION["userid"] = $row[0];

            header("location: index.php");
        }
        else {
            header("Location: login.php?error=Login invalido");
            exit();
        }

    }

    $conn ->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/navbar.css">
</head>
<body>
    <?php
        include_once("./api/navbar.php")
    ?>
    <form action="login.php" method="POST" id="user_form">
        <h2>Sistema Admin</h2>
        <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        usuario
        <input type="text" name="usuario" id="usuario"><br>
        contraseña
        <input type="password" name="password" id="password">
        <input type="submit" id ="enviar" value="Enviar">
    </form>
</body>
</html>
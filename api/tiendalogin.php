<?php

    include("connection.php");
    $conn = conexion();
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $myusername = mysqli_real_escape_string($conn,$_POST['usuario']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 

        $sql = "SELECT id FROM usuarios WHERE username = '$myusername' and password = '$mypassword'";
        $result = $conn -> query($sql);
        $row = mysqli_fetch_array($result);
        
        if (is_array($row)) {
            $_SESSION["login_user_tienda"] = $myusername;
            $_SESSION["userid_tienda"] = $row[0];

            header("location: ../articulos.php");
        }
        else {
            echo("<script>
            alert('Usuario o contraseña incorrecta.')
            window.href = tiendalogin.php
            </script>
            ");
        }

    }

    $conn ->close();
?>
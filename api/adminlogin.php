<?php

    include("connection.php");
    $conn = conexion();
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $myusername = mysqli_real_escape_string($conn,$_POST['usuario']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 

        $sql = "SELECT Id FROM admins WHERE User = '$myusername' and Password = '$mypassword'";
        $result = $conn -> query($sql);
        $row = mysqli_fetch_array($result);
        
        if (is_array($row)) {
            $_SESSION["login_user"] = $myusername;
            $_SESSION["userid"] = $row[0];

            header("location: ../index.php");
        }
        else {
            echo("<script>
            alert('Usuario o contraseña incorrecta.')
            window.href = adminlogin.php
            </script>
            ");
        }

    }

    $conn ->close();
?>
<?php

    include("connection.php");
    $conn = conexion();
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $myusername = mysqli_real_escape_string($conn,$_POST['usuario']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 

        $sql = "SELECT id, password FROM usuarios WHERE username = '$myusername'";
        $result = $conn -> query($sql);
        $row = mysqli_fetch_array($result);

        
        
        if (is_array($row)) {

            if (password_verify($mypassword,$row[1])) {
                $_SESSION["login_user_tienda"] = $myusername;
                $_SESSION["userid_tienda"] = $row[0];
                $_SESSION["cart_list"] = [];
                header("location: ../articulos.php");
            }
            else {
                echo(password_hash($mypassword, PASSWORD_DEFAULT ));
                echo($row[1]);
            }
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
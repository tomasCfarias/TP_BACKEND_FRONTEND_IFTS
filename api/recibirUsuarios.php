<?php

include("connection.php");
$conn = conexion(); 

$usuario = $_POST["usuario"];
echo $usuario;
$passw = $_POST["password"];

$hash = password_hash($passw, PASSWORD_DEFAULT );
$email = $_POST["email"];

$sql = "INSERT INTO usuarios (email, username, password) VALUES ('$email', '$usuario', '$hash')";

if ($conn->query($sql) === FALSE) { 
    echo "Error al registrar: " . $conn->error; 
} else {
    echo("<script type='text/javascript'>alert('Registro exitoso. Por favor ingrese.')</script>");
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script type='text/javascript'>window.location.href = "../login-tienda.php"</script>"

</html>

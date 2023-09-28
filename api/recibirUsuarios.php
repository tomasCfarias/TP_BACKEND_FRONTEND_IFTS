<?php

include("connection.php");
$conn = conexion(); 

$usuario = $_POST["usuario"];
echo $usuario;
$passw = $_POST["password"];

$hash = password_hash($passw, PASSWORD_DEFAULT );
$email = $_POST["email"];

$sql = "INSERT INTO usuarios (email, username, password) VALUES ('$email', '$usuario', '$hash')";

if ($conn->query($sql) === TRUE) { 
    echo "Registro exitoso. ¡Bienvenido, $usuario!";
} else {
    echo "Error al registrar: " . $conn->error; 
}

// Cerrar la conexión
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <a href="../mostrarUsuarios.php">TABLA DE USUARIOS</a>
</body>
</html>
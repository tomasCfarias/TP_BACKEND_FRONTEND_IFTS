<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP LOGIN</title>
</head>
<body>
    <h2>REGISTRO</h2>
    <a href="index.php">VOLVER</a><br>
    
    <form action="sql/recibirUsuarios.php" method="POST">
        email
        <input type="text" name="email" id="email"><br>
        usuario
        <input type="text" name="usuario" id="usuario"><br>
        contraseña
        <input type="text" name="password" id="password"><br>
        <input type="submit" type="Enviar">
    </form>
</body>
</html>
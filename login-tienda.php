<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP LOGIN</title>
    <link rel="stylesheet" href="./css/products.css">
</head>
<body>
    <nav class="navbar">
        <a href="articulos.php"><b>Tienda</b></a>
        <a href="login-tienda.php">Login</a>
    </nav>
    <form action="" method="POST" id="user_form">
        <h2>LOGIN</h2>
        usuario
        <input type="text" name="usuario" id="usuario"><br>
        contraseña
        <input type="password" name="password" id="password">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
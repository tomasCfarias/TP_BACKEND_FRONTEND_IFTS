<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP LOGIN</title>
    <link rel="stylesheet" href="./css/products.css">
    <link rel="stylesheet" href="css/navbartienda.css">
</head>
<body>
    <?php
        include("sql/navbartienda.php") 
    ?>
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
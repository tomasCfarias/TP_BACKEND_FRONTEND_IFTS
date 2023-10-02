<?php
session_start();
if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/newproduct.css">
    <link rel="stylesheet" href="./css/navbar.css">
</head>
    <?php
        include_once("./api/navbar.php")
    ?>
<body>
    <form action="./api/subirProducto.php" method="POST" id="user_form">
        <h2>Publicación</h2>
        <label for="usuario">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio">
        <label for="cantidad">Cantidad</label>
        <input type="number" name ="cantidad" id="cantidad">
        <label for="descripcion">Descripción</label>
        <textarea  name="descripcion" id="descripcion"></textarea>
    
        <input id="user_form_btn" type="submit" value="Enviar"/>
    </form>
    <?php
        include_once("./api/footer.php")
    ?>
</body>
</html>
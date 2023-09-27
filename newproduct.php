<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/newproduct.css">
</head>
<body>
    <nav class="navbar">
        <p>Placeholder</p>
        <div class="text-right">
            <a href="">PUBLICAR</a>
            <a href="./sql/mostrarProductos.php">LISTADO</a>
        </div>
    </nav>
    <form action="./sql/subirProducto.php" method="POST" id="user_form">
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
</body>
</html>
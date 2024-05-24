<?php
session_start();
if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
}

include('./api/connection.php');
$conn = conexion();


$sql= "SELECT * from proveedores";
$result = $conn ->  query($sql);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Producto</title>
    <link rel="stylesheet" href="./css/newproduct.css">
    <link rel="stylesheet" href="./css/navbar.css">
</head>
    <?php
        include_once("./api/navbar.php")
    ?>
    <div class="main-container">

        <?php
    include("./api/sidebar.php")    
    ?>
<body>
    <form action="./api/subirProducto.php" method="POST" id="user_form" enctype="multipart/form-data">
        <h2>Publicación</h2>
        <label for="usuario">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <label for="proveedor">Proveedor</label>
        <select id="proveedor" name="proveedor">
        <?php 

                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo( '<option value='.$row["Nombre"].'>'.$row["Nombre"].'</option>');
                    }
                }
        ?>
        </select>
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" required>
        <label for="cantidad">Cantidad</label>
        <input type="number" name ="cantidad" id="cantidad" required>
        <label for="image">Imagen</label>
        <input id="imagen" type="file" name="image" />
        
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" required></textarea>
        
        <input id="user_form_btn" type="submit" value="Enviar" />
    </form>
</div>
    <script src="navbar.js"></script>
    <script src="./api/LoadNotification.js"></script>

</body>
</html>
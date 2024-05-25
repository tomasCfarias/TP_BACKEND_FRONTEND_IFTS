<?php
session_start();
if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include('./api/connection.php');
    $conn = conexion();

    $categoria = $_POST["categoria"];

    $sql = "INSERT INTO categorías (Categoría) VALUES ('$categoria')";

    if ($conn->query($sql) === TRUE) { 



        echo '<script type="text/javascript">
        alert("La categoría ha sido cargada con éxito!.");
        window.location.href="./mostrarProductos.php"
        </script>';
        
    
        exit();
    }
}


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
    <form action="#" method="POST" id="user_form" enctype="multipart/form-data">
        <h2>Nueva Categoría</h2>
        <label for="usuario">Categoría</label>
        <input type="text" name="categoria" id="categoria" required>        
        <input id="user_form_btn" type="submit" value="Enviar" />
    </form>
</div>
    <script src="navbar.js"></script>
    <script src="./api/LoadNotification.js"></script>

</body>
</html>
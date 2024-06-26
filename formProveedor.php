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
    <title>Nuevo proveedor</title>
    <link rel="stylesheet" href="./css/newproduct.css">
    <link rel="stylesheet" href="./css/navbar.css">
    
</head>


<body>
    <?php
        include_once("./api/navbar.php")
    ?>
    <div class="main-container">   
<?php
    include_once("./api/sidebar.php")
    ?>
        <form action="./api/subirProveedor.php" method="POST" id="user_form" enctype="multipart/form-data" class="formNuevoProv" >
            <h2>Nuevo Provedor <br><hr></h2>
                <span class="input-group-text" id="basic-addon1">Nombre</span>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre"  aria-label="Username" aria-describedby="basic-addon1" id="nombre" required >
                <span class="input-group-text" id="basic-addon1">Email</span>
                <input type="email" name="email" class="form-control" placeholder="Email" required aria-label="email" aria-describedby="basic-addon1" id="email" required>
                <span class="input-group-text" id="basic-addon1">Telefono</span>
                <input type="number" name="telefono" class="form-control" placeholder="Tel" required aria-label="telefono" aria-describedby="basic-addon1" id="telefono" required>            
            <input id="user_form_btn" type="submit" value="Nuevo Proveedor" />
        </form>
    </div>
    <script src="navbar.js"></script>
    <script src="./api/LoadNotification.js"></script>

</body>
</html>
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
    <link rel="stylesheet" href="./css/nuevoProveedor.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
    <?php
        include_once("./api/navbar.php")
    ?>
    <div class="main-container">

   
<body>
    <div class="conteiner-AgregarProv">
        
        <form action="./api/subirProveedor.php" method="POST" id="user_form" enctype="multipart/form-data" class="formNuevoProv" >
            <h2>Nuevo Provedor <br><hr></h2>
            
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nombre</span>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre"  aria-label="Username" aria-describedby="basic-addon1" id="nombre" required >
            </div>    

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Email</span>
                <input type="email" name="email" class="form-control" placeholder="Email" required aria-label="email" aria-describedby="basic-addon1" id="email" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Telefono</span>
                <input type="number" name="telefono" class="form-control" placeholder="Tel" required aria-label="telefono" aria-describedby="basic-addon1" id="telefono" required>
            </div>
            
            <input id="user_form_btn" type="submit" value="Nuevo Proveedor" />

            

        </form>
    </div>
    <script src="navbar.js"></script>

</body>
</html>
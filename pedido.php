<?php 
session_start();

if(!isset($_SESSION['login_user'])){ //if login in session is not set
    header("Location: login.php");
}

include('./api/connection.php');
$conn = conexion();


$id = $_GET["id"];
$sql= "SELECT * from productos WHERE IdProveedor = '$id' ";
$result = $conn ->  query($sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido Proveedor</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/navbar.css">
    
</head>
<body>
<?php
        include_once("./api/navbar.php")
    ?>
    <div class="main-container">
        <?php include_once("./api/sidebar.php") ?>

        <form action="#" method="POST" id="user_form">
        <button id="AgregarProducto">Agregar Producto</button>
        <h2>Carga de Pedido</h2>
        <input type="hidden" name="id" value="<?= $id ?>" id='proveedor'>
        <div class="product-list">

            <div class="product">
                <label for="nombre">Nombre</label>
                <select id="nombre">
                    <?php 
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo( '<option value='.$row["Name"].'>'.$row["Name"].'</option>');
                        }
                    }
                    ?>
                </select>
                <label for="cantidad">Cantidad</label>
                <input type="text" name="cantidad" id="cantidad" required>
                <button class="QuitarProducto" id="p-0">Quitar Producto</button>
            </div>
        </div>
        <button id="user_form_btn" >Guardar Pedido</button>
    </form>
    </div>
</body>

<script src="navbar.js"></script>
<script src="pedido.js"></script>
<script src="./api/LoadNotification.js"></script>

</html>